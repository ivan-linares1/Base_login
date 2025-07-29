
$( document ).ready(function(){

    const numeroEmpleado = $('#numero_empleado');
    const telefono = $('#telefono');
    // Solo permitir números al escribir y limitar a 3 caracteres
    numeroEmpleado.on('input', function () {
        this.value = this.value.replace(/\D/g, '').slice(0, 3);
    });

    //solo permite que se escirban numeros
    telefono.on('input', function() {
        this.value = this.value.replace(/\D/g, '').slice(0, 10);
    });

    //solo permite que se escriban letras
    $('#puesto, #nombre, #apellido_paterno, #apellido_materno').on('input', function(){
        this.value = this.value.replace(/[^a-zA-Z\s]/g, '');
    });

    // Validación al enviar el formulario
    $('form').on('submit', function (e) {
        $('.error-msg').remove(); // Limpia errores anteriores
        let valid = true;

        if (telefono.val().length !== 10) {
            telefono.after('<p class="error-msg text-red-600 text-sm mt-1">El teléfono debe tener exactamente 10 dígitos.</p>');
            valid = false;
        }

        if (!valid) {
            e.preventDefault(); // Evita el envío del formulario
        }
    });
});