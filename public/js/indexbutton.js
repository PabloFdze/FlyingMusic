document.querySelectorAll('.btn-primary.btn-lg').forEach(btn => {
    // Añadir clase que lanza la animación de ensanchar y volver
    btn.classList.add('btn-animate-width');

    btn.addEventListener('mouseover', () => {
        btn.innerText = "¡Ofertaza!";
        btn.style.backgroundColor = '#ff7dad';
    });

    btn.addEventListener('mouseout', () => {
        btn.innerText = "Probar gratis durante 1 mes";
        btn.style.backgroundColor = '#e91e63';
    });
});

