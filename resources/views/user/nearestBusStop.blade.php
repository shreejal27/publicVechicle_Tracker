<style>
    #map {
        height: 500px;
        width: 100%;
    }
</style>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

@extends('necessary.user_template')
{{-- <section class="vehicleRoutes">
    <table class="table">
        <thead>
            <tr>
                <th>SN</th>
                <th>Vehicle Name</th>
                <th>Vehicle Routes</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($vehicles as $vehicle)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $vehicle->vehicle_name }}</td>
                    <td>{{ $vehicle->vehicle_routes }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</section> --}}
@section('content')
    <h1>This is the nearest bus stop</h1>
    <section class="maps">
        <h1 class="center">Available Bus Stops</h1>
        <br>
        <div id="map"></div>
        <br>
        <p id="demo"></p>
    </section>

    <script>
        // Initialize the map
        var map = L.map('map').setView([27.694261, 85.298516], 15);

        // Create and add the OpenStreetMap tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
            maxZoom: 18,
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
        }
        // Add markers for other stops
        @foreach ($stops as $stop)
            {
                var iconUrl = '';
                @if ($stop->vehicle_type == 'bus')
                    iconUrl = '{{ asset('images/markerIcons/B.png') }}';
                @elseif ($stop->vehicle_type == 'micro')
                    iconUrl = '{{ asset('images/markerIcons/M.png') }}';
                @elseif ($stop->vehicle_type == 'tempo')
                    iconUrl = '{{ asset('images/markerIcons/T.png') }}';
                @endif

                var icon = L.icon({
                    iconUrl: iconUrl,
                    iconSize: [32, 32],
                });

                L.marker([{{ $stop->latitude }}, {{ $stop->longitude }}], {
                        icon: icon
                    })
                    .bindPopup("{{ $stop->info }}")
                    .addTo(map);
            }
        @endforeach
    </script>
@endsection
