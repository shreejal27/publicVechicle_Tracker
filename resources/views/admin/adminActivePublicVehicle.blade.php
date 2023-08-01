@extends('necessary.admin_template')
@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" />

    <style>
        #map {
            height: 600px;
        }

        .custom-control-input:checked+.custom-control-label::before {
            background-color: #A9907E;

        }

        .custom-control-label::before {
            background-color: #675D50;

        }

        .custom-control-input:focus:not(:checked)+.custom-control-label::before {
            box-shadow: none;

        }
    </style>
    <section>
        <h1>All the active public vehicle are seen in the map</h1>
        <div>
            <label>Filter by Vehicle Type:</label> <br>
            <div class="row mb-2">
                <div class="col-md-1">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="busCheckbox" value="bus" checked>
                        <label class="custom-control-label" for="busCheckbox">Bus</label>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="microCheckbox" value="micro" checked>
                        <label class="custom-control-label" for="microCheckbox">Micro</label>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="tempoCheckbox" value="tempo" checked>
                        <label class="custom-control-label" for="tempoCheckbox">Tempo</label>
                    </div>
                </div>
            </div>
        </div>
        <div id="map"></div>

    </section>

    <script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.2.12/leaflet-routing-machine.min.js">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        var map = L.map('map').setView([0, 0], 16);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        var userMarker, placeMarkers = [];

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
                userMarker = L.marker([latitude, longitude], {
                    icon: userIcon
                }).addTo(map);

                // Update the map view to the user's location
                map.setView([latitude, longitude], 16);

                // Add event listeners to the vehicle type checkboxes
                $('#busCheckbox').change(function() {
                    updateDriverLocation();
                });
                $('#microCheckbox').change(function() {
                    updateDriverLocation();
                });
                $('#tempoCheckbox').change(function() {
                    updateDriverLocation();
                });


                function updateDriverLocation() {
                    // Fetch the updated driver locations from the server
                    $.ajax({
                        url: "/adminAjax?_=" + Date.now(),

                        method: "GET",
                        dataType: "json",
                        success: function(response) {
                            // Clear existing markers from the map
                            console.log("Response Data:", response);

                            for (var i = 0; i < placeMarkers.length; i++) {
                                map.removeLayer(placeMarkers[i]);
                            }

                            // Clear the placeMarkers array
                            placeMarkers = [];

                            // Get the selected vehicle types from the checkboxes
                            var busCheckbox = document.getElementById('busCheckbox').checked;
                            var microCheckbox = document.getElementById('microCheckbox').checked;
                            var tempoCheckbox = document.getElementById('tempoCheckbox').checked;

                            // Add new markers for each driver location based on the selected vehicle types
                            response.forEach(function(driverLocation) {
                                var vehicleType = driverLocation.driver.vehicle_type;

                                // Check if the driver's vehicle type matches any of the selected vehicle types
                                if ((busCheckbox && vehicleType === 'bus') ||
                                    (microCheckbox && vehicleType === 'micro') ||
                                    (tempoCheckbox && vehicleType === 'tempo')) {
                                    var place = {
                                        latitude: driverLocation.latitude,
                                        longitude: driverLocation.longitude
                                    };

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

                                    var marker = L.marker([place.latitude, place.longitude], {
                                        icon: vehicleIcon
                                    }).addTo(map);

                                    placeMarkers.push(marker);
                                }
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching driver locations:', error);
                        }
                    });
                }
                // Call the updateDriverLocation function initially to display the initial locations
                updateDriverLocation();

                // Call the updateDriverLocation function every 1000 milliseconds (1 second)
                var locationInterval = setInterval(updateDriverLocation, 1000);

                // Clear the interval when the user leaves the page
                window.addEventListener('beforeunload', function() {
                    clearInterval(locationInterval);
                });

                // function reloadPage() {
                //     location.reload();
                // }

                // Call the reloadPage function every 1000 milliseconds (1 second)
                // setInterval(reloadPage, 1000);

            });
        }
    </script>
@endsection
