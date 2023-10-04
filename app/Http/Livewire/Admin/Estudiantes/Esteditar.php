<?php

namespace App\Http\Livewire\Admin\Estudiantes;

use App\Models\User;
use Livewire\Component;

class Esteditar extends Component
{
    public User $est;

    public function render()
    {
        return view('livewire.admin.estudiantes.esteditar', [
            'est' => $this->est,
        ]);
    }

    public function rules()
    {
        return [
            'est.dni' => 'required|min:6|unique:users,dni,' . $this->est->id . ',id',
            'est.apell' => 'required',
            'est.name' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'est.dni.required' => 'El Código es requerido',
            'est.dni.unique' => 'Este Código ' . $this->est->dni . ' ya está registrado ',
            'est.dni.min' => 'El Código debe tener mínimo 6 dígitos',
            'est.apell.required' => 'Los Apellidos son requeridos',
            'est.name.required' => 'Los Nombres son requeridos',
        ];
    }

    public function actualizarEst()
    {
        $this->validate();

        $this->est->update([
            'dni' => $this->est['dni'],
            'apell' => strtoupper($this->est['apell']),
            'name' => strtoupper($this->est['name']),
        ]);

        session()->flash('cerrarModal');
        $this->emit('estActualizado');

        $this->emitTo('admin.estudiantes.estlist', 'actualizarEstudiantes');
        $this->emitTo('admin.estudiantes.esteliminar', 'actualizarEst', $this->est);
    }
}
