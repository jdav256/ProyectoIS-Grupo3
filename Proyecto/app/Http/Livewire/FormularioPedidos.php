<?php

namespace App\Http\Livewire;

use App\Models\AddressOrder;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\Package;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FormularioPedidos extends Component
{
    
    public $descripciondelPedido = '';             
    public $fechaEntrega;  
    public $direccionEntrega;        
    public $direccionSalida;   
    public $misDirecciones; 
    
    public $fragil = false;
    public $volumen = 0;
    public $peso = 0;
    public $contenido = '';

    public $misPaquetes=[];
    public $objetosPaquetes = [];

    protected $listeners = [
        'reviewSectionRefresh' => '$refresh',
    ];

    protected $rules = [
        
        'fechaEntrega' => 'required|date:after today',
        'direccionEntrega' => 'required|numeric|gt:-1',
        'direccionSalida' => 'required|numeric|gt:-1',
    ];

    public function mount()
    {
        $this->fechaEntrega = Carbon::now()->format('Y-m-d');
    }

    public function render()
    {
        $this->misDirecciones = Auth::user()->address;   
        return view('livewire.formulario-pedidos', ['packages' => $this->misPaquetes]);
    }

    public function guardar(){
        $this->validate();
        
        $number = Order::select('order_number')->orderByDesc('order_number')->first();
        $usuario = DB::select("SELECT employee_id, COUNT(employee_id) as times FROM orders INNER JOIN employees ON (employees.id = orders.employee_id) where now() <= delivery_date and employee_type = 'repartidor' GROUP BY employee_id  ORDER BY times ASC");

        $numero_orden = 0;
        if($number->order_number !== null) $numero_orden = $number->order_number + 1;

        $orden = Order::create([
            'order_number' => $numero_orden,
            'order_date' => now(),
            'delivery_date' => $this->fechaEntrega,
            'delivery_cost' => 400,
            'description' => $this->descripciondelPedido,
            'packaging' => 0,
            'employee_id' => $usuario[0]->employee_id,
            'user_id' => Auth::user()->id
        ]);
        
        AddressOrder::create([
            'address_id' => $this->direccionSalida,
            'order_id' => $orden->id,
            'position' => 0
        ]);

        AddressOrder::create([
            'address_id' => $this->direccionEntrega,
            'order_id' => $orden->id,
            'position' => 1
        ]);

        foreach($this->misPaquetes as $paquete)
        {
            $paquete['order_id'] = $orden->id;
            Package::create($paquete);
        }

        $this->descripciondelPedido = '';  
        $this->fechaEntrega = $this->fechaEntrega = Carbon::now()->format('Y-m-d');
        $this->direccionSalida = -1;
        $this->direccionEntrega = -1;
        $this->misPaquetes = [];
    }

    public function agregarPaquete(){
        
        $data = [
            'description'=>$this->contenido,
            'is_it_fragile'=>$this->fragil,
            'volume'=>$this->volumen,
            'weight'=>$this->peso
        ];
        $request = new Request($data);

        $request->validate([
            'description' => 'required|string|max:128',
            'is_it_fragile' => 'required|boolean',
            'volume' => 'required|numeric',
            'weight' => 'required|numeric'
        ]);

        array_push($this->misPaquetes, $data);
        $this->reset(['volumen', 'peso', 'volumen', 'contenido']);
    }

    public function quitarPaquete($index){
        unset($this->misPaquetes[$index]);
    }
}
