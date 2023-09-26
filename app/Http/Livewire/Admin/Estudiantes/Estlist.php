<?php

namespace App\Http\Livewire\Admin\Estudiantes;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Estlist extends Component
{
    use WithPagination;

    public $search;

    public $listeners = [
        'actualizarEstudiantes' => 'render'
    ];

    public function render()
    {
        $estudiantes = User::where('id_rol', 3)
            ->where(function ($query) {
                $query->where('name', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('apell', 'LIKE', '%' . $this->search . '%');
            })
            ->orderBy('apell', 'ASC')
            ->orderBy('name', 'ASC')
            ->paginate(2);

        // Agregar el número de fila a cada estudiante
        $estudiantes->each(function ($estudiante, $index) use ($estudiantes) {
            $estudiante->rowNumber = $estudiantes->firstItem() + $index;
        });

        return view('livewire.admin.estudiantes.estlist', [
            'estudiantes' => $estudiantes
        ]);
    }
}
