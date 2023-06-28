@extends('necessary.user_template')
@section('content')
    <div>
        this is
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            function calculateDistanceWithApi(origin, destination, api_key) {
                var url = "https://maps.googleapis.com/maps/api/directions/json?origin=" + origin + "&destination=" +
                    destination + "&key=" + api_key;
                $.get(url, function(data) {
                    if (data.status === "OK") {
                        var distance = data.routes[0].legs[0].distance.value;
                        var distance_in_km = distance / 1000; // Convert meters to kilometers
                        console.log(distance_in_km);
                    } else {
                        console.log("Error: " + data.status);
                    }
                });
            }

            // Usage example
            var origin = "New York, USA";
            var destination = "Los Angeles, USA";
            var api_key = "AIzaSyBjSVKmV2clpfy1wCZJj9OwYTnYS4YRuFQ";
            calculateDistanceWithApi(origin, destination, api_key);
        </script>
    </div>
@endsection
