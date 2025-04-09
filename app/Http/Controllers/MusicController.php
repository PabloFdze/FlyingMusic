<?php

namespace App\Http\Controllers;

use App\Models\Music;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    public function index()
    {
        $songs = Music::all();
        return view('music.index', compact('songs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'artist' => 'nullable|string|max:255',
            'file' => 'required|mimes:mp3,wav|max:20000',
        ]);

        $path = $request->file('file')->store('public/music');

        Music::create([
            'title' => $request->input('title'),
            'artist' => $request->input('artist'),
            'file_path' => str_replace('public/', 'storage/', $path),
        ]);

        return redirect()->back()->with('success', 'Canción subida con éxito.');
    }
}
