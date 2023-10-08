<?php

namespace App\Http\Livewire\Admin\Estudiantes;

use App\Models\Ficha;
use App\Models\Seguimiento;
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
        if ($this->est->foto) {
            // eliminar foto
            Storage::disk('public')->delete($this->est->foto);
        }

        // eliminar ficha
        $ficha = Ficha::where('user', $this->est->id)->first();
        if ($ficha) {
            Ficha::destroy($ficha->id_ficha);
        }

        // eliminar los seguimientos
        $seguimientos = Seguimiento::where('user', $this->est->id)->get();
        if ($seguimientos) {
            foreach ($seguimientos as $seg) {
                Seguimiento::destroy($seg->id_seg);
            }
        }

        // eliminar user
        User::destroy($this->est->id);

        session()->flash('cerrarModal');
        $this->emit('estEliminado');

        $this->emitTo('admin.estudiantes.estlist', 'actualizarEstudiantes');
    }
}
