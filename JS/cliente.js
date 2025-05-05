function editarRegistro(id) {
    // Opción 1: Redirigir a otra página con el ID del registro en la URL
    window.location.href = '../Admin/ver_cliente.php?id=' + id;

}
function ingresar_chat(id) {
    // Opción 1: Redirigir a otra página con el ID del registro en la URL
    window.location.href = '../Cliente/chat2.php?id=' + id;

}

function ingresar_chat2(user) {
    // Opción 1: Redirigir a otra página con el ID del registro en la URL
    window.location.href = '../Agente/chat2.php?Usuario=' + user;

}