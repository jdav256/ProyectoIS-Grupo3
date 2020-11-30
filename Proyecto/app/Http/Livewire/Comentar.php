<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;


class Comentar extends Component
{
    public $commentary;
    public $commented;

    public function resetImputFiels()
    {
        $this->commentary = '';
    }

    public function posts()
    {
        $this->validate([
            'commentary' => 'required'
        ]);

        $comentario = User::find(Auth::user()->id);
        $comentario->commentary=$this->commentary;
        $comentario->commented=1;
        $comentario->save();

        session()->flash('message','Comentario publicado correctamente');
        $this->resetImputFiels();
        return redirect()->to('comment');
    }

    public function eliminar()
    {
        $comentar = User::find(Auth::user()->id);
        $comentar->commentary="";
        $comentar->commented=0;
        $comentar->update();

        return redirect()->to('comment');
    }

    public function render()
    {
        return view('livewire.comentar', [
            'comments' => User::orderBy('id','asc')
                       ->paginate(1000)],[
            'mycomment' => User::find(Auth::user()->id)             
                       ]
                    );
    }
}
