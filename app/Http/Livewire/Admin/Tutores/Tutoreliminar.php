<?php

namespace App\Http\Livewire\Admin\Tutores;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Tutoreliminar extends Component
{
    public User $tutor;

    protected $listeners =
    [
        'actualizarTutor' => 'render',
    ];

    public function render()
    {
        return view('livewire.admin.tutores.tutoreliminar', [
            'tutor' => $this->tutor
        ]);
    }

    public function eliminarTutor()
    {
        $est_list = User::where('tutor_id', $this->tutor->id)->get();

        if ($est_list) {
            foreach ($est_list as $est) {
                $est->update([
                    'tutor_id' => null,
                ]);
            }
        }

        User::destroy($this->tutor->id);
        if ($this->tutor->foto) {
            Storage::disk('public')->delete($this->tutor->foto);
        }


        session()->flash('cerrarModal');
        $this->emit('tutorEliminado');

        $this->emitTo('admin.tutores.tutorlist', 'actualizarTutores');
    }
}
