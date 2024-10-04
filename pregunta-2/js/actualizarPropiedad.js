// Agregar event listener a todos los botones de editar propiedad
document.querySelectorAll('.btnEditar').forEach(button => {
    button.addEventListener('click', function () {
        // Obtener datos de la propiedad desde el botón
        const id = this.getAttribute('data-id');
        const codCatastral = this.getAttribute('data-codCatastral');
        const direccion = this.getAttribute('data-direccion');
        const distrito = this.getAttribute('data-distrito');
        const zona = this.getAttribute('data-zona');
        const superficie = this.getAttribute('data-superficie');
        const xIni = this.getAttribute('data-xIni');
        const yIni = this.getAttribute('data-yIni');
        const xFin = this.getAttribute('data-xFin');
        const yFin = this.getAttribute('data-yFin');
        const tipoPropiedad = this.getAttribute('data-tipoPropiedad');
        const valor = this.getAttribute('data-valor');

        // Llenar los campos del formulario del modal
        document.getElementById('id_propiedad').value = id;
        document.getElementById('codCatastral').value = codCatastral;
        document.getElementById('direccion').value = direccion;
        document.getElementById('distrito').value = distrito;
        document.getElementById('zona').value = zona;
        document.getElementById('superficie').value = superficie;
        document.getElementById('xIni').value = xIni;
        document.getElementById('yIni').value = yIni;
        document.getElementById('xFin').value = xFin;
        document.getElementById('yFin').value = yFin;
        document.getElementById('tipoPropiedad').value = tipoPropiedad;
        document.getElementById('valor').value = valor;

        // Mostrar el modal
        const modal = new bootstrap.Modal(document.getElementById('modalEditarPropiedad'));
        modal.show();
    });
});
