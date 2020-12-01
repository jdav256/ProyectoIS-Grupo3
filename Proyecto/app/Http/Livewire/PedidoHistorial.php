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
            ->where('orders.user_id', Auth::user()->id)
            ->orderByDesc('id')
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
            ->where(function($query){
                $query->where('orders.user_id', Auth::user()->id)
                    ->where(function($query){
                        $query->where('orders.description', 'LIKE' , "%$this->query%")
                            ->orWhere('order_number', 'LIKE' , "%$this->query%");
                    });
            })
            ->orderByDesc('id')
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
