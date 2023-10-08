<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function tutores()
    {
        return view('Admin.tutores');
    }

    public function estudiantes()
    {
        return view('Admin.estudiantes');
    }

    public function tutor($dni)
    {
        $estudiantes = User::where('id_rol', 3)
            ->whereNull('tutor_id')
            ->orderBy('apell', 'ASC')
            ->orderBy('name', 'ASC')
            ->get();

        $tutor = User::where('dni', $dni)->first();
        return view('Admin.tutor', [
            'tutor' => $tutor,
            'estudiantes' => $estudiantes,
        ]);
    }

    public function tutoraddest(Request $request)
    {
        $tutor = User::where('dni', $request->tutor)->first();

        $request->validate([
            'est_list' => 'required'
        ]);

        foreach ($request->est_list as $est_act) {
            $estudiante = User::where('dni', $est_act)->first();

            $estudiante->update([
                'tutor_id' => $tutor->id,
            ]);
        }

        return back()->with('estAgregados', 'Estudiantes asignados al tutor correctamente');
    }
}
