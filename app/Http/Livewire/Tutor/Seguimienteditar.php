<?php

namespace App\Http\Livewire\Tutor;

use App\Models\Seguimiento;
use Livewire\Component;

class Seguimienteditar extends Component
{
    public Seguimiento $seguimiento;

    public function rules()
    {
        return [
            'seguimiento.titulo' => 'required',
            'seguimiento.observaciones' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'seguimiento.titulo.required' => 'El Título es requerido.',
            'seguimiento.observaciones.required' => 'Agregue algunas Observaciones.',
        ];
    }

    public function render()
    {
        return view('livewire.tutor.seguimienteditar', [
            'seguimiento' => $this->seguimiento,
        ]);
    }

    public function seguimientoActualizar()
    {
        $this->validate();

        $this->seguimiento->update([
            'titulo' => $this->seguimiento['titulo'],
            'observaciones' => $this->seguimiento['observaciones'],
            'tutor' => auth()->user()->apell . ' ' . auth()->user()->name,
        ]);

        session()->flash('cerrarModal');
        $this->emit('seguimientoActualizado');

        $this->emitTo('tutor.seguimientoslist', 'actualizarSeguimientos');
        $this->emitTo('tutor.seguimientover', 'actualizarSeguimiento');
    }
}
