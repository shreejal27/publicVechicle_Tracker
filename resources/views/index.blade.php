<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('styles.css') }}">
    <style>
        .header {
            color: red;
        }
    </style>
</head>

<body>
    @include('necessary.header')
    @include('necessary.sidebarUser')
    <h1>This is Index File</h1>
    @include('necessary.footer')
</body>

</html>
