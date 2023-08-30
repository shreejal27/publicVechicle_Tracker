<link rel="stylesheet" type="text/css" href="{{ asset('tableStyles.css') }}">
@extends('necessary.admin_template')
@section('content')
    <section class="m-3 mt-4">
        <table class="table table-hover col-md-12 col-sm-12 col-lg-12 col-xl-12" id="">
            <thead>
                <th colspan="8"> All Drivers</th>
                <tr>
                    <th>SN</th>
                    <th>Name</th>
                    <th>Address </th>
                    <th>License Number</th>
                    <th>Vechicle</th>
                    <th>Number</th>
                    <th>Status</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($drivers as $driver)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $driver['firstname'] }} {{ $driver['lastname'] }}</td>
                        <td>{{ $driver['address'] }}</td>
                        <td>{{ $driver['license_number'] }}</td>
                        <td>{{ $driver['vehicle_type'] }}</td>
                        <td>{{ $driver['contact_number'] }}</td>
                        <td style="vertical-align: middle;">
                            @if ($workingDriverId->contains($driver->id))
                                <i class="fa-solid fa-toggle-on fa-lg"></i>
                            @else
                                <i class="fa-solid fa-toggle-off fa-lg"></i>
                            @endif
                        </td>

                    </tr>
                @endforeach

            </tbody>
        </table>
    </section>
@endsection
