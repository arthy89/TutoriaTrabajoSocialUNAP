<?php

namespace App\Http\Livewire\Tutor;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Seguimientoslist extends Component
{
    use WithPagination;

    public $buscar;

    public User $est;

    protected $listeners = [
        'actualizarSeguimientos' => 'render'
    ];

    public function render()
    {
        $seguimientos = $this->est->seguimientos()
            ->when($this->buscar, function ($query, $buscar) {
                return $query->where(function ($subQuery) use ($buscar) {
                    $subQuery->where('titulo', 'like', '%' . $this->buscar . '%')
                        ->orWhere('created_at', 'like', '%' . $this->buscar . '%')
                        ->orWhere('num_seg', 'like', $this->buscar . '');
                });
            })
            ->paginate(6);

        return view('livewire.tutor.seguimientoslist', [
            'est' => $this->est,
            'seguimientos' => $seguimientos,
        ]);
    }
}
