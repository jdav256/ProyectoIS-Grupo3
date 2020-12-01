<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class PedidosTable extends Component
{
    public $pruebaStatus = 'iniciar';
    public $selected_order = 0;
    public $selected_package = null;
    public $details_order = null;
    

    public $confirming;
    public $empleado;
    public $pedidosAsignados;
    public $descripcion;
    
    protected $listeners = [
        'reviewSectionRefresh' => '$refresh',
    ];
    
    public function select($id){
        $this->selected_order = $id;
        $this->selected_package = null;
        $this->details_order = Order::find($id);
       
    }
    

    public function render()
    {   
        
        return view('livewire.pedidos-table');
    }
    
    public function telefonoUsuario($id){

        $usuario =User::find($id);
        $telefonos = $usuario->telephone;
        return $telefonos[0]->telephone;
    }
    public function nombreUsuario($id){
        $usuario =User::find($id);
        $nombre= $usuario->name;
        return $nombre;
    }


    public function cambioStatus($status,$v){
        switch ($status) {
            case 'espera':
                $this->details_order->status = 'iniciado';
                $this->details_order->save();
                
                break;
            case 'iniciado':
                if ($v==1) {
                    $this->details_order->status = 'recolectado';
                    $this->details_order->save();
                    
                }else{
                    $this->details_order->status = 'espera';
                    $this->details_order->save();
                    
                }
                
                break;
            case 'recolectado':
                if ($v==1) {
                    $this->details_order->status = 'embalando';
                    $this->details_order->save();
                    $this->pruebaStatus = 'embalando';
                }else{
                    $this->details_order->status = 'iniciado';
                    $this->details_order->save();
                    
                }
                
                break; 
            case 'embalando':
                if ($v==1) {
                    $this->details_order->status = 'hacia_puntoDos';
                    $this->details_order->save();
                    
                }else{
                    $this->details_order->status = 'recolectado';
                    $this->details_order->save();
                    
                }
                break; 
            case 'hacia_puntoDos':
                if ($v==1) {
                    $this->details_order->status = 'entregado';
                    $this->details_order->save();
                    
                }else{
                    $this->details_order->status = 'embalando';
                    $this->details_order->save();
                    
                }
                
                break;
            case 'entregado':
                if ($v==1) {
                    $this->details_order->status = 'finalizado';
                    $this->details_order->save();
                    
                }else{
                    $this->details_order->status = 'hacia_puntoDos';
                    $this->details_order->save();
                    
                }
                
                break;    
            
            
        }
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
        $this->details_order= null;
        $this->pedidosAsignados = $this->empleado->order;
        
        $this->emit('reviewSectionRefresh');
        
    }
    
}
