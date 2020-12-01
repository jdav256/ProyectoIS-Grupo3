<?php

namespace App\Http\Livewire;

use App\Models\Address;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class GetAddress extends Component
{
    public $query = '';
    public $position = 0;
    public $selection = -1;
    public $focused = false;

    public function toggle()
    {
        $this->reset(['selection', 'query']);
        $this->emitUp('selectAddress', -1, $this->position);
        $this->focused = !$this->focused;
    }

    public function select($id)
    {
        $this->selection = $id;
        $this->focused = false;
        $this->query = Address::findOrFail($id)->description;
        $this->emitUp('selectAddress', $id, $this->position);
    }

    public function render()
    {
        $addresses = Address::where([
            ['user_id', Auth::user()->id],
            ['description','LIKE',"%$this->query%"]
            ])->get();
        return view('livewire.get-address', ['addresses' => $addresses]);
    }
}
