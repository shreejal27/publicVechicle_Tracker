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
    </section>

    <script>
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

            @foreach ($stops as $stop)
                {
                    const marker = new google.maps.Marker({
                        position: {
                            lat: {{ $stop->latitude }},
                            lng: {{ $stop->longitude }}
                        },
                        map,
                        title: "{{ $stop->info }}",
                        icon: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png'
                        
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
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD3U0k0wYHv6RGnT6_JYOMxMTJVfa8vL48&callback=initMap" async
        defer></script>
@endsection
