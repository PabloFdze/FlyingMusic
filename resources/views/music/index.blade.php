<!DOCTYPE html>
<html>
<head>
    <title>FlyingMusic</title>
</head>
<h1>Subir canción</h1>

    @if(session('success'))
        <p style="color: lightgreen; padding-left: 20px">{{ session('success') }}</p>
    @endif

    <form method="POST" action="{{ route('music.store') }}" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title" placeholder="Título" required><br>
        <input type="text" name="artist" placeholder="Artista"><br>
        <input type="file" name="file" accept=".mp3,.wav" required><br>
        <button type="submit">Subir</button>
    </form>

    <h2>Canciones</h2>
    <div class="song-list">
        @foreach ($songs as $song)
            <div class="song-block">
                <div class="song-info">
                    <span class="song-title">{{ $song->title }}</span>
                    <span class="song-artist">{{ $song->artist }}</span>
                </div>
                <audio controls>
                    <source src="{{ asset($song->file_path) }}" type="audio/mpeg">
                    Tu navegador no soporta audio HTML5.
                </audio>
            </div>
        @endforeach
    </div>

    <!-- Opcional: Player fijo abajo (última canción reproducida o en cola futura) -->
    {{-- <div class="music-player">
        <div class="song-info">
            <span class="song-title">Nombre de canción</span>
            <span class="song-artist">Artista</span>
        </div>
        <audio controls>
            <source src="URL_DEL_AUDIO.mp3" type="audio/mpeg">
        </audio>
    </div> --}}
</body>
</html>
