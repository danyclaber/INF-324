// Agregar event listener a todos los botones de eliminar propiedad
document.querySelectorAll('.btnImpuesto').forEach(button => {
    button.addEventListener('click', function () {
        const cod_catastral = this.getAttribute('data-id'); // Obtener el ID de la propiedad a eliminar
        // Confirmar eliminación
        if (confirm('¿Deseas Calcular el tipo de impuesto con id=' + cod_catastral + '?')) {
            // Redirigir a un script PHP para manejar la eliminación
            window.location.href = 'http://localhost:8080/impuestoWebAplication/datosServlet?codCatastral=' + cod_catastral;
        }
    });
});
