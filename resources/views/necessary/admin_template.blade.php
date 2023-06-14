<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Public Vehicle Tracker</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('styles.css') }}">
</head>

<body>
    <div class="container">
        <aside class="sidebar">
            <div>
                <p>Public Vechicle Tracker </p>
                <p>Hello Admin!</p>
                <br>
                <a href="/dashboard">Dashboard</a><br>
                <a href="/trackVehicle">Active Public Vechicle (Route)</a><br>
                <a href="/busStop">Bus Stops / (Add vechicle)</a><br>
                <a href="/fareCalculator">Fare Price</a><br>
                <a href="/viewDrivers">View Drivers (Reports)</a><br>
                <a href="/logout">Logout</a><br>
                <br>
            </div>
        </aside>


        <main>
            @yield('content')
        </main>
    </div>

    @include('necessary.footer')
</body>

</html>