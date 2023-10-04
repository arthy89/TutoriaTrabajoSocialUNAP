<?php

namespace App\Http\Livewire\Admin\Estudiantes;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Esteliminar extends Component
{
    public User $est;

    protected $listeners =
    [
        'actualizarEst' => 'render',
    ];

    public function render()
    {
        return view('livewire.admin.estudiantes.esteliminar', [
            'est' => $this->est
        ]);
    }

    // ! FALTA DESVINCULAR TUTORADOS EN CASO TENGA TUTORADOS A CARGO
    public function eliminarEst()
    {
        Storage::disk('public')->delete($this->est->foto);
        User::destroy($this->est->id);

        session()->flash('cerrarModal');
        $this->emit('estEliminado');

        $this->emitTo('admin.estudiantes.estlist', 'actualizarEstudiantes');
    }
}
