<!DOCTYPE html>
<html>
<head>
    <title>FlyingMusic</title>
    <link rel="stylesheet" href="{{ asset('css/pages_music.css') }}">
   
</head>
<body>
@extends('layouts/logout')

    <form action="{{route('flyingmusic.index')}}">
                <button class="logo">
                <img src="{{asset('img/flying.jpg')}}" alt="Logo de FlyingMusic" class="logo"></img>
                </button>
            </form>

    <h1>Subir canción</h1>

    @if(session('success'))
        <p style="color: lightgreen; padding-left: 20px">{{ session('success') }}</p>
    @endif

    <form method="POST" action="{{ route('flyingmusic.store') }}" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title" placeholder="Título" required><br>
        <input type="text" name="artist" placeholder="Artista"><br>
        <input type="file" name="file" accept=".mp3,.wav" required><br>
        <button type="submit" class="post_song">Subir</button>
    </form>

    <h2>Canciones</h2>
    <div class="song-list">
    @foreach ($songs as $song)
        <div class="song-card">
            <div class="song-info">
                <h3>{{ $song->title }}</h3>
                <p>{{ $song->artist }}</p>
            </div>
            <audio controls class="audio-player">
                <source src="{{ asset($song->file_path) }}" type="audio/mpeg">
                Tu navegador no soporta audio HTML5.
            </audio>
            <form action="{{ route('music.destroy', $song->id) }}" method="POST" style="margin-top: 10px;">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar esta canción?')">Eliminar</button>
        </form>
        </div>
    @endforeach
    </div>
</div>

   
</body>
</html>