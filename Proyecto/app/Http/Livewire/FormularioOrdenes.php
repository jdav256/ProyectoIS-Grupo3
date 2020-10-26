<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FormularioOrdenes extends Component
{
    public $addresses;
    public function render()
    {
        $this->addresses=Auth::user()->addresses;
        return view('livewire.formulario-ordenes',['addresses'=>$this->addresses]);
    }
    
}