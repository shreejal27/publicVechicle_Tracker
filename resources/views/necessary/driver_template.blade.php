<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Public Vehicle Tracker</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
    <script src="https://kit.fontawesome.com/74ddeb49ef.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="container col-md-12 col-sm-12 col-xs-12" style="padding:0">
        <aside class="sidebar">
            <div>
                <section class="text-center">
                    <img src="{{ asset('images/logo/trackerLogo.png') }}" alt="logo" class="logo" width="80px"
                        style="margin-top: -20px;">
                    <h3>
                        <p class="font-weight-bold">Public Vehicle Tracker</p>
                    </h3>
                    <h5>
                        <p id="greetings"> </p>
                        <p>{{ ucfirst(session('driverName')) }} </p>
                    </h5>
                </section>
                <br>
                <a href="/driverDashboard" class="sidebarLink">Dashboard</a><br><br>
                <a href="/driverProfile" class="sidebarLink">Profile </a><br><br>
                <a href="/driverLiveLocation" class="sidebarLink">Share Live Location</a><br><br>
                <a href="/driverFareCalculator" class="sidebarLink">Fare Calculator</a><br><br>
                <a href="#" class="sidebarLink">FeedBack/Complain/Ratings</a><br><br>
                <a href="/driverLogout" class="sidebarLink">Logout</a><br><br>
                <br>
            </div>
        </aside>


        <main class="">
            @yield('content')
        </main>
    </div>

    @include('necessary.footer')
    <script src="greetings.js" type="text/javascript"></script>
    <script src="sidebarActive.js" type="text/javascript"></script>
</body>

</html>
