var positionsDB = [];
var markers = new Array();
var locations = [];
$(document).ready(function () {
  getDataMapaQR();
  getDataMapaEmpresa();
  getDataMapaPuntosDeInteres();
});

let map;
const iconBase = "https://img.icons8.com/";
const icons = {
  qr: {
    icon: iconBase + "metro/26/000000/qr-code.png",
  },
  empresa: {
    icon: iconBase + "bubbles/50/000000/company.png",
  },
  info: {
    icon: iconBase + "bubbles/50/000000/information.png",
  },
};

function getDataMapaQR() {
  $.ajax({
    url: "./function/ubicacionesMapaController.php",
    type: "POST",
    data: { accion_oculta: "QR" },
    crossOrigin: false,
    dataType: "json",
    success: function (response) {
      response.map(function (item) {
        positionsDB.push({
          position: new google.maps.LatLng(item[2], item[3]),
          type: "qr",
        });
        locations.push([
          new google.maps.LatLng(item[2], item[3]),
          "Marker" + item[0],
          item[1],
        ]);

        /* NO SE TOCA */
        var pos = {};
        navigator.geolocation.getCurrentPosition(function (position) {
          pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude,
          };
          (map = new google.maps.Map(document.getElementById("map"), {
            center: new google.maps.LatLng(pos.lat, pos.lng),
            zoom: 16,
            mapTypeId: "roadmap",
          })),
            (markerA = new google.maps.Marker({
              position: new google.maps.LatLng(pos.lat, pos.lng),
              title: "Yo",
              label: "",
              map: map,
            }));
          //////////////////////////////////////////////

          var infowindow = new google.maps.InfoWindow();

          for (var i = 0; i < locations.length; i++) {
            // Append a link to the markers DIV for each marker
            $("#markers").append(
              '<a class="marker-link" data-markerid="' +
                i +
                '" href="#">' +
                locations[i][1] +
                "</a> "
            );

            var marker = new google.maps.Marker({
              position: locations[i][0],
              map: map,
              title: locations[i][1],
              icon: icons[positionsDB[i].type].icon,
            });

            // Register a click event listener on the marker to display the corresponding infowindow content
            google.maps.event.addListener(
              marker,
              "click",
              (function (marker, i) {
                return function () {
                  infowindow.setContent(locations[i][2]);
                  infowindow.open(map, marker);
                };
              })(marker, i)
            );

            // Add marker to markers array
            markers.push(marker);
          }

          // Trigger a click event on each marker when the corresponding marker link is clicked
          $(".marker-link").on("click", function () {
            google.maps.event.trigger(
              markers[$(this).data("markerid")],
              "click"
            );
          });
        });
      });
    },
    error: function (request, status, error) {
      console.log(request);
    },
  });
}

function getDataMapaEmpresa() {
  $.ajax({
    url: "./function/ubicacionesMapaController.php",
    type: "POST",
    data: { accion_oculta: "Empresa" },
    crossOrigin: false,
    dataType: "json",
    success: function (response) {
      response.map(function (item) {
        positionsDB.push({
          position: new google.maps.LatLng(item[13], item[14]),
          type: "empresa",
        });
        locations.push([
          new google.maps.LatLng(item[13], item[14]),
          "Marker" + item[0],
          item[1],
        ]);

        /* NO SE TOCA */
        var pos = {};
        navigator.geolocation.getCurrentPosition(function (position) {
          pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude,
          };
          (map = new google.maps.Map(document.getElementById("map"), {
            center: new google.maps.LatLng(pos.lat, pos.lng),
            zoom: 16,
            mapTypeId: "roadmap",
          })),
            (markerA = new google.maps.Marker({
              position: new google.maps.LatLng(pos.lat, pos.lng),
              title: "Yo",
              label: "",
              map: map,
            }));
          //////////////////////////////////////////////
          var infowindow = new google.maps.InfoWindow();
          for (var i = 0; i < locations.length; i++) {
            $("#markers").append(
              '<a class="marker-link" data-markerid="' +
                i +
                '" href="#">' +
                locations[i][1] +
                "</a> "
            );
            var marker = new google.maps.Marker({
              position: locations[i][0],
              map: map,
              title: locations[i][1],
              icon: icons[positionsDB[i].type].icon,
            });
            google.maps.event.addListener(
              marker,
              "click",
              (function (marker, i) {
                return function () {
                  infowindow.setContent(locations[i][2]);
                  infowindow.open(map, marker);
                };
              })(marker, i)
            );
            markers.push(marker);
          }
          $(".marker-link").on("click", function () {
            google.maps.event.trigger(
              markers[$(this).data("markerid")],
              "click"
            );
          });
        });
      });
    },
    error: function (request, status, error) {
      console.log(request);
    },
  });
}

function getDataMapaPuntosDeInteres() {
  $.ajax({
    url: "./function/ubicacionesMapaController.php",
    type: "POST",
    data: { accion_oculta: "PuntosInteres" },
    crossOrigin: false,
    dataType: "json",
    success: function (response) {
      response.map(function (item) {
        positionsDB.push({
          position: new google.maps.LatLng(item[5], item[6]),
          type: "info",
        });
        locations.push([
          new google.maps.LatLng(item[5], item[6]),
          "Marker" + item[0],
          item[1],
        ]);

        /* NO SE TOCA */
        var pos = {};
        navigator.geolocation.getCurrentPosition(function (position) {
          pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude,
          };
          (map = new google.maps.Map(document.getElementById("map"), {
            center: new google.maps.LatLng(pos.lat, pos.lng),
            zoom: 16,
            mapTypeId: "roadmap",
          })),
            (markerA = new google.maps.Marker({
              position: new google.maps.LatLng(pos.lat, pos.lng),
              title: "Yo",
              label: "",
              map: map,
            }));

          //////////////////////////////////////////////
          var infowindow = new google.maps.InfoWindow();
          for (var i = 0; i < locations.length; i++) {
            $("#markers").append(
              '<a class="marker-link" data-markerid="' +
                i +
                '" href="#">' +
                locations[i][1] +
                "</a> "
            );
            var marker = new google.maps.Marker({
              position: locations[i][0],
              map: map,
              title: locations[i][1],
              icon: icons[positionsDB[i].type].icon,
            });
            google.maps.event.addListener(
              marker,
              "click",
              (function (marker, i) {
                return function () {
                  infowindow.setContent(locations[i][2]);
                  infowindow.open(map, marker);
                };
              })(marker, i)
            );
            markers.push(marker);
          }
          $(".marker-link").on("click", function () {
            google.maps.event.trigger(
              markers[$(this).data("markerid")],
              "click"
            );
          });
        });
      });
    },
    error: function (request, status, error) {
      console.log(request);
    },
  });
}
