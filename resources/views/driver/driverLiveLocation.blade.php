@extends('necessary.driver_template')
@section('content')
    <h1>This is to share your live location</h1>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" />
    <style>
        #map {
            height: 600px;
        }
    </style>
    <section>
        <h1>Live Location Finder</h1>
        <button onclick="showDriverLocation()"> Show My Location</button>
        <button onclick="hideDriverLocation()"> Hide My Location</button>
        <div id="map"></div>

        <script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.2.12/leaflet-routing-machine.min.js">
        </script>
        <script>
            var map = L.map('map').setView([0, 0], 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            map.setView([27.694367, 85.298619], 13);

            // Function to show the driver's location
            var driverMarker; // Declare the driver marker variable outside the function

            // Function to show the driver's location
            function showDriverLocation() {
                // Get the user's current location
                if ("geolocation" in navigator) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        var latitude = position.coords.latitude;
                        var longitude = position.coords.longitude;

                        // Create a custom icon for the user's location
                        var userIcon = L.icon({
                            iconUrl: '/images/markerIcons/userMarker.png',
                            iconSize: [32, 32],
                            iconAnchor: [16, 32],
                            popupAnchor: [0, -32]
                        });

                        // Create a marker for the user's location with the custom icon
                        driverMarker = L.marker([latitude, longitude], {
                            icon: userIcon
                        }).addTo(map);

                        // Update the map view to the user's location
                        map.setView([latitude, longitude], 13);
                    });
                }
            }

            // Function to hide the driver's location
            function hideDriverLocation() {
                if (driverMarker) {
                    map.removeLayer(driverMarker); // Remove the driver marker from the map
                }
            }
        </script>
    </section>
@endsection
