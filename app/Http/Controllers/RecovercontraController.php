<?php

namespace App\Http\Controllers;

use App\Mail\EnviarCorreo;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class RecovercontraController extends Controller
{
    public function formulario()
    {
        return view('Auth.olvideview');
    }

    public function enviarcorreo(Request $request)
    {
        request()->validate([
            'dni' => 'required',
            'email' => 'required',
        ]);

        $user = User::where('dni', $request->dni)
            ->where('email', $request->email)
            ->first();

        if ($user) {
            $token = Str::random(60);
            $user->update(['reset_password_token' => $token]);

            Mail::to($request->email)->send(new EnviarCorreo($user));
        } else {
            throw ValidationException::withMessages([
                'dni_email' => ('invalid')
            ]);
        }

        return view('Auth.correoenviado', [
            'email' => $request->email,
        ]);
    }

    public function formress($token)
    {
        $user = User::where('reset_password_token', $token)->first();
        if ($user) {
            return view('Auth.formrecuperar', compact('token'));
        } else {
            return redirect()->route('login');
        }
    }

    public function reset(Request $request)
    {
        $request->validate([
            'nueva' => 'required|min:6|regex:/^[a-zA-Z0-9]+$/',
            'password' => 'required|same:nueva',
        ]);

        $user = User::where('reset_password_token', $request->token)->first();

        $user->update([
            'password' => Hash::make($request->nueva),
            'reset_password_token' => null,
        ]);

        return redirect('login')->with('contraAct', 'Su contraseña fue reestablecida correctamente');
    }
}
