<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function formLogin()
    {
        return view('auth.form-login');
    }

    public function processLogin(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if(!auth()->attempt($credentials)) {
            return redirect()
                ->route('auth.formLogin')
                ->with('feedback.message', 'Las credenciales no son correctas ¡Vuelve a intentarlo!.')
                ->with('feedback.type', 'danger')
                ->withInput();
        }
        $request->session()->regenerate();

        return redirect()
            ->route('services.index')
            ->with('feedback.message', '¡Bienvenido!, ha iniciado sesión con exito');
    }

    public function processLogout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('auth.formLogin')
            ->with('feedback.message', 'Usted ha cerrado sesión con exito');
    }
}
