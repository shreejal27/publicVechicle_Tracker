<style>
    #map {
        height: 500px;
        width: 100%;
    }

    .form {
        margin: 10px;
        padding: 20px;
        background-color: #675d50;
        color: #F3DEBA;
        border-radius: 10px;
    }

    label {
        font-size: 1rem !important;
        margin-bottom: 0px !important;
    }

    input,
    select {
        height: 30px;
        width: 100%;
        border-radius: 0.375rem;
        border: 2px solid #ABC4AA;
        outline: 0;
        background-color: #A9907E;
        padding: 0 0.75rem;
        color: white;
        margin-bottom: 5px !important;
    }

    input:focus {
        border-color: #F3DEBA;
        background-color: #F3DEBA;
        color: black;
    }


    button {
        height: 30px;
        width: 100%;
        border: 2px solid #ABC4AA;
        border-radius: 0.375rem !important;
        outline: 0;
        background-color: #F3DEBA;
        /* padding: 0.75rem 1rem;s */
        color: black;
    }

    button:hover {
        background-color: #ABC4AA;

    }
</style>
@extends('necessary.admin_template')
@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" />

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <section class="form col-md-4 col-sm-12 col-lg-4 col-xl-4">
        <h2>Add New Vehicle Stop</h2>
        <form action="{{ route('storeStops') }}" method="POST">
            @csrf
            <label> Info: </label>
            <input type="text" name="info" required>
            <br>
            <label> Latitude: </label>
            <input type="text" name="latitude" required>
            <br>
            <label> Longitude: </label>
            <input type="text" name="longitude" required>
            <br>
            <label> Vehicle Stops: </label>
            <br>
            <select name="vehicle_type">
                <option value="">Select</option>
                <option value="bus">Bus</option>
                <option value="micro">Micro</option>
                <option value="tempo">Tempo</option>
            </select>
            <button type="submit" class="mt-2"> Add </button>
            {{-- <input class="butt" type="button" value="Show Dustbins" onClick="window.location.reload(true)"> --}}
        </form>
    </section>

    <section>
        <h1>Nearest Bus Stop</h1>

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
                    // var places = [{
                    //         name: 'Place 1',
                    //         latitude: 27.6982600,
                    //         longitude: 85.2993750
                    //     },
                    //     {
                    //         name: 'Place 2',
                    //         latitude: 27.6847670,
                    //         longitude: 85.2993170
                    //     },
                    //     {
                    //         name: 'Place 3',
                    //         latitude: 27.694079,
                    //         longitude: 85.297393
                    //     }
                    // ];
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

            //  find the nearest marker using Dijkstra's algorithm
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
