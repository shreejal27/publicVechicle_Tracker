<style>
    #map {
        height: 500px;
        width: 100%;
    }
</style>
@extends('necessary.user_template')
@section('content')
    <h1>This is user nearest bus stop</h1>
    <section class="maps">
        <h1 class="center"> Available Bus Stops</h1>
        <br>
        <div id="map"></div>
        <br>
        <p>Click the button to get your coordinates.</p>
        <button onclick="getLocation()">Try It</button>
        <p id="demo"></p>
    </section>

    <script>
        var x = document.getElementById("demo");
        var lat, lng;

        function initMap() {
            var options = {
                zoom: 15,
                center: {
                    lat: 27.694261,
                    lng: 85.298516
                }
            };

            // Create a new map instance
            var map = new google.maps.Map(document.getElementById("map"), options);

            // Add markers to the map
            const userIcon = {
                url: '{{ asset('images/markerIcons/userMarker.png') }}',
                scaledSize: new google.maps.Size(32, 32) // Set the desired size of the icon
            };
            const userMarker = new google.maps.Marker({
                position: {
                    lat: lat,
                    lng: lng
                },
                map,
                title: "You are here",
                icon: userIcon

            });
            const userInfoWindow = new google.maps.InfoWindow({
                content: "You are here"
            });

            userMarker.addListener("click", () => {
                userInfoWindow.open(map, userMarker);
            });

            // Add markers for bus stops
            @foreach ($stops as $stop)
                {
                    const icon = {
                        @if ($stop->vehicle_type == 'bus')
                            url: '{{ asset('images/markerIcons/B.png') }}',
                        @elseif ($stop->vehicle_type == 'micro')
                            url: '{{ asset('images/markerIcons/M.png') }}',
                        @elseif ($stop->vehicle_type == 'tempo')
                            url: '{{ asset('images/markerIcons/T.png') }}',
                        @endif
                        scaledSize: new google.maps.Size(32, 32) // Set the desired size of the icon
                    };
                    const marker = new google.maps.Marker({
                        position: {
                            lat: {{ $stop->latitude }},
                            lng: {{ $stop->longitude }}
                        },
                        map,
                        title: "{{ $stop->info }}",
                        icon: icon
                    });
                    const infoWindow = new google.maps.InfoWindow({
                        content: "{{ $stop->info }}",
                    });

                    marker.addListener("click", () => {
                        infoWindow.open(map, marker);
                    });
                }
            @endforeach
        }

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError, {
                    enableHighAccuracy: true
                });
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }

        function showPosition(position) {
            // Update the latitude and longitude variables
            lat = position.coords.latitude;
            lng = position.coords.longitude;

            console.log(lat, lng);


            // Call the function to initialize the map
            initMap();
        }

        function showError(error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    x.innerHTML = "User denied the request for Geolocation.";
                    break;
                case error.POSITION_UNAVAILABLE:
                    x.innerHTML = "Location information is unavailable.";
                    break;
                case error.TIMEOUT:
                    x.innerHTML = "The request to get user location timed out.";
                    break;
                case error.UNKNOWN_ERROR:
                    x.innerHTML = "An unknown error occurred.";
                    break;
            }
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD3U0k0wYHv6RGnT6_JYOMxMTJVfa8vL48&callback=initMap" async
        defer></script>
@endsection
