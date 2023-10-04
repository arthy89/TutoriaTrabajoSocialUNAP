<?php

namespace App\Http\Livewire\Admin\Estudiantes;

use App\Models\User;
use Livewire\Component;

class Estestado extends Component
{
    public User $est;

    protected $listeners =
    [
        'actualizarEst' => 'render',
    ];

    public function render()
    {
        return view('livewire.admin.estudiantes.estestado', [
            'est' => $this->est,
        ]);
    }

    public function cambiarEstado()
    {
        if ($this->est->estado == 1) {
            $this->est->update([
                'estado' => 0,
            ]);

            session()->flash('cerrarModal');
            $this->emit('estDeshabilitado');
        } else {
            $this->est->update([
                'estado' => 1,
            ]);

            session()->flash('cerrarModal');
            $this->emit('estHabilitado');
        }

        $this->emit('actualizarEst');
        $this->emitTo('admin.estudiantes.estlist', 'actualizarEstudiantes');
    }
}
