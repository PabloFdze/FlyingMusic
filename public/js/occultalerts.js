  setTimeout(() => {
        const alert = document.getElementById('alert-success');
        if (alert) {
            alert.style.opacity = 0;
            setTimeout(() => alert.remove(), 600);
        }
    }, 3000);

    //Oculta en un periodo de tiempo el mensaje de alerta que han tenido éxito