<!DOCTYPE html>
<html>
<head>
    <title>FlyingMusic</title>
</head>
<body>
    <h1>Subir canción</h1>

    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <form method="POST" action="{{ route('music.store') }}" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title" placeholder="Título" required><br>
        <input type="text" name="artist" placeholder="Artista"><br>
        <input type="file" name="file" accept=".mp3,.wav" required><br>
        <button type="submit">Subir</button>
    </form>

    <h2>Canciones</h2>
    @foreach ($songs as $song)
        <div>
            <strong>{{ $song->title }}</strong> - {{ $song->artist }}
            <audio controls>
                <source src="{{ asset($song->file_path) }}" type="audio/mpeg">
                Tu navegador no soporta audio HTML5.
            </audio>
        </div>
    @endforeach
</body>
</html>
