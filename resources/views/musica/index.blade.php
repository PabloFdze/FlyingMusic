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
        </div>
    @endforeach
</div>

</body>
</html>
