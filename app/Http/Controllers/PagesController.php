<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        if (Auth::user()) {
        return redirect()->route('flyingmusic.music')->with('success', 'Ya has iniciado sesión.');
    }
        return view('pages.sign_in');
    }
    //Registro de usuario
    public function register(StoreUserRequest $request)
    {
        $user = User::create($request->validated());

        /*$request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|max:50',
            'password_confirmation' => 'required|same:password',
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();
        Auth::login($user);*/

        /*User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->password),
        ]);*/

        return redirect()->route('flyingmusic.music')->with('success', 'Usuario registrado correctamente');

    }

    //Vista página para iniciar sesión

    public function log_in(){
    if (Auth::check()) {
        return redirect()->route('flyingmusic.music')->with('success', 'Ya has iniciado sesión.');
    }
        return view('pages.login');
    }

    //Iniciar sesión
     public function log(LoginRequest $request){
         
     $credentials = $request->credentials();

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->route('flyingmusic.music')->with('success', 'Has iniciado sesión correctamente.');
        }

        return back()->withErrors([
            'login' => 'Las credenciales no coinciden.',
        ])->onlyInput('login');
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
