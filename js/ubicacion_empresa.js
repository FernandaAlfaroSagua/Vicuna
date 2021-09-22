$(() => {
  initMap();
});

function initMap() {
  let map;
  let latitud = document.getElementById("lat").value;
  let longitud = document.getElementById("lng").value;

  map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: parseFloat(latitud), lng: parseFloat(longitud) },
    zoom: 16,
  });
  const marker = new google.maps.Marker({
    position: { lat: parseFloat(latitud), lng: parseFloat(longitud) },
    map: map,
  });
}
