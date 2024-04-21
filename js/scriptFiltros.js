document.addEventListener("DOMContentLoaded", function () {
    // Obtener los parámetros de la URL
    const urlParams = new URLSearchParams(window.location.search);

    // Definir los campos a ocultar
    const camposOcultos = urlParams.getAll('campo');

    // Ocultar los campos especificados en la lista
    camposOcultos.forEach(function (campo) {
        const columnas = document.querySelectorAll(`th[id="${campo}"], td[id="${campo}"]`);
        columnas.forEach(function (columna) {
            columna.style.display = 'none';
        });
    });
});