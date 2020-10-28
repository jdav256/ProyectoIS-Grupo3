<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FormularioPedidos extends Component
{
    
    public $descripcionPedido;             
    public $fechaEntrega;            
    public $direccionEntrega;        
    public $direccionSalida;   
    public $misPaquetes=[];
    public $misDirecciones; 
    
    public $fragil;
    public $volumen;
    public $peso;
    public $contenido;
    public $hayPaquete = "false";

    protected $listeners = [
        'reviewSectionRefresh' => '$refresh',
    ];

    protected $rules = [
        'descripcionPedido' => 'required',
        'fechaEntrega' => 'required',
        'direccionEntrega' => 'required',
        'direccionSalida' => 'required',
        
    ];

    public function render()
    {
        $this->misDirecciones = Auth::user()->address;   
        return view('livewire.formulario-pedidos');
    }

    public function guardar(){
        $this->validate();
    }

    public function agregarPaquete(){
        
        $paquete = [
            'contenido'=>$this->contenido,
            'fragil'=>$this->fragil,
            'volumen'=>$this->volumen,
            'peso'=>$this->peso
        ];


        array_push($this->misPaquetes,$paquete);
        
        $this->hayPaquete=true;
    }

    public function quitarPaquete($index){
        unset($this->misPaquetes[$index]);
    }
}
