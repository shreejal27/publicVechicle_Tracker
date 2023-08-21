<link rel="stylesheet" type="text/css" href="{{ asset('formStyles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('tableStyles.css') }}">
<style>
    #map {
        height: 500px;
        width: 100%;
    }
</style>
@extends('necessary.admin_template')
@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" />
    <section class="mt-4">
        @if (session('message'))
            <script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: '{{ session('message') }}',
                    showConfirmButton: false,
                    timer: 2500
                })
            </script>
        @endif
        <div class="center-container">
            <div class="form-container col-md-4 mb-3">
                <p class="title">Add New Vehicle Stop</p>
                <form class="form" action="{{ route('storeStops') }}" method="POST">
                    @csrf
                    <div class="input-group">
                        <label>Info:</label>
                        <input type="text" name="info" required>
                    </div>
                    <div class="input-group">
                        <label>Latitude:</label>
                        <input type="text" name="latitude" required>
                    </div>
                    <div class="input-group">
                        <label>Longitude:</label>
                        <input type="text" name="longitude" required>
                    </div>
                    <div class="input-group">
                        <label>Vehicle Stops:</label>
                        <select name="vehicle_type">
                            <option value="">Select</option>
                            <option value="bus">Bus</option>
                            <option value="micro">Micro</option>
                            <option value="tempo">Tempo</option>
                        </select>
                    </div>
                    <button class="sign mt-3" type="submit">Add</button>
                </form>
            </div>
        </div>
    </section>
    <section class="m-3 mt-4">
        <table class="table table-hover col-md-9 col-sm-9 col-lg-9 col-xl-9">
            <thead>
                <th colspan="6"> Stop List</th>
                <tr>
                    <th>SN</th>
                    <th>Location </th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Vehicle Stop</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stops as $stop)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td style="text-align: left">{{ ucfirst($stop->info) }}</td>
                        <td>{{ $stop->latitude }}</td>
                        <td>{{ $stop->longitude }}</td>
                        <td>{{ ucfirst($stop->vehicle_type) }}</td>
                        <td>
                            <a href="/stopEdit/{{ $stop->id }}"><i class=" fa fa-solid fa-pen-to-square fa-lg"
                                    style="color: #f3deba;"></i></a>
                            <a href="" data-route="/stopDelete/{{ $stop->id }}"
                                onclick="return confirmDelete(event)"><i class="fa-solid fa-trash fa-lg"
                                    style="color: #f3deba;"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
