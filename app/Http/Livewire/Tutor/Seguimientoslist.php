<?php

namespace App\Http\Livewire\Tutor;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Seguimientoslist extends Component
{
    use WithPagination;

    public User $est;

    protected $listeners = [
        'actualizarSeguimientos' => 'render'
    ];

    public function render()
    {
        $seguimientos = $this->est->seguimientos()->paginate(6);

        return view('livewire.tutor.seguimientoslist', [
            'est' => $this->est,
            'seguimientos' => $seguimientos,
        ]);
    }
}
