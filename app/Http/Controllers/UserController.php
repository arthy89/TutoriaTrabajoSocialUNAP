<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\FotoRequest;
use App\Http\Requests\User\UserRequest;
use App\Models\User;
use App\Rules\MatchCurrentPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function perfil()
    {
        return view('User.perfil');
    }

    public function perfilpass(Request $request)
    {
        $request->validate([
            'actual' => ['required', new MatchCurrentPassword],
            'nueva' => 'required|min:6|regex:/^[a-zA-Z0-9]+$/',
            'password' => 'required|same:nueva',
        ]);

        $user = auth()->user();
        $user->password = Hash::make($request->nueva);
        $user->save();

        return redirect()->back()->with('contraActualizada', 'Contraseña actualizada correctamente');
    }

    public function perfilact(UserRequest $request, User $user)
    {
        // validamos que no se actualice en un registro diferente, control de seguridad
        if ($user->id != auth()->user()->id) {
            return redirect()->back()->with('errorFormCorrupto', 'Error de formulario, datos incorrectos');
        }

        $user->update([
            'apell' => strtoupper($request->apell),
            'name' => strtoupper($request->name),
            'sexo' => $request->sexo,
            'email' => strtolower($request->email),
            'celular' => $request->celular,
        ]);

        return redirect()->back()->with('status', 'Perfil actualizado correctamente');
    }

    public function perfilfoto(Request $request)
    {
        //! ejecutar en el servidor
        //! php artisan storage:link

        $user = User::find(auth()->user()->id);

        $request->validate([
            'foto' => 'required|mimes:jpeg,png,jpg|max:4048'
        ]);

        $imagen = $request->file('foto');

        if ($imagen) {
            if (auth()->user()->foto) {
                Storage::disk('public')->delete(auth()->user()->foto);
            }
            $filename = time() . '-' . $imagen->getClientOriginalName();
            $path = $imagen->storeAs('users/profile', $filename, 'public');

            $user->update([
                'foto' => $path,
            ]);
        }

        return back()->with('fotoActualizada', 'La foto de perfil fue actualizada correctamente');
    }
}
