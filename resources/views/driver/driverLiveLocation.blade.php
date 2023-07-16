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
        <?php
        $driver_id = session()->get('driver_id');
        echo $driver_id;
        ?>
        <h1>Live Location Finder</h1>
        <button onclick="showDriverLocation()"> Show My Location</button>
        <button onclick="hideDriverLocation()"> Hide My Location</button>
        <div id="map"></div>


        <script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.2.12/leaflet-routing-machine.min.js">
        </script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            var map = L.map('map').setView([0, 0], 13);
            var driverMarker; // Declare the driver marker variable outside the function
            var locationInterval; // Declare the interval variable

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            map.setView([27.694367, 85.298619], 13);

            function showDriverLocation() {
                if ("geolocation" in navigator) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        var latitude = position.coords.latitude;
                        var longitude = position.coords.longitude;

                        var userIcon = L.icon({
                            iconUrl: '/images/markerIcons/userMarker.png',
                            iconSize: [32, 32],
                            iconAnchor: [16, 32],
                            popupAnchor: [0, -32]
                        });

                        driverMarker = L.marker([latitude, longitude], {
                            icon: userIcon
                        }).addTo(map);

                        map.setView([latitude, longitude], 13);

                        console.log('User Location:', latitude, longitude);

                        locationInterval = setInterval(function() {
                            sendLocationToServer(latitude, longitude, true);
                        }, 1000);
                    });
                }
            }

            function sendLocationToServer(latitude, longitude, status) {
                var data = {
                    latitude: latitude,
                    longitude: longitude,
                    status: status
                };

                console.log('Sending Location Data:', data);


                $.ajax({
                    url: '/storeDriverLocation',
                    method: 'POST',
                    data: data,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        console.log('Location Data Sent Successfully');
                    },
                    error: function(error) {
                        console.error('Error Sending Location Data:', error);
                    }
                });
            }

            function hideDriverLocation() {
                if (driverMarker) {
                    map.removeLayer(driverMarker);
                }

                // Clear the locationInterval to stop sending location data
                clearInterval(locationInterval);
            }
        </script>
    </section>
@endsection
