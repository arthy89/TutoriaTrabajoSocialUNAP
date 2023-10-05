<?php

namespace App\Http\Livewire\Tutor;

use App\Models\Seguimiento;
use Livewire\Component;

class Seguimientover extends Component
{
    public Seguimiento $seguimiento;

    protected $listeners =
    [
        'actualizarSeguimiento' => 'render',
    ];

    public function render()
    {
        return view('livewire.tutor.seguimientover', [
            'seguimiento' => $this->seguimiento,
        ]);
    }
}
