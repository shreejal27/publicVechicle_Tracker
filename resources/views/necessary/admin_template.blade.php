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
    <script src="https://kit.fontawesome.com/74ddeb49ef.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
</head>

<body>
    <div class="container col-md-12 col-sm-12 col-xs-12" style="padding:0">
        <aside class="sidebar ">
            <div>
                <section class="text-center">
                    <img src="{{ asset('images/logo/trackerLogo.png') }}" alt="logo" class="logo" width="80px"
                        style="margin-top: -20px;">
                    <h3>
                        <p class="font-weight-bold">Public Vehicle Tracker </p>
                    </h3>
                    <h5>

                        <p id="greetings"> </p>
                        <p>{{ ucfirst(session('adminName')) }}</p>
                    </h5>
                </section>

                <br>
                <a href="/adminDashboard" class="sidebarLink">
                    <i class="fa-solid fa-chalkboard-user"></i>
                    Dashboard</a><br><br>
                <a href="/adminActivePublicVehicle" class="sidebarLink">
                    <i class="fa-solid fa-bus"></i>
                    Active Public Vehicle</a><br><br>
                <a href="/adminVehicleRoute" class="sidebarLink">
                    <i class="fa-solid fa-route"></i>
                    Vehicle Route</a><br><br>
                <a href="/adminBusStops" class="sidebarLink">
                    <i class="fa-solid fa-location-dot"></i>
                    All Stops</a><br><br>
                <a href="/adminFarePrice" class="sidebarLink">
                    <i class="fa-solid fa-calculator"></i>
                    Fare Price</a><br><br>
                <a href="/adminComplainFeedback" class="sidebarLink">
                    <i class="fa-solid fa-message"></i>
                    All Tickets</a><br><br>
                <a href="/adminViewDriversReports" class="sidebarLink">
                    <i class="fa-solid fa-users-gear"></i>
                    Drivers //Ratings </a><br><br>
                <a href="/adminViewUsers" class="sidebarLink">
                    <i class="fa-solid fa-users"></i>
                    Users </a><br><br>
                <a href="/adminLogout" class="sidebarLink">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    Logout</a><br><br>
                <br>
            </div>
        </aside>


        <main>
            @yield('content')
            @if (session('error'))
                <script>
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: '{{ session('error') }}',
                        showConfirmButton: false,
                        timer: 2500
                    })
                </script>
            @endif
            @if (session('message'))
                <script>
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: '{{ session('message') }}',
                        showConfirmButton: false,
                        timer: 2500
                    })
                </script>
            @endif
        </main>
    </div>

    @include('necessary.footer')
    <script src="greetings.js" type="text/javascript"></script>
    <script src="sidebarActive.js" type="text/javascript"></script>
</body>

</html>
