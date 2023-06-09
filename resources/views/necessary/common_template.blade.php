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
    @include('necessary.header')

    <div class="container">
        <aside>
            <div>

                Dashboard <br>
                Track Public Vechicle<br>
                Nearest Bus Stop <br>
                Fare Calculator<br>
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
