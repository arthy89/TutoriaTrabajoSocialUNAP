<?php

namespace App\Http\Livewire\Admin\Tutores;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Tutorlist extends Component
{
    use WithPagination;

    public $search;

    public $listeners = [
        'actualizarTutores' => 'render'
    ];

    public function render()
    {
        $tutores = User::where('id_rol', 2)
            ->where(function ($query) {
                $query->where('name', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('apell', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('dni', 'LIKE', '%' . $this->search . '%');
            })
            ->orderBy('apell', 'ASC')
            ->orderBy('name', 'ASC')
            ->withCount('tutorados')
            ->paginate(5);

        // Agregar el número de fila a cada estudiante
        $tutores->each(function ($tutor, $index) use ($tutores) {
            $tutor->rowNumber = $tutores->firstItem() + $index;
            $tutor->tutoradosAsignados = $tutor->tutorados_count;
        });

        // dd($tutores);

        return view('livewire.admin.tutores.tutorlist', [
            'tutores' => $tutores,
        ]);
    }
}
