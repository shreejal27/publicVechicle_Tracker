<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Public Vehicle Tracker</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles.css') }}">
</head>

<body>
    @include('necessary.header')

    <div class="container col-md-12" style="padding:0">
        <main>
            @yield('content')
        </main>
    </div>

    @include('necessary.outerFooter')
</body>

</html>
