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
        'file' => 'required|mimes:mp3,wav|max:10240', // 10MB máximo
    ]);

    // Guardar el archivo en public/songs
    $file = $request->file('file');
    $fileName = time() . '_' . $file->getClientOriginalName();
    $file->move(public_path('songs'), $fileName);

    // Guardar en la base de datos
    $song = new Music();
    $song->title = $request->title;
    $song->artist = $request->artist;
    $song->file_path = 'songs/' . $fileName;
    $song->save();

    return redirect()->back()->with('success', 'Canción subida correctamente');
        /*$request->validate([
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

        return redirect()->back()->with('success', 'Canción subida con éxito.');*/
    }
}
