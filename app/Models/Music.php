<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    use HasFactory;

    // Campos que se pueden llenar en masa (mass assignment)
    protected $fillable = [
        'title',
        'artist',
        'file_path',
    ];

    // Relación uno a muchos con la tabla playlists

      public function playlists()
    {
        return $this->belongsToMany(Playlist::class, 'playlist_music');
    }
}
