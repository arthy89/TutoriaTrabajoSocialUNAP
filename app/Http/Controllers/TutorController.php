<?php

namespace App\Http\Controllers;

use App\Models\Seguimiento;
use App\Models\User;
use Illuminate\Http\Request;

class TutorController extends Controller
{
    public function seguimientos($dni)
    {
        $est = User::where('dni', $dni)->first();

        $seguimientos_ = $est->seguimientos;

        return view('Tutor.seguimientos', [
            'est' => $est,
            'seguimientos_' => $seguimientos_,
        ]);
    }
}
