<?php

namespace App\Http\Livewire\Admin\Estudiantes;

use App\Models\Ficha;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Estlist extends Component
{
    use WithPagination;

    public $tutor;

    public $search;

    public $listeners = [
        'actualizarEstudiantes' => 'render',
        'cambioTutor' => 'addTutor',
    ];

    public function render()
    {
        // almacenar tutor en caso listar estudiantes tutorados asignados a un tutor
        $tutor = $this->tutor;

        if ($tutor) {
            // pasamos por parametro el tutor y se consulta solamente los estudiantes a su cargo
            $estudiantes = User::where('id_rol', 3)
                ->where('tutor_id', $tutor->id)
                ->where(function ($query) {
                    $query->where('name', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('apell', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('dni', 'LIKE', '%' . $this->search . '%');
                })
                ->orderBy('apell', 'ASC')
                ->orderBy('name', 'ASC')
                ->paginate(5);
        } else {
            // listado de todos los estudiantes
            $estudiantes = User::where('id_rol', 3)
                // ->where('tutor_id', $tutor->id)
                ->where(function ($query) {
                    $query->where('name', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('apell', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('dni', 'LIKE', '%' . $this->search . '%');
                })
                ->orderBy('apell', 'ASC')
                ->orderBy('name', 'ASC')
                ->paginate(5);
        }

        $fichasUsuarios = Ficha::pluck('user');

        // Agregar el número de fila a cada estudiante
        $estudiantes->each(function ($estudiante, $index) use ($fichasUsuarios, $estudiantes) {
            $estudiante->rowNumber = $estudiantes->firstItem() + $index;
            $estudiante->enFichas = $fichasUsuarios->contains($estudiante->id);
        });

        $tutores = User::where('id_rol', 2)
            ->orderBy('apell', 'ASC')
            ->orderBy('name', 'ASC')
            ->get();

        return view('livewire.admin.estudiantes.estlist', [
            'estudiantes' => $estudiantes,
            'tutores' => $tutores,
            'tutor' => $tutor,
        ]);
    }

    public function addTutor($est_id, $tutor_id)
    {
        $est = User::find($est_id);

        if ($tutor_id == 0) {
            $est->update([
                'tutor_id' => null,
            ]);

            $this->emit('tutorQuitado');
        } else {
            $est->update([
                'tutor_id' => $tutor_id,
            ]);

            $this->emit('tutorAgregado');
        }

        $this->emit('actualizarEstudiantes');
    }
}
