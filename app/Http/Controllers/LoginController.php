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

        if (Auth::attempt($request->only('dni', 'password'), $remember)) {
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
