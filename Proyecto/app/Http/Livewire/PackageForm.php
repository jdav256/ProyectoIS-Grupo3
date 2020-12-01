<?php

namespace App\Http\Livewire;

use App\Models\Package;
use Livewire\Component;
use Livewire\WithFileUploads;

class PackageForm extends Component
{
    use WithFileUploads;

    public $description = '';
    public $volume = 0;
    public $weight = 0;
    public $image;
    public $is_it_fragile = false;

    protected $rules = [
        'description' => 'required|string',
        'volume' => 'required|numeric|gt:0',
        'weight' => 'required|numeric|gt:0',
        'image' => 'required|image',
        'is_it_fragile' => 'boolean'
    ];

    public function add()
    {
        $this->validate();

        $path = $this->image->store('photos');

        $data = [
            'description' => $this->description,
            'image' => $path,
            'volume' => $this->volume,
            'weight' => $this->weight,
            'description' => $this->description,
            'is_it_fragile' => $this->is_it_fragile
        ];

        $this->emitUp('newPackage', $data);
        $this->reset();
    }

    public function render()
    {
        return view('livewire.package-form');
    }
}
