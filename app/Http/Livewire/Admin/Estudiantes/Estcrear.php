<?php

namespace App\Http\Livewire\Admin\Estudiantes;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Estcrear extends Component
{
    public User $user;

    public function mount()
    {
        $this->user = new User();
    }

    public function rules()
    {
        return [
            'user.dni' => 'required|unique:users,dni|min:6',
            'user.apell' => 'required',
            'user.name' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'user.dni.required' => 'El Código es requerido',
            'user.dni.unique' => 'Este Código ya está registrado',
            'user.dni.min' => 'El Código debe tener mínimo 6 dígitos',
            'user.apell.required' => 'Los Apellidos son requeridos',
            'user.name.required' => 'Los Nombres son requeridos',
        ];
    }

    public function render()
    {
        return view('livewire.admin.estudiantes.estcrear');
    }

    public function guardarEst()
    {
        $this->validate();

        $this->user = User::create([
            'dni' => $this->user['dni'],
            'apell' => strtoupper($this->user['apell']),
            'name' => strtoupper($this->user['name']),
            'password' => Hash::make($this->user['dni']),
            'id_rol' => 3,
        ]);

        $this->user = new User();

        session()->flash('cerrarModal');
        $this->emit('estCreado');

        $this->emitTo('admin.estudiantes.estlist', 'actualizarEstudiantes');
    }
}
