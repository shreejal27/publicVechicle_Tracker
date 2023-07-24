@extends('necessary.user_template')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" />
    <style>
        #map {
            height: 600px;
        }
    </style>
    <section>
        <h1>Track Live Public Vehicle</h1>
        <div id="map"></div>
        <table id="driverTable">
            <tr>
                <th>Driver ID</th>
                <th>Latitude</th>
                <th>Longitude</th>
            </tr>
            <!-- Rows will be dynamically added using JavaScript -->
        </table>
        <script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.2.12/leaflet-routing-machine.min.js">
        </script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            var map = L.map('map').setView([0, 0], 16);

            function updateDriverTable() {
                $.ajax({
                    url: "/getDriverLocations",
                    method: "GET",
                    dataType: "json",
                    success: function(response) {
                        // Assuming your table has an ID 'driverTable'
                        var driverTable = document.getElementById('driverTable');
                        driverTable.innerHTML = ""; // Clear the table content

                        // Loop through the response data and update the table rows
                        response.forEach(function(driverLocation) {
                            var row = driverTable.insertRow();
                            var cell1 = row.insertCell(0);
                            var cell2 = row.insertCell(1);
                            var cell3 = row.insertCell(2);
                            cell1.innerHTML = driverLocation.driver_id;
                            cell2.innerHTML = driverLocation.latitude;
                            cell3.innerHTML = driverLocation.longitude;
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching driver locations:', error);
                    }
                });
            }

            // Call the updateDriverTable function every second
            setInterval(updateDriverTable, 1000);
        @endsection
