fetch('/ARSARO_CITAS/PHP/obtener_zonas.php')
  .then(response => response.json())
  .then(data => {
    // Acceder al array de zonas
    const zonas = data.zonas;

    // Crear el mapa en OpenStreetMap
    const map = L.map('myMap').setView([19.339039213214562, -102.36199328038099], 13);

    // Agregar una capa de mapa base de OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: 'Map data © OpenStreetMap contributors',
      maxZoom: 18,
    }).addTo(map);

    // Agregar marcas al mapa para cada zona
    zonas.forEach(zona => {
      let iconMarker = L.icon({
           iconUrl: '../Imagenes/marca.png',
           iconSize: [40, 40],
           iconAnchor: [15, 15]
         });
        const nombre = zona.nombre;
        const apellido = zona.apellido;
      const latitud = zona.latitud;
      const longitud = zona.longitud;
      

      // Crear una marca en el mapa
      L.marker([latitud, longitud],{ icon: iconMarker}).addTo(map).bindPopup(nombre +" "+ apellido);
    });
  })
  .catch(error => {
    console.log('Error al obtener los datos:', error);
  });