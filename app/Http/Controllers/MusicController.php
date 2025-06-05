<?php

namespace App\Http\Controllers;

use App\Models\Music;
use App\Models\Playlist;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    public function index(Request $request)
    {
         $query = $request->input('search');

        $songs = Music::when($query, function ($q) use ($query) {
        $q->where('title', 'like', "%{$query}%")
          ->orWhere('artist', 'like', "%{$query}%");
        })->get();

        $playlists = Playlist::where('tipo', 'music')->get();
        return view('musica.index', compact('songs', 'playlists'));
    }

    public function store(Request $request)
    {
         $request->validate([
        'title' => 'required|string|max:255',
        'artist' => 'nullable|string|max:255',
        'file' => 'required|mimes:mp3,wav|max:10240', 
    ]);

    // Guardar el archivo en public/songs
    $file = $request->file('file');
    $fileName = time() . '_' . $file->getClientOriginalName();
    $file->move(public_path('songs'), $fileName);

    // Si se proporciona una imagen, guardarla en public/img
     $imagePath = null;
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('img'), $imageName);
        $imagePath = 'img/' . $imageName;
    }

    // Guardar en la base de datos
    $song = new Music();
    $song->title = $request->title;
    $song->artist = $request->artist;
    $song->file_path = 'songs/' . $fileName;
    $song->image_path = $imagePath;
    $song->save();

    return redirect()->back()->with('success', 'Canción subida correctamente');
    }
}
