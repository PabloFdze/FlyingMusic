<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //Vista página principal
    public function index()
    {
        return view('pages.index');
    }
    //Vista página para registro de usuario
    public function sign_in()
    {
        return view('pages.sign_in');
    }
    //Registro de usuario
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|max:50',
            'password_confirmation' => 'required|same:password',
        ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        return redirect()->route('music.index')->with('success', 'Usuario registrado correctamente');

    }

    //Vista página para iniciar sesión

    public function log_in(){
        return view('pages.login');
    }

    //Iniciar sesión
     public function log(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('music.index');
        }

        return back()->withErrors([
            'email' => 'Las credenciales no coinciden.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('flyingmusic.index')->with('success', 'Has cerrado sesión correctamente.');
    }
    

    public function music()
    {
        return view('pages.music');
    }

    
}
