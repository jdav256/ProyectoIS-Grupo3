<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PedidoHistorial extends Component
{
    public $pedido_seleccionado = 0;

    public function seleccionar($id)
    {
        $this->pedido_seleccionado = $id;
    }

    public function render()
    {
        return view('livewire.pedido-historial');
    }
}
