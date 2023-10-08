<?php

namespace App\Http\Livewire\Admin\Tutores;

use App\Models\User;
use Livewire\Component;

class Tutoreditar extends Component
{
    public User $tutor;

    public function render()
    {
        return view('livewire.admin.tutores.tutoreditar', [
            'tutor' => $this->tutor
        ]);
    }

    public function rules()
    {
        return [
            'tutor.dni' => 'required|min:8|unique:users,dni,' . $this->tutor->id . ',id',
            'tutor.apell' => 'required',
            'tutor.name' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'tutor.dni.required' => 'El DNI es requerido',
            'tutor.dni.unique' => 'Este DNI ' . $this->tutor->dni . ' ya está registrado ',
            'tutor.dni.min' => 'El DNI debe tener mínimo 8 dígitos',
            'tutor.apell.required' => 'Los Apellidos son requeridos',
            'tutor.name.required' => 'Los Nombres son requeridos',
        ];
    }

    public function actualizarTutor()
    {
        $this->validate();

        $this->tutor->update([
            'dni' => $this->tutor['dni'],
            'apell' => strtoupper($this->tutor['apell']),
            'name' => strtoupper($this->tutor['name']),
        ]);

        session()->flash('cerrarModal');
        $this->emit('tutorActualizado');

        $this->emitTo('admin.tutores.tutorlist', 'actualizarTutores');
        $this->emitTo('admin.tutores.tutoreliminar', 'actualizarTutor', $this->tutor);
    }
}
