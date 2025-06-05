  const player = document.getElementById('player');
  const playlist = [
    'cancion1.mp3',
    'cancion2.mp3',
    'cancion3.mp3'
  ];
  
  let current = 0;
  player.src = playlist[current];
  
  // Cuando termina la canción actual
  player.addEventListener('ended', () => {
    current++;
    if (current >= playlist.length) {
      current = 0; // Volver al inicio si quieres repetir
    }
    player.src = playlist[current];
    player.play();
  });