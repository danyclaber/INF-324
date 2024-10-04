// Agregar event listener a todos los botones de eliminar propiedad
document.querySelectorAll('.btnEliminar').forEach(button => {
    button.addEventListener('click', function () {
        const id = this.getAttribute('data-id'); // Obtener el ID de la propiedad a eliminar
        const idPersona = document.getElementById("idPersona-1").value; 

        // Confirmar eliminación
        if (confirm('¿Estás seguro de que deseas eliminar esta propiedad con id=' + id + '?')) {
            // Redirigir a un script PHP para manejar la eliminación
            window.location.href = 'php/eliminarPropiedad.php?id_propiedad=' + id + '&id_persona=' + idPersona; 
        }
    });
});
