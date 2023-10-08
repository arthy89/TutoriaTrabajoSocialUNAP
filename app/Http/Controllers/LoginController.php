<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $remember = $request->filled('remember');

        if (Auth::attempt($request->only('dni', 'password'), $remember) && Auth::user()->estado == 0) {
            Auth::logout();
            return redirect()->route('login')->with('deshabilitado', '¡Su perfil está deshabilitado!');
        }

        if (Auth::attempt($request->only('dni', 'password'), $remember) && Auth::user()->estado == 1) {
            $request->session()->regenerate();

            return redirect()
                ->route('home')
                ->with('status', '¡Inicio de sesión exitoso!');
        }

        throw ValidationException::withMessages([
            'dni' => ('invalid')
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login')->with('status', '¡Cierre de sesión exitoso!');
    }
}
