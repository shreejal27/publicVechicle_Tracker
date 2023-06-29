@extends('necessary.admin_template')
@section('content')
    <h1>This is to track the live public vechicle</h1>
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

            var userMarker, placeMarker1, placeMarker2;

            // Get the user's current location
            if ("geolocation" in navigator) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var latitude = position.coords.latitude;
                    var longitude = position.coords.longitude;

                    // Create a marker for the user's location
                    userMarker = L.marker([latitude, longitude]).addTo(map);

                    // Update the map view to the user's location
                    map.setView([latitude, longitude], 13);
                });
            }

            // Define the coordinates for the other places
            var place1 = [27.6982600, 85.2993750];
            var place2 = [27.6847670, 85.2993170];

            // Create markers for the other places with custom icons
            var placeIcon = L.icon({
                iconUrl: '/images/markerIcons/B.png',
                iconSize: [32, 32],
                iconAnchor: [16, 32],
                popupAnchor: [0, -32]
            });

            placeMarker1 = L.marker(place1, {
                icon: placeIcon
            }).addTo(map);
            placeMarker2 = L.marker(place2, {
                icon: placeIcon
            }).addTo(map);
        </script>
    </section>
@endsection
