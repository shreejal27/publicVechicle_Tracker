<style>
    #map {
        height: 400px;
        width: 100%;
    }

    label {
        display: inline-block;
        width: 9rem;
    }

    button,
    .butt {
        transition-duration: 0.5s;
        background-color: green;
        color: black;
        border: none;
        padding: 10px 25px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
    }

    button:hover {
        background-color: #00b300;
        color: white;
    }

    .butt:hover {
        background-color: #00b300;
        color: white;
    }
</style>
@extends('necessary.admin_template')
@section('content')
    <section>
        <h1>This is busStops</h1>
    </section>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <section class="form">
        <h2>Add new Location for BusStops</h2>
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
            <select name="vehicle_type">
                <option value="">Select</option>
                <option value="bus">Bus</option>
                <option value="micro">Micro</option>
                <option value="temp">Tempo</option>
            </select>
            <br>
            <br>
            <button type="submit"> Add </button>
            <input class="butt" type="button" value="Show Dustbins" onClick="window.location.reload(true)">
        </form>
    </section>
    <section class="map">
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
                    // 27.698260, 85.299375
                },
            };
            //new map
            var map = new google.maps.Map(document.getElementById("map"), options);

            // Add marker
            const marker = new google.maps.Marker({
                position: {
                    lat: 27.6942,
                    lng: 85.2985
                },
                map,
                title: "My House",
                icon: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png'
            });

            const infoWindow = new google.maps.InfoWindow({
                content: "Shree's House",
            });

            marker.addListener("click", () => {
                infoWindow.open(map, marker);
            });
        }
    </script>
    <script async
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD3U0k0wYHv6RGnT6_JYOMxMTJVfa8vL48&callback=initMap"></script>
@endsection
