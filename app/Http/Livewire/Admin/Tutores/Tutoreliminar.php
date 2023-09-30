<?php

namespace App\Http\Livewire\Admin\Tutores;

use App\Models\User;
use Livewire\Component;

class Tutoreliminar extends Component
{
    public User $tutor;

    protected $listeners =
    [
        'actualizarTutor' => 'render',
    ];

    public function render()
    {
        return view('livewire.admin.tutores.tutoreliminar', [
            'tutor' => $this->tutor
        ]);
    }

    // ! FALTA DESVINCULAR TUTORADOS EN CASO TENGA TUTORADOS A CARGO
    public function eliminarTutor()
    {
        User::destroy($this->tutor->id);

        session()->flash('cerrarModal');
        $this->emit('tutorEliminado');

        $this->emitTo('admin.tutores.tutorlist', 'actualizarTutores');
    }
}
