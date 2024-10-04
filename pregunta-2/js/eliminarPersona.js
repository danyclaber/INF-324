// Agregar un event listener a todos los botones de eliminar
document.querySelectorAll('.btnEliminar').forEach(button => {
    button.addEventListener('click', function () {
        const idPersona = this.getAttribute('data-id'); // Obtener el ID de la persona
        const confirmation = confirm("¿Estás seguro de que deseas eliminar a la persona con ID: " + idPersona + "?");
        if (confirmation) {
            // Redirigir a la página de eliminación
            window.location.href = 'php/eliminarPersona.php?id_persona=' + idPersona; // Cambiado a 'id_persona'
        }
    });
});
