<?php

namespace App\Http\Controllers;

use App\Models\Music;
use App\Models\Playlist;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SubscriptionController extends Controller
{
    public function premiumPage(Request $request)
    {
        $query = $request->input('search');

        $songs = Music::when($query, function ($q) use ($query) {
        $q->where('title', 'like', "%{$query}%")
          ->orWhere('artist', 'like', "%{$query}%");
        })->get();

        $playlists = Playlist::where('tipo', 'premium')->get();

        return view(('premium.premium'), compact('songs', 'playlists'));
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

     // Si se proporciona una imagen, guardarla en public/img
    $imagePath = null;
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('img'), $imageName);
        $imagePath = 'img/' . $imageName;
    }else{
        $imagePath = 'img/default.png'; 
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
    public function destroy($title)
{
    $song = Music::findOrFail($title);

    // Elimina el archivo del servidor si existe
    if (file_exists(public_path($song->file_path))) {
        unlink(public_path($song->file_path));
    }

    // Elimina el registro de la base de datos
    $song->delete();

    return redirect()->back()->with('success', 'Canción eliminada correctamente.');
}
    public function form()
    {
        return view('premium.access');
    }

    public function makePremium(Request $request)
    {

        $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'card_brand' => 'string|max:20',
        'card_number' => 'digits_between:13,19',
    ]);

    $user = User::where('email', $request->email)->first();

    if ($user && Hash::check($request->password, $user->password)) {
        $last4 = Str::substr(preg_replace('/\D/', '', $request->card_number), -4);

        $user->is_premium = true;
        $user->card_brand = $request->card_brand;
        $user->card_last_digits = $last4;
        $user->save();

        Auth::login($user);

        return redirect()->route('premium.page')->with('success', '¡Ahora eres usuario Premium!');
    }

    return back()->withErrors([
        'email' => 'Credenciales incorrectas o usuario no registrado.'
    ]);
}
}