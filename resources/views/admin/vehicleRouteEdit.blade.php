<link rel="stylesheet" type="text/css" href="{{ asset('formStyles.css') }}">
@extends('necessary.admin_template')
@section('content')
    <section>
        <div class="center-container mt-5">
            <div class="form-container col-md-4 mb-3">
                <p class="title">Edit Vehicle Route</p>
                {{-- <p class="subtitle">Add new Fare and Distance</p> --}}
                <form class="form" action="{{ route('updateVehicleRoute', $vehicleDetails->id) }}"
                    method="POST">
                    @csrf
                    <div class="input-group">
                        <label>Vehicle Name:</label>
                        <input type="text" name="vehicle_name" value="{{ $vehicleDetails->vehicle_name }}">
                    </div>
                    <div class="input-group">
                        <label>Price:</label>
                        <input type="text" name="vehicle_routes" value="{{ $vehicleDetails->vehicle_routes }}">
                    </div>
                    <button class="sign mt-3" type="submit">Update</button>
                </form>
            </div>
        </div>
    </section>
@endsection
