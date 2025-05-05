function enviarDatos() {
    const formulario = document.getElementById('formulario');
    formulario.addEventListener('submit', (event) => {
        event.preventDefault();
    });

    // Obtener los datos de los input del formulario
    const nombre = document.getElementById("nombre").value;
    const apellido_p = document.getElementById("apep").value;
    const apellido_m = document.getElementById("apem").value;
    const telefono = document.getElementById("tel").value;
    const organizacion = document.getElementById("empresa").value;
    const calle = document.getElementById("calle").value;
    const ciudad = document.getElementById("ciudad").value;
    const estado = document.getElementById("estado").value;
    const CP = document.getElementById("codigo").value;
    const correo = document.getElementById("email").value;
    const usuario = document.getElementById("user").value;
    const contrasena = document.getElementById("contra").value;
    const contrasena2 = document.getElementById("contra2").value;

    if (contrasena !== contrasena2) {
        alert("Las contraseñas no coinciden");
    } else {
        document.getElementById("formulario").reset();

        // Realizar el envío de datos al documento PHP utilizando jQuery
        $.post('/ARSARO_CITAS/PHP/Registro_Cliente.php', {
            nombrejs: nombre,
            apellido_pjs: apellido_p,
            apellido_mjs: apellido_m,
            telefonojs: telefono,
            organizacionjs: organizacion,
            callejs: calle,
            ciudadjs: ciudad,
            estadojs: estado,
            cpjs: CP,
            correojs: correo,
            usuariojs: usuario,
            contrasenajs: contrasena
        }, function(data) {
            if (data != null) {
                swal('Success', 'datos enviados correctamente', 'success');
                swal('Success', data, 'success');
                //alert(data);
            } else {
                swal('Success', 'Ha ocurrido un error', 'success');
                //alert("Ha ocurrido un error");
            }
        });
    }
}