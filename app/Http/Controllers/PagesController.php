<?php

namespace App\Http\Controllers;

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
        return view('pages.log_in');
    }

    public function music()
    {
        return view('pages.music');
    }

    
}
