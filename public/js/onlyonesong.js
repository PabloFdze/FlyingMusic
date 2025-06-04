 const players = document.querySelectorAll('audio');
    players.forEach(player => {
        player.addEventListener('play', () => {
            players.forEach(p => {
                if (p !== player) p.pause();
            });
        });
    });

//Con este event osolo puede escuchar una cancion a la vez