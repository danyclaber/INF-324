
// Agregar event listener para abrir el modal de edición
document.querySelectorAll('.btnEditar').forEach(button => {
    button.addEventListener('click', function () {
        const idPersona = this.getAttribute('data-id');
        const ci = this.getAttribute('data-ci');
        const nombres = this.getAttribute('data-nombres');
        const apaterno = this.getAttribute('data-apaterno');
        const amaterno = this.getAttribute('data-amaterno');

        // Llenar el formulario del modal
        document.getElementById('id_persona').value = idPersona;
        document.getElementById('ci').value = ci;
        document.getElementById('nombres').value = nombres;
        document.getElementById('apaterno').value = apaterno;
        document.getElementById('amaterno').value = amaterno;

        // Mostrar el modal
        const modal = new bootstrap.Modal(document.getElementById('modalEditar'));
        modal.show();
    });
});

