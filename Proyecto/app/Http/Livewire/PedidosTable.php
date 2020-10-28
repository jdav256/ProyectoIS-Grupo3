<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class PedidosTable extends Component
{
    public $confirming;
    public $empleado;
    public $pedidosAsignados;
    public $descripcion;
    protected $listeners = [
        'reviewSectionRefresh' => '$refresh',
    ];
    
    
    

    public function render()
    {   
        
        return view('livewire.pedidos-table');
    }
    
    public function datosUsuario($id){

        $usuario =User::find($id);
        $telefonos = $usuario->telephone;
        return $telefonos[0]->telephone;
    }

    public function iniciarPedido($id){
        $pedido = Order::find($id);
        if($pedido->status=="espera"){
            $pedido->status = "iniciado";
            $pedido->save();
        }else{
            $pedido->status = "espera";
            $pedido->save();
        }

        $this->emit('reviewSectionRefresh');
        
    }

    public function confirmDelete($id)
    {
        $this->confirming = $id;
    }

    public function kill($id)
    {
        $orden = Order::find($id);
        $orden->status= "noAsignado";
        $orden->employee_id = null;
        $orden->save();
        
        $this->pedidosAsignados = $this->empleado->order;
        
        $this->emit('reviewSectionRefresh');

    }
    
}
