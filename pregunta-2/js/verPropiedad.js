// Agregar un event listener a todos los botones de ver propiedad
document.querySelectorAll('.btnVerPropiedad').forEach(button => {
    button.addEventListener('click', function () {
        const idPersona = this.getAttribute('data-id'); // Obtener el ID de la persona
        // Redirigir a verPropiedad.php y pasar idPersona como parámetro
        window.location.href = 'verPropiedad.php?id=' + idPersona; 
    });
});
