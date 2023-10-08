@extends('necessary.driver_template')
@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" />
    <style>
        #map {
            height: 600px;
        }
    </style>
    <section class="m-3">
        <?php
        $driver_id = session()->get('driver_id');
        $vehicleType = session()->get('vehicleType');
        
        // echo $driver_id;
        
        ?>
        <h1>Live Location </h1>
        <button onclick="toggleDriverLocation()" id="showLocationBtn"> Share Live Location</button>
        <div id="map" class="mt-3"></div>


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
                [27.679146, 85.302277],
                [27.678874, 85.302260],
                [27.678503, 85.302239],
                [27.678187, 85.302207],
                [27.677914, 85.302192],
                [27.677567, 85.302182],
                [27.677230, 85.302171],
                [27.676897, 85.302144],
                [27.676458, 85.302125],
                [27.675902, 85.302110],
                [27.675399, 85.302105],
                [27.674943, 85.302143],
                [27.674520, 85.302223],
                [27.674216, 85.302325],
                [27.673840, 85.302545],
                [27.673484, 85.302770],
                [27.673161, 85.303017],
                [27.672890, 85.303226],
                [27.672534, 85.303511],
                [27.672097, 85.303827],
                [27.671707, 85.304144],
                [27.671284, 85.304482],
                [27.670819, 85.304841],
                [27.670310, 85.305254],
                [27.669883, 85.305576],
                [27.669394, 85.305957],
                [27.668961, 85.306295],
                [27.668491, 85.306676],
                [27.668040, 85.307051],
                [27.667465, 85.307480],
                [27.667113, 85.307791],
                [27.666747, 85.308306],
                [27.666956, 85.308478],
                [27.667317, 85.308709],
                [27.667778, 85.309060],
                [27.668092, 85.309272]
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
