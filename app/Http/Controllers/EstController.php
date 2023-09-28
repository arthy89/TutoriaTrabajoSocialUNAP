<?php

namespace App\Http\Controllers;

use App\Models\Ficha;
use Illuminate\Http\Request;

class EstController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function fichapersonal()
    {
        $user = auth()->user();

        // buscamos la ficha correspondiente al usuario autenticado
        $ficha_act = Ficha::where('fichas.user', '=', $user->id)->get()->first();
        // return $ficha_act->familia;
        return view('Est.fichapersonal', compact('ficha_act'));
    }

    public function fichact(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'familia' => 'required',
        ]);

        // buscamos la ficha correspondiente al usuario autenticado
        $ficha_act = Ficha::where('fichas.user', '=', $user->id)->get()->first();

        if ($ficha_act) {
            //si la ficha existe en la tabla 'fichas'
            $ficha_act->update([
                'familia' => $request->familia,
            ]);
        } else {
            //no existe ficha registrada del usuario actual
            $ficha_new = Ficha::create([
                'user' => $user->id,
                'familia' => $request->familia,
            ]);
        }

        return back()->with('fichaActualizada', 'La información se guardó correctamente');
    }
}
