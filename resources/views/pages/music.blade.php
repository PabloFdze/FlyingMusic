<head>
    <title>FlyingMusic</title>
</head>
<body>
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