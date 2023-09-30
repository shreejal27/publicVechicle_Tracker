@extends('necessary.user_template')
@section('content')
    <h1>This is to track the live public vehicle</h1>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" />
    <style>
        #map {
            height: 600px;
        }
    </style>
    <section>
        <h1>Shortest Stop Finder</h1>
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

        <script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.2.12/leaflet-routing-machine.min.js">
        </script>
        {{-- for checkbox function --}}
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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

                    //bernhardt college coordinates
                    // var latitude = 27.7018580;
                    // var longitude = 85.2830400;


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
                    map.setView([latitude, longitude], 13);

                    // Add event listeners to the vehicle type checkboxes
                    $('#busCheckbox').change(function() {
                        updateStopLocation();
                        console.log("bus");
                    });
                    $('#microCheckbox').change(function() {
                        updateStopLocation();
                        console.log("micro");
                    });
                    $('#tempoCheckbox').change(function() {
                        updateStopLocation();
                        console.log("tempo");
                    });

                    function updateStopLocation() {
                        // Clear existing markers from the map
                        for (var i = 0; i < placeMarkers.length; i++) {
                            map.removeLayer(placeMarkers[i]);
                        }
                        placeMarkers = [];

                        $.ajax({
                            url: "/userStopAjax",
                            method: "GET",
                            dataType: "json",
                            success: function(response) {
                                // Clear existing markers from the map
                                // console.log("Response Data:", response);

                                // Get the selected vehicle types from the checkboxes
                                var busCheckbox = document.getElementById('busCheckbox').checked;
                                var microCheckbox = document.getElementById('microCheckbox').checked;
                                var tempoCheckbox = document.getElementById('tempoCheckbox').checked;

                                response.forEach(function(stopLocation) {
                                    var vehicleType = stopLocation.vehicle_type;

                                    // Check if the driver's vehicle type matches any of the selected vehicle types
                                    if ((busCheckbox && vehicleType === 'bus') ||
                                        (microCheckbox && vehicleType === 'micro') ||
                                        (tempoCheckbox && vehicleType === 'tempo')) {
                                        var place = {
                                            latitude: stopLocation.latitude,
                                            longitude: stopLocation.longitude
                                        };

                                        var iconUrl = '';
                                        if (vehicleType == 'bus')
                                            iconUrl = '{{ asset('images/markerIcons/B.png') }}';
                                        else if (vehicleType == 'micro')
                                            iconUrl = '{{ asset('images/markerIcons/M.png') }}';
                                        else if (vehicleType == 'tempo')
                                            iconUrl = '{{ asset('images/markerIcons/T.png') }}';

                                        var placeIcon = L.icon({
                                            iconUrl: iconUrl,
                                            iconSize: [32, 32],
                                            iconAnchor: [16, 32],
                                            popupAnchor: [0, -32]
                                        });

                                        var marker = L.marker([place.latitude, place.longitude], {
                                            icon: placeIcon
                                        }).addTo(map);

                                        placeMarkers.push(marker);
                                    }
                                    // Find the nearest place marker to the user's location
                                    var nearestMarker = findNearestMarker(userMarker,
                                            placeMarkers);

                                        // Create a custom icon for the shortest path
                                        var pathIcon = L.icon({
                                            iconUrl: '',
                                            iconSize: [32, 32],
                                            iconAnchor: [16, 32],
                                            popupAnchor: [0, -32]
                                        });

                                        // Calculate the route using Leaflet Routing Machine
                                        L.Routing.control({
                                            waypoints: [
                                                L.latLng(latitude, longitude),
                                                nearestMarker.getLatLng()
                                            ],
                                            routeWhileDragging: false,
                                            lineOptions: {
                                                styles: [{
                                                    color: 'blue',
                                                    opacity: 0.5,
                                                    weight: 3,
                                                    className: 'leaflet-custom-icon'
                                                }]
                                            },
                                            createMarker: function(i, waypoint, n) {
                                                if (i === 0) {
                                                    // Use the custom user icon for the starting marker
                                                    return L.marker(waypoint.latLng, {
                                                        icon: userIcon
                                                    });
                                                } else if (i === n - 1) {
                                                    // Use the custom icon for the ending marker
                                                    return L.marker(waypoint.latLng, {
                                                        icon: pathIcon
                                                    });
                                                } else {
                                                    // Use the default marker for intermediate waypoints
                                                    return L.marker(waypoint.latLng);
                                                }
                                            }
                                        }).addTo(map);
                                });
                            },
                            error: function(xhr, status, error) {
                                console.error('Error fetching stop locations:', error);
                            }

                        });
                    }

                    // Call the updateStopLocation function initially to display the initial locations
                    updateStopLocation();




                    // Find the nearest place marker to the user's location
                    // console.log("user" + userMarker);
                    // var userLatLng = userMarker.getLatLng();
                    // var userLatitude = userLatLng.lat;
                    // var userLongitude = userLatLng.lng;

                    // console.log('User Latitude:', userLatitude);
                    // console.log('User Longitude:', userLongitude);

                    // Loop through placeMarkers and access each marker's properties
                    // for (var i = 0; i < placeMarkers.length; i++) {
                    //     var marker = placeMarkers[i];
                    //     var markerLatitude = marker._latlng.lat;
                    //     var markerLongitude = marker._latlng.lng;

                    //     console.log('Marker', i, 'Latitude:', markerLatitude);
                    //     console.log('Marker', i, 'Longitude:', markerLongitude);

                    //     // You can perform additional actions with each marker here
                    // }




                });
            }

            //  find the nearest marker using shortest path algorithm
            function findNearestMarker(userMarker, placeMarkers) {
                var shortestDistance = Infinity;
                var nearestMarker = null;

                for (var i = 0; i < placeMarkers.length; i++) {
                    var marker = placeMarkers[i];
                    var distance = haversineDistance(userMarker.getLatLng(), marker.getLatLng());

                    if (distance < shortestDistance) {
                        shortestDistance = distance;
                        nearestMarker = marker;
                    }
                }
                return nearestMarker;
            }

            // Haversine formula to calculate the distance between two points (latitude and longitude) in meters
            function haversineDistance(coords1, coords2) {
                function toRad(x) {
                    return x * Math.PI / 180;
                }

                var lat1 = coords1.lat;
                var lon1 = coords1.lng;
                var lat2 = coords2.lat;
                var lon2 = coords2.lng;

                var earthRadius = 6371e3; // Earth's radius in meters
                var lat1Rad = toRad(lat1);
                var lat2Rad = toRad(lat2);
                var deltaLatRad = toRad(lat2 - lat1);
                var deltaLonRad = toRad(lon2 - lon1);

                var a = Math.sin(deltaLatRad / 2) * Math.sin(deltaLatRad / 2) +
                    Math.cos(lat1Rad) * Math.cos(lat2Rad) *
                    Math.sin(deltaLonRad / 2) * Math.sin(deltaLonRad / 2);

                var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));

                var distance = earthRadius * c;

                return distance;
            }
        </script>
    </section>
@endsection


{{-- // Define the coordinates for the other places
// var places = [];
// @foreach ($stops as $stop)
    // var place = {
    // name: '{{ $stop->info }}',
    // latitude: {{ $stop->latitude }},
    // longitude: {{ $stop->longitude }}
    // };

    // places.push(place);

    // Set the icon URL based on the vehicle type
    // var iconUrl = '';
    // @if ($stop->vehicle_type == 'bus')
        // iconUrl = '{{ asset('images/markerIcons/B.png') }}';
        //
    @elseif ($stop->vehicle_type == 'micro')
        // iconUrl = '{{ asset('images/markerIcons/M.png') }}';
        //
    @elseif ($stop->vehicle_type == 'tempo')
        // iconUrl = '{{ asset('images/markerIcons/T.png') }}';
        //
    @endif

    // var placeIcon = L.icon({
    // iconUrl: iconUrl,
    // iconSize: [32, 32],
    // iconAnchor: [16, 32],
    // popupAnchor: [0, -32]
    // });

    // var marker = L.marker([place.latitude, place.longitude], {
    // icon: placeIcon
    // }).addTo(map);

    // marker.bindPopup('{{ $stop->info }}');

    // placeMarkers.push(marker);
    //
@endforeach --}}
