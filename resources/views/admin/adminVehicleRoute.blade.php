@extends('necessary.admin_template')
@section('content')

    <section>
        <h2>Add Vechicle Route</h2>
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <form action="{{ route('storeVehicleRoute') }}" method="POST">
            @csrf
            <label for="vechicle">Vechicle Name: </label>
            <input type="text" name="vehicle_name" required>
            <br>
            <label for="route">Route: </label>
            <input type="text" name="vehicle_routes" required>
            <br>
            <button type="submit">Add</button>
    </section>
    <section>
        <h2>Vechicle Routes</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Vehicle Name</th>
                    <th>Vehicle Routes</th>
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
