<link rel="stylesheet" type="text/css" href="{{ asset('tableStyles.css') }}">
@extends('necessary.admin_template')
@section('content')
    <section class="m-3 mt-4">
        <table class="table table-hover col-md-12 col-sm-12 col-lg-12 col-xl-12" id="">
            <thead>
                <th colspan="8"> All Requests</th>
                <tr>
                    <th>SN</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Address </th>
                    <th>License Number</th>
                    <th>Vechicle</th>
                    <th>Number</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($drivers as $driver)
                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $driver['firstname'] }}</td>
                        <td>{{ $driver['lastname'] }}</td>
                        <td>{{ $driver['address'] }}</td>
                        <td>{{ $driver['license_number'] }}</td>
                        <td>{{ $driver['vehicle_type'] }}</td>
                        <td>{{ $driver['contact_number'] }}</td>

                    </tr>
                @endforeach

            </tbody>
        </table>
    </section>
@endsection
