<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Public Vehicle Tracker</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
    <script src="https://kit.fontawesome.com/74ddeb49ef.js" crossorigin="anonymous"></script>
</head>

<body>
    @include('necessary.header')

    <div class="container col-md-12 col-sm-12 col-xs-12" style="padding:0">
        <main>
            @yield('content')
        @if (session('success'))
            <script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: '{{ session('success') }}',
                    showConfirmButton: false,
                    timer: 2500
                })
            </script>
        @endif
        @if ($errors->any())
                <script>
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Please resubmit the form with valid inputs',
                        showConfirmButton: false,
                        timer: 2500
                    })
                </script>
            @endif
        </main>
    </div>

    @include('necessary.outerFooter')
</body>

</html>
