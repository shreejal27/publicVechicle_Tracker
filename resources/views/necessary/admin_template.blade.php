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
                <a href="/adminDashboard">Dashboard</a><br>
                <a href="/adminActivePublicVechicle">Active Public Vechicle (Route)</a><br>
                <a href="/adminBusStops">Bus Stops / (Add vechicle)</a><br>
                <a href="/adminFarePrice">Fare Price</a><br>
                <a href="/viewFeedbackComplain"> FeedBack/Complain(Reports) </a><br>
                <a href="/adminViewDriversReports"> Drivers (Status/Ratings) </a><br>
                <a href="/adminLogout">Logout</a><br>
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
