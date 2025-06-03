<?php

namespace App\Http\Controllers;

use App\Models\Music;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SubscriptionController extends Controller
{
    public function premiumPage()
    {
         $songs = Music::all();
        return view(('premium.premium'), compact('songs'));
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
        'card_brand' => 'required|string|max:20',
        'card_number' => 'required|digits_between:13,19',
    ]);

    $user = User::where('email', $request->email)->first();

    if ($user && Hash::check($request->password, $user->password)) {
        $last4 = Str::substr(preg_replace('/\D/', '', $request->card_number), -4);

        $user->is_premium = true;
        $user->card_brand = $request->card_brand;
        $user->card_last_digits = $last4;
        $user->save();

        Auth::login($user);

        return redirect()->route('flying.music')->with('success', '¡Ahora eres usuario Premium!');
    }

    return back()->withErrors([
        'email' => 'Credenciales incorrectas o usuario no registrado.'
    ]);
}
}