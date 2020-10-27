<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\Package;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PedidoHistorial extends Component
{
    public $selected_order = null;
    public $selected_package = null;
    public $query = "";

    protected $listeners = ['select'];

    public function __construct()
    {
        $orders = DB::table('Orders')
        ->join('Address_Order', 'orders.id', '=', 'order_id')
        ->join('Addresses', 'addresses.id', '=', 'address_id')
        ->select('orders.*')
        ->where('addresses.user_id', Auth::user()->id)
        ->orderByDesc('order_date')
        ->groupBy('orders.id')
        ->get();

        if(sizeof($orders) > 0) $this->selected_order = $orders->first()->id;
    }

    public function select($id)
    {
        $this->selected_order = $id;
        $this->selected_package = null;
    }

    public function selectPackage($id)
    {
        $this->selected_package = $id;
    }

    public function render()
    {
        $order = null;
        $package = null;
        $orders = [];

        $orders = DB::table('Orders')
            
        
            ->where([
                ['order_number', 'LIKE' , "%$this->query%"],
                ['Orders.user_id', Auth::user()->id]
            ])
            ->orderByDesc('order_date', 'orders.order_number')
            ->groupBy('orders.id')
            ->get();


        if($this->selected_order !== null)
        {
            $order = Order::find($this->selected_order);
        }

        if($this->selected_package !== null ){
            $package = Package::find($this->selected_package);
        }

        return view('livewire.pedido-historial', ['details_order' => $order, 'orders' => $orders, 'detail_package' => $package]);
    }
}
