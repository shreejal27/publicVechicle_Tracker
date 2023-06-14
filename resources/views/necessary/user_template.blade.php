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
                <p>Hello User!</p>
                <br>
                <a href="/userDashboard">Dashboard</a><br>
                <a href="/userProfile">Profile</a><br>
                <a href="/userTrackPublicVehicle">Track Public Vehicle</a><br>
                <a href="/nearestBusStop">Nearest Bus Stop</a><br>
                <a href="/fareCalculator">Fare Calculator</a><br>
                <a href="/feedbackComplain">Feedback/Complain</a><br>
                <a href="/userLogout">Logout</a><br>
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
