<?php

namespace App\Http\Livewire;

use Livewire\Component;

class OpcionHistorial extends Component
{
    private $order;
    public $active;

    public function mount($order)
    {
        $this->order = $order;
    }

    public function render()
    {
        return view('livewire.opcion-historial', ['order' => $this->order]);
    }
}
