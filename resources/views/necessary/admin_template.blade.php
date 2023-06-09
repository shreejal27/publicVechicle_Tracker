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
                <section class="text-center">
                    <h3>

                        <p class="font-weight-bold">Public Vehicle Tracker </p>
                    </h3>
                    <h5>

                        <p id="greetings"> </p>
                        <p>Admin</p>
                    </h5>
                </section>

                <br>
                <a href="/adminDashboard">Dashboard</a><br><br>
                <a href="/adminActivePublicVehicle">Active Public Vehicle</a><br><br>
                <a href="/adminVehicleRoute">Vehicle Route</a><br><br>
                <a href="/adminBusStops">All Vehicle Stops / (Add)</a><br><br>
                <a href="/adminFarePrice">Fare Price</a><br><br>
                <a href="/viewFeedbackComplain"> FeedBack/Complain/Query </a><br><br>
                <a href="/adminViewDriversReports"> Drivers (Status/Ratings) </a><br><br>
                <a href="/adminLogout">Logout</a><br><br>
                <br>
            </div>
        </aside>


        <main>
            @yield('content')
        </main>
    </div>

    @include('necessary.footer')
    <script type="text/javascript">
        const currentHour = new Date().getHours();
        const greeting = document.getElementById("greetings");

        if (currentHour >= 5 && currentHour < 12) {
            greeting.textContent = "Good Morning! ";
        } else if (currentHour >= 12 && currentHour < 18) {
            greeting.textContent = "Good Afternoon! ";
        } else {
            greeting.textContent = "Good Evening! ";
        }
    </script>
</body>

</html>
