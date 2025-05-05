document.getElementById('message-form').addEventListener('submit', sendMessage);

function sendMessage(event) {
  event.preventDefault(); // Evitar el envío del formulario por defecto

  // Obtener los valores de los campos
  const incomingId = document.querySelector('.incoming_id').value;
  const outcomingId = document.querySelector('.outcoming_id').value;
  const message = document.querySelector('.message').value;

  // Crear un objeto FormData y agregar los datos del formulario
  const formData = new FormData();
  formData.append('incoming_id', incomingId);
  formData.append('outcoming_id', outcomingId);
  formData.append('message', message);

  // Enviar el mensaje a través de una petición AJAX (usando fetch)
  fetch('../PHP/guardar_mensaje.php', {
    method: 'POST',
    body: formData
  })
    .then(response => response.json())
    .then(data => {
      // Realizar acciones después de guardar el mensaje (puede ser actualizar la interfaz de chat, mostrar un mensaje de éxito, etc.)
      console.log(data); // Ejemplo: mostrar la respuesta en la consola
      document.querySelector('.outcoming_id').value = data.id;
      
      

    })
    .catch(error => {
      // Manejar errores en caso de que ocurra algún problema en la petición AJAX
      console.error(error);
    });

  // Limpiar el campo de mensaje después de enviarlo
  document.querySelector('input[type="text"]').value = '';
  window.location.reload();
}