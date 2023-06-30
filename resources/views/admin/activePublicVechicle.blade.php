<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.2.12/leaflet-routing-machine.min.js">
</script>

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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.2.12/leaflet-routing-machine.min.js">
        </script>
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
                            latitude: 27.694079,
                            longitude: 85.297393
                        }
                    ];

                    // Create markers for the other places with custom icons
                    var placeIcon = L.icon({
                        iconUrl: '/images/markerIcons/B.png',
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
                    }

                    // Find the nearest place marker to the user's location
                    var nearestMarker = findNearestMarker(userMarker, placeMarkers);

                    // Calculate the route using Leaflet Routing Machine
                    L.Routing.control({
                        waypoints: [
                            L.latLng(latitude, longitude),
                            nearestMarker.getLatLng()
                        ],
                        routeWhileDragging: false
                    }).addTo(map);
                });
            }

            // Function to find the nearest marker using Dijkstra's algorithm
            function findNearestMarker(userMarker, placeMarkers) {
                var shortestDistance = Infinity;
                var nearestMarker = null;

                for (var i = 0; i < placeMarkers.length; i++) {
                    var marker = placeMarkers[i];
                    var distance = userMarker.getLatLng().distanceTo(marker.getLatLng());

                    if (distance < shortestDistance) {
                        shortestDistance = distance;
                        nearestMarker = marker;
                    }
                }

                return nearestMarker;
            }
        </script>
    </section>
@endsection
