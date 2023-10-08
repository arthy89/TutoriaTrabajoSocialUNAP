<?php

namespace App\Http\Livewire\Admin\Tutores;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Tutorcrear extends Component
{
    public User $user;

    public function mount()
    {
        $this->user = new User();
    }

    public function rules()
    {
        return [
            'user.dni' => 'required|unique:users,dni|min:8',
            'user.apell' => 'required',
            'user.name' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'user.dni.required' => 'El DNI es requerido',
            'user.dni.unique' => 'Este DNI ya está registrado',
            'user.dni.min' => 'El DNI debe tener mínimo 8 dígitos',
            'user.apell.required' => 'Los Apellidos son requeridos',
            'user.name.required' => 'Los Nombres son requeridos',
        ];
    }

    public function render()
    {
        return view('livewire.admin.tutores.tutorcrear');
    }

    public function guardarTutor()
    {
        $this->validate();

        $this->user = User::create([
            'dni' => $this->user['dni'],
            'apell' => strtoupper($this->user['apell']),
            'name' => strtoupper($this->user['name']),
            'password' => Hash::make($this->user['dni']),
            'id_rol' => 2,
        ]);

        $this->user = new User();

        session()->flash('cerrarModal');
        $this->emit('tutorCreado');

        $this->emitTo('admin.tutores.tutorlist', 'actualizarTutores');
    }
}
