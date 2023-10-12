<?php

namespace App\Http\Controllers;

use App\Models\Seguimiento;
use App\Models\User;
use Illuminate\Http\Request;

class TutorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function estudiantes_asignados()
    {
        return view('Tutor.estudiantesasignados');
    }

    public function fichaest($dni)
    {
        $est = User::where('dni', $dni)->first();

        // Filtros para no dejar pasar a tutores a cualquier seguimiento
        if (auth()->user()->rol->id_rol !== 1) {
            if ((int)$est->tutor_id !== auth()->user()->id) {
                return redirect()->route('home');
            }
        }

        // return $est->ficha->first()->familia;
        return view('Est.fichaview', [
            'est' => $est
        ]);
    }

    public function fichaestprint($dni)
    {
        $est = User::where('dni', $dni)->first();

        // Filtros para no dejar pasar a tutores a cualquier seguimiento
        if (auth()->user()->rol->id_rol !== 1) {
            if ((int)$est->tutor_id !== auth()->user()->id) {
                return redirect()->route('home');
            }
        }

        return view('Est.fichaprint', [
            'est' => $est,
        ]);
    }

    public function seguimientos($dni)
    {
        $est = User::where('dni', $dni)->first();
        // return $est;

        // Filtros para no dejar pasar a tutores a cualquier seguimiento
        if (auth()->user()->rol->id_rol !== 1) {
            if ((int)$est->tutor_id !== auth()->user()->id) {
                return redirect()->route('home');
            }
        }

        return view('Tutor.seguimientos', [
            'est' => $est,
        ]);
    }

    public function constancia($dni)
    {
        $est = User::where('dni', $dni)->first();

        if (auth()->user()->rol->id_rol !== 1) {
            if ((int)$est->tutor_id !== auth()->user()->id) {
                return redirect()->route('home');
            }
        }

        return view('Tutor.constancia', [
            'est' => $est,
        ]);
    }
}
