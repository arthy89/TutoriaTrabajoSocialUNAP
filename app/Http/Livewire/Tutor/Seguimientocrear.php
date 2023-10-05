<?php

namespace App\Http\Livewire\Tutor;

use App\Models\Seguimiento;
use App\Models\User;
use Livewire\Component;

class Seguimientocrear extends Component
{
    public Seguimiento $seg;

    public User $est;

    public function mount()
    {
        $this->seg = new Seguimiento();
    }

    public function rules()
    {
        return [
            'seg.titulo' => 'required',
            'seg.observaciones' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'seg.titulo.required' => 'El Título es requerido.',
            'seg.observaciones.required' => 'Agregue algunas Observaciones.',
        ];
    }

    public function render()
    {
        return view('livewire.tutor.seguimientocrear');
    }

    public function guardarSeguimiento()
    {
        $last_seg = $this->est->seguimientos->max('num_seg');

        $this->validate();

        if ($last_seg) {
            $this->seg->num_seg = $last_seg + 1;
        } else {
            $this->seg->num_seg = 1;
        }
        $this->seg->user = $this->est->id;
        $this->seg->tutor = auth()->user()->apell . ' ' . auth()->user()->name;
        $this->seg->save();

        $this->seg = new Seguimiento();

        session()->flash('cerrarModal');
        $this->emit('seguimientoCreado');

        $this->emitTo('tutor.seguimientoslist', 'actualizarSeguimientos');
        // return redirect()->route('seguimientos', $this->est->dni);
    }
}
