<?php

namespace App\Http\Livewire\Admin\Tutores;

use App\Models\User;
use Livewire\Component;

class Tutorestado extends Component
{
    public User $tutor;

    protected $listeners =
    [
        'actualizarTutor' => 'render',
    ];

    public function render()
    {
        return view('livewire.admin.tutores.tutorestado', [
            'tutor' => $this->tutor
        ]);
    }

    public function cambiarEstado()
    {
        if ($this->tutor->estado == 1) {
            $this->tutor->update([
                'estado' => 0,
            ]);

            session()->flash('cerrarModal');
            $this->emit('tutorDeshabilitado');
        } else {
            $this->tutor->update([
                'estado' => 1,
            ]);

            session()->flash('cerrarModal');
            $this->emit('tutorHabilitado');
        }

        $this->emit('actualizarTutor');
        $this->emitTo('admin.tutores.tutorlist', 'actualizarTutores');
    }
}
