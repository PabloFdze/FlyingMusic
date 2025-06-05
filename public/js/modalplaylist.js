  var addToPlaylistModal = document.getElementById('addToPlaylistModal');
    addToPlaylistModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var songId = button.getAttribute('data-song-id');
        var songTitle = button.getAttribute('data-song-title');

        // Actualiza los datos del modal
        var modalSongIdInput = addToPlaylistModal.querySelector('#modal-song-id');
        var modalSongTitle = addToPlaylistModal.querySelector('#modal-song-title');

        modalSongIdInput.value = songId;
        modalSongTitle.textContent = songTitle;
    });