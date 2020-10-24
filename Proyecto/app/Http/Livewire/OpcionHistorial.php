<?php

namespace App\Http\Livewire;

use Livewire\Component;

class OpcionHistorial extends Component
{
    public $order_id;

    public function render()
    {
        return view('livewire.opcion-historial');
    }
}
