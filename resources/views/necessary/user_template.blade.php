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
                <a href="/dashboard">Dashboard</a><br>
                <a href="/track-vehicle">Track Public Vehicle</a><br>
                <a href="/nearest-bus-stop">Nearest Bus Stop</a><br>
                <a href="/fare-calculator">Fare Calculator</a><br>
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
