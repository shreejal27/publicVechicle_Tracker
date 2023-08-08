<style>
    .logo img {
        margin-top: -15px;
        height: 5rem;
    }
</style>
<header>
    <nav>
        <!-- Navigation menu items -->
        <div class="left float-left w-50">
            <div class="logo float-left">

                <img src="{{ asset('images/logo/trackerLogo.png') }}" alt="logo" class="logo">
            </div>
            <div class="float-left mt-2">
                <p style="font-size: 1.7rem; color: #F3DEBA;">Public Vehicle Tracker</p>
            </div>
        </div>
        <div class="right float-left  w-50 mt-2">
            <ul class=" float-right">
                <li><a href="/index">Home Page</a></li>
                <li><a href="/aboutUs">About Us</a></li>
                <li><a href="/contactUs">Contact Us</a></li>
                <li><a href="/login">Login</a></li>
                <li><a href="/signUp">Sign Up</a></li>
            </ul>
        </div>
    </nav>
</header>

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" sizes="48x48">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Public Vehicle Tracker</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('styles.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">


</head>
