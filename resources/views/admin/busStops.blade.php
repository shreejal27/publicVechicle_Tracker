<style>
    #map {
        height: 400px;
        width: 100%;
    }

    label {
        display: inline-block;
        width: 75px;
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

    <section class="form">
        <h2>Add new Location for BusStops</h2>
        <form action="dustbinDatabase.php" method="POST">
            <label> Latitude: </label>
            <input type="text" name="lat" required></input>
            <br>
            <label> Longitude: </label>
            <input type="text" name="lon" required></input>
            <br> <br>
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
                zoom: 12,
                center: {
                    lat: 27.7172,
                    lng: 85.324
                },
            };
            //new map
            var map = new google.maps.Map(document.getElementById("map"), options);
        }
    </script>
    <script async
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD3U0k0wYHv6RGnT6_JYOMxMTJVfa8vL48&callback=initMap"></script>
@endsection
