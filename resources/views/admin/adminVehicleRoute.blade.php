<link rel="stylesheet" type="text/css" href="{{ asset('formStyles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('tableStyles.css') }}">
<style>
    td a {
        text-decoration: none;
        color: black;
    }

    td a:hover {
        text-decoration: none;
        color: red;
    }
</style>
@extends('necessary.admin_template')
@section('content')
    <section class="mt-4">
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <div class="center-container">
            <div class="form-container  mb-3">
                <p class="title">Add Vechicle Route</p>
                <form class="form" action="{{ route('storeVehicleRoute') }}" method="POST">
                    @csrf
                    <div class="input-group">
                        <label>Vechicle Name:</label>
                        <input type="text" name="vehicle_name" required>
                    </div>
                    <div class="input-group">
                        <label>Route:</label>
                        <input type="text" name="vehicle_routes" required>
                    </div>
                    <button class="sign mt-3" type="submit">Add</button>
                </form>
            </div>
        </div>
    </section>
    <section class="m-3 mt-4">

        <table class="table table-hover col-md-10 col-sm-10 col-lg-10 col-xl-10">
            <thead>
                <th colspan="4"> Vechicle Routes</th>
                <tr>
                    <th>SN</th>
                    <th>Vehicle Name</th>
                    <th> Routes</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vehicles as $vehicle)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $vehicle->vehicle_name }}</td>
                        <td>{{ $vehicle->vehicle_routes }}</td>
                        <td>
                            <a href="/vehicleRouteEdit/{{ $vehicle->id }}">Edit</a>
                            <a href="/vehicleRouteDelete/{{ $vehicle->id }}"
                                onclick="return confirm('Are you sure you want to delete this fare?')">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection
