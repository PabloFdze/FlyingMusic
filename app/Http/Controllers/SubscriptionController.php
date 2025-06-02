<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SubscriptionController extends Controller
{
    public function premiumPage()
    {
        return view('premium.premium');
    }

    public function form()
    {
        return view('premium.access');
    }

    public function makePremium(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            $user->is_premium = true;
            $user->save();

            Auth::login($user); // Inicia sesión si quieres
            return redirect()->route('music.index')->with('success', '¡Ahora eres usuario Premium!');
        }

        return back()->withErrors([
            'email' => 'Credenciales incorrectas o usuario no registrado.'
        ]);
    }
}
