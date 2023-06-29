@extends('necessary.admin_template')
@section('content')
    <h1>This is to track the live public vehicle</h1>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" />
    <style>
        #map {
            height: 600px;
        }
    </style>
    <section>
        <h1>Bus Stop Finder</h1>

        <div id="map"></div>

        <script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>
        <script>
            var map = L.map('map').setView([0, 0], 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            var userMarker, placeMarkers = [];

            // Get the user's current location
            if ("geolocation" in navigator) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var latitude = position.coords.latitude;
                    var longitude = position.coords.longitude;

                    // Create a marker for the user's location
                    userMarker = L.marker([latitude, longitude]).addTo(map);

                    // Update the map view to the user's location
                    map.setView([latitude, longitude], 13);

                    // Define the coordinates for the other places
                    var places = [{
                            name: 'Place 1',
                            latitude: 27.6982600,
                            longitude: 85.2993750
                        },
                        {
                            name: 'Place 2',
                            latitude: 27.6847670,
                            longitude: 85.2993170
                        },
                        {
                            name: 'Place 3',
                            latitude: 27.680864,
                            longitude: 85.296528
                        }
                    ];

                    // Create markers for the other places with custom icons
                    var placeIcon = L.icon({
                        iconUrl: 'path/to/place-icon.png',
                        iconSize: [32, 32],
                        iconAnchor: [16, 32],
                        popupAnchor: [0, -32]
                    });

                    for (var i = 0; i < places.length; i++) {
                        var place = places[i];
                        var marker = L.marker([place.latitude, place.longitude], {
                            icon: placeIcon
                        }).addTo(map);
                        placeMarkers.push(marker);

                        // Calculate the distance between the user's location and the place
                        var distance = calculateDistance(latitude, longitude, place.latitude, place.longitude);

                        // Add the distance as a property of the marker for later use
                        marker.distance = distance;
                    }

                    // Sort the place markers based on distance in ascending order
                    placeMarkers.sort(function(a, b) {
                        return a.distance - b.distance;
                    });

                    // Get the marker with the shortest distance
                    var shortestDistanceMarker = placeMarkers[0];

                    // Highlight the shortest path on the map
                    var pathCoordinates = [
                        [latitude, longitude],
                        [shortestDistanceMarker.getLatLng().lat, shortestDistanceMarker.getLatLng().lng]
                    ];

                    L.polyline(pathCoordinates, {
                        color: 'blue'
                    }).addTo(map);
                });
            }

            // Function to calculate the distance between two sets of latitude and longitude coordinates
            function calculateDistance(lat1, lon1, lat2, lon2) {
                var R = 6371; // Radius of the earth in kilometers
                var dLat = deg2rad(lat2 - lat1);
                var dLon = deg2rad(lon2 - lon1);
                var a =
                    Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                    Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) *
                    Math.sin(dLon / 2) * Math.sin(dLon / 2);
                var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
                var distance = R * c; // Distance in kilometers
                return distance;
            }

            // Function to convert degrees to radians
            function deg2rad(deg) {
                return deg * (Math.PI / 180);
            }
        </script>
    </section>
@endsection
