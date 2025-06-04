 let formToDelete = null;

    document.querySelectorAll('form[action*="music.destroy"]').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            formToDelete = this;
            const modal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
            modal.show();
        });
    });

    document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
        if (formToDelete) formToDelete.submit();
    });