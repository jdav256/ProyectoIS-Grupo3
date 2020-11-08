<?php

namespace App\Http\Livewire;

use App\Models\Address;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Newdirection extends Component
{
    
    public $latitude='';
    public $longitude;
    public $description;

    public function resetImputFiels()
    {
        $this->latitude = '';
        $this->longitude = '';
        $this->description = '';
    }

    public function store()
    {
        $this->validate([
            'latitude' => 'required',
            'longitude' => 'required',
            'description' => 'required'
        ]);

        $direccion = new Address;
        $direccion->latitude=$this->latitude;
        $direccion->longitude=$this->longitude;
        $direccion->description=$this->description;
        $direccion->user_id=Auth::user()->id;
        $direccion->save();

        session()->flash('message','Direccion agregada correctamente');
        $this->resetImputFiels();
        
    }


    public function render()
    {
        return view('livewire.newdirection');
    }

    
}
