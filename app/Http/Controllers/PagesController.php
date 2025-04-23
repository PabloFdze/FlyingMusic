<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }

    public function sign_in()
    {
        return view('pages.sign_in');
    }

    public function log_in(){
        return view('pages.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|max:50',
        ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        return redirect()->back()->with('success', 'Usuario registrado con éxito.')->route('music.index');
    }
    

    public function music()
    {
        return view('pages.music');
    }

    
}
