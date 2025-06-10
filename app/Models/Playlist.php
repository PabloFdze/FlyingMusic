<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
     protected $fillable = ['nombre', 'user_id', 'tipo'];

    // Relación uno a muchos con la tabla users
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Relación muchos a muchos con la tabla music
    public function musics()
    {
        return $this->belongsToMany(Music::class, 'playlist_music')->withPivot('orden')->orderBy('pivot_orden');
    }
}
