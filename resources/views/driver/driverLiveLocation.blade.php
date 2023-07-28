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
        $vehicleType = session()->get('vehicleType');
        
        echo $driver_id;
        
        ?>
        <h1>Live Location Finder</h1>
        <button onclick="toggleDriverLocation()" id="showLocationBtn"> Show My Location</button>
        <div id="map"></div>


        <script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.2.12/leaflet-routing-machine.min.js">
        </script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            var map = L.map('map').setView([0, 0], 16);
            var driverMarker = null; // Declare the driver marker variable outside the function
            var isLocationVisible = false;

            var locationInterval; // Declare the interval variable
            var coordinates = [
                [27.698270, 85.301370],
                [27.698593, 85.299439],
                [27.697244, 85.299010],
                [27.695344, 85.298667],
                [27.694242, 85.298516],
                [27.693596, 85.298431],
                [27.692332, 85.298603],
                [27.690983, 85.299118],
                [27.689710, 85.299461],
                [27.688836, 85.298882],
                [27.687753, 85.298324],
                [27.686689, 85.298195],
                [27.685839, 85.298200],
                [27.684956, 85.298243],
                [27.684756, 85.299010],
                [27.684685, 85.299949],
                [27.684618, 85.300706],
                [27.684490, 85.301500],
                [27.683963, 85.302202],
                [27.683032, 85.302406],
                [27.682528, 85.302385],
                [27.681996, 85.302374],
                [27.681331, 85.302352],
                [27.680680, 85.302310],
                [27.680191, 85.302251],
                [27.679649, 85.302272],
                [27.679146, 85.302277]
            ];
            var currentIndex = 0;

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            map.setView([27.694367, 85.298619], 16);


            function toggleDriverLocation() {
                if (isLocationVisible) {
                    hideDriverLocation();
                    document.getElementById("showLocationBtn").textContent = "Show My Location";
                } else {
                    showDriverLocation();
                    document.getElementById("showLocationBtn").textContent = "Hide My Location";
                }
            }

            function showDriverLocation() {

                if ("geolocation" in navigator) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        var status = 'on';
                        // var latitude = position.coords.latitude;
                        // var longitude = position.coords.longitude;

                        //latitude and longitude for a specific driver only
                        var driverId = "<?php echo $driver_id; ?>";
                        if (driverId == 1) {
                            var [latitude, longitude] = coordinates[currentIndex];

                        } else if (driverId == 3) {
                            var latitude = 27.698270;
                            var longitude = 85.301370;

                        } else {
                            var latitude = position.coords.latitude;
                            var longitude = position.coords.longitude;
                        }

                        var vehicleType = "<?php echo $vehicleType; ?>";
                        // console.log(vehicleType);
                        var iconUrl = '';

                        if (vehicleType == 'bus')
                            iconUrl = '{{ asset('images/markerIcons/bus.png') }}';
                        else if (vehicleType == 'micro')
                            iconUrl = '{{ asset('images/markerIcons/micro.png') }}';
                        else if (vehicleType == 'tempo')
                            iconUrl = '{{ asset('images/markerIcons/tempo.png') }}';

                        var vehicleIcon = L.icon({
                            iconUrl: iconUrl,
                            iconSize: [32, 32],
                            iconAnchor: [16, 32],
                            popupAnchor: [0, -32]
                        });

                        // If marker already exists, remove it before adding a new one
                        if (driverMarker) {
                            map.removeLayer(driverMarker);
                        }

                        driverMarker = L.marker([latitude, longitude], {
                            icon: vehicleIcon
                        }).addTo(map);

                        currentIndex++;

                        if (currentIndex >= coordinates.length) {
                            currentIndex = 0;
                        }

                        map.setView([latitude, longitude], 16);

                        sendLocationToServer(latitude, longitude, status);

                        console.log('User Location:', latitude, longitude, status);

                        isLocationVisible = true;

                        // Set a timeout to call the function again after a certain interval (e.g., 1000ms)
                        locationInterval = setTimeout(showDriverLocation, 1000);
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
                    url: "/storeDriverLocation",
                    method: 'POST',
                    data: data,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        console.log('Location Data Sent Successfully');
                    },
                    error: function(xhr, status, error) {
                        console.error('Error Sending Location Data:', error);
                    }
                });
            }


            function hideDriverLocation() {
                if (driverMarker) {
                    map.removeLayer(driverMarker);
                    driverMarker = null; // Reset the marker variable
                }
                currentIndex = 0;
                // Send the status "off" to the server
                sendLocationToServer(0, 0, 'off');
                console.log('User Location: off');

                // Clear the locationInterval to stop sending location data
                clearInterval(locationInterval);

                isLocationVisible = false;
            }
        </script>
    </section>
@endsection
