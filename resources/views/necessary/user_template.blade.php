<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Public Vehicle Tracker</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
</head>

<body>

    <div class="container col-md-12" style="padding:0">
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
