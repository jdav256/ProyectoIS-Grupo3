<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PedidosTable extends Component
{
    public $table = [];

    public function render()
    {   
        return view('livewire.pedidos-table');
    }
}
