$(() => {
    initAutocomplete();
});

function initAutocomplete() {
    var pos = {};
    let markers = [];
    navigator.geolocation.getCurrentPosition(function(position) {
        pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude
        }
        const map = new google.maps.Map(document.getElementById("map"), {
            center: {
                lat: pos.lat,
                lng: pos.lng
            },
            zoom: 13,
            mapTypeId: "roadmap",
        });
        var input = document.getElementById('pac-input');
        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
        var marker = new google.maps.Marker({
            map: map,
            position: new google.maps.LatLng(pos.lat, pos.lng),
            draggable: true,
            clickable: true
        });
        google.maps.event.addListener(marker, 'dragend', function(marker) {
            var latLng = marker.latLng;
            document.getElementById("latitud").value = latLng.lat();
            document.getElementById("longitud").value = latLng.lng();
            currentLatitude = latLng.lat();
            currentLongitude = latLng.lng();
            var latlng = {
                lat: currentLatitude,
                lng: currentLongitude
            };
            var geocoder = new google.maps.Geocoder;
            geocoder.geocode({
                'location': latlng
            }, function(results, status) {
                if (status === 'OK') {
                    if (results[0]) {
                        input.value = results[0].formatted_address;
                    } else {
                        console.log('No results found');
                    }
                } else {
                    console.log('Geocoder failed due to: ' + status);
                }
            });
        });

        autocomplete.addListener('place_changed', function() {
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                return;
            }
            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
            }
            marker.setPosition(place.geometry.location);
            currentLatitude = place.geometry.location.lat();
            currentLongitude = place.geometry.location.lng();
            document.getElementById("latitud").value = place.geometry.location.lat();
            document.getElementById("longitud").value = place.geometry.location.lng();
        });
    });

}