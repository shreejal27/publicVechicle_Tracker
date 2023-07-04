@extends('necessary.admin_template')
@section('content')
    <section class="title">
        <h1>Edit Vehicle Route</h1>
    </section>
    <section>
        <form action="{{ route('updateVehicleRoute', $vehicleDetails->id) }}" method="post">
            @csrf
            <label>Vehicle Name:</label>
            <input type="text" name="vehicle_name" value="{{ $vehicleDetails->vehicle_name }}"> <br>
            <label>Vehicle Routes:</label>
            <input type="text" name="vehicle_routes" value="{{ $vehicleDetails->vehicle_routes }}"> <br>
            <input type="submit" value="Update">
        </form>
    </section>
@endsection
