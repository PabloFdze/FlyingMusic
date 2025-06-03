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
        //validación de los datos del formulario
        $request->validated();
        // Verificar si el usuario ya existe
        if (User::where('email', $request->email)->exists()) {
            return redirect()->back()->withErrors(['email' => 'El correo electrónico ya está en uso.']);
        }
        // Crear un nuevo usuario
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        // Autenticar al usuario después del registro
        Auth::login($user);

      

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
     public function log(Request $request){
         
        // Validar los datos del formulario
        $request->validate([
            'name' => 'nullable|string|max:50',
            'email' => 'nullable|email',
            'password' => 'required|string|min:8|max:50',
        ]);

        // Intentar autenticar al usuario
     $credentials = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ];

        $remember = ($request->has('remember') ? true : false);

    if (Auth::attempt($credentials, $remember)) {
            // Regenerar el token de sesión para prevenir ataques de fijación de sesión
            $request->session()->regenerate();
            return redirect()->route('flyingmusic.music')->with('success', 'Has iniciado sesión correctamente.');
        }
        // Si las credenciales son incorrectas, redirigir de vuelta con un mensaje de error

        return redirect()->back()->withErrors(['email' => 'Credenciales incorrectas.']);

      
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
