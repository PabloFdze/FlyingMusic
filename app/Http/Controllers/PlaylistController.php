<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlaylistController extends Controller
{
       // Mostrar una playlist con canciones
    public function show($id)
    {
        $playlist = Playlist::with('musics')->findOrFail($id);
        return view('playlists.show', compact('playlist'));
    }

    // Crear nueva playlist (formulario)
    public function create()
    {
        return view('playlists.create');
    }

    // Guardar playlist y canciones asociadas
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|string|in:music,premium',
            'musics' => 'array',
            'musics.*' => 'exists:music,id',
        ]);

        $playlist = Playlist::create([
            'nombre' => $request->nombre,
            'tipo' => $request->tipo,
            'user_id' => Auth::id(),
        ]);

        if ($request->has('musics')) {
            $musics = $request->musics;
            $syncData = [];
            foreach ($musics as $index => $musicId) {
                $syncData[$musicId] = ['orden' => $index];
            }
            $playlist->musics()->sync($syncData);
        }

        return redirect()->route('playlists.show', $playlist->id)->with('success', 'Playlist creada');
    }

    public function addSong(Request $request)
{
    $request->validate([
        'music_id' => 'required|exists:music,id',
        'playlist_id' => 'required|exists:playlists,id',
    ]);

    $playlist = Playlist::findOrFail($request->playlist_id);

    // Evita duplicados al añadir la canción
    $playlist->musics()->syncWithoutDetaching([$request->music_id]);

    return back()->with('success', 'Canción añadida a la playlist correctamente.');
}

public function destroy($id)
{
    $playlist = Playlist::where('id', $id)
                        ->where('user_id', Auth::id()) // Asegura que solo borre si es suya
                        ->firstOrFail();

    $playlist->delete();

    return redirect()->back()->with('success', 'Playlist eliminada correctamente.');
}
}
