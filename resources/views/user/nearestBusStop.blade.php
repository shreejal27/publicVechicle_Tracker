@extends('necessary.user_template')
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
        <h1 class="color">Nearest Stop Finder</h1>
        <div>
            <h5 class="color">Filter by Type:</h5>
            <div class="row">
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
        <div id="map" class="mt-3"></div>

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

                    // Define the coordinates for the other places
                    var places = [];
                    @foreach ($stops as $stop)
                        var place = {
                            name: '{{ $stop->info }}',
                            latitude: {{ $stop->latitude }},
                            longitude: {{ $stop->longitude }}
                        };

                        places.push(place);

                        // Set the icon URL based on the vehicle type
                        var iconUrl = '';
                        @if ($stop->vehicle_type == 'bus')
                            iconUrl = '{{ asset('images/markerIcons/B.png') }}';
                        @elseif ($stop->vehicle_type == 'micro')
                            iconUrl = '{{ asset('images/markerIcons/M.png') }}';
                        @elseif ($stop->vehicle_type == 'tempo')
                            iconUrl = '{{ asset('images/markerIcons/T.png') }}';
                        @endif

                        var placeIcon = L.icon({
                            iconUrl: iconUrl,
                            iconSize: [32, 32],
                            iconAnchor: [16, 32],
                            popupAnchor: [0, -32]
                        });

                        var marker = L.marker([place.latitude, place.longitude], {
                            icon: placeIcon
                        }).addTo(map);

                        marker.bindPopup('{{ $stop->info }}');

                        placeMarkers.push(marker);
                    @endforeach

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
