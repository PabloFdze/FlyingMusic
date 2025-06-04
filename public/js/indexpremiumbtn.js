document.querySelectorAll('.btn-custom-color').forEach(btn => {
    btn.addEventListener('click', (e) => {
        if (btn.innerText.includes("Familiar")) {
            alert("¡Te unirás al plan familiar más completo!");
        }
    });
});