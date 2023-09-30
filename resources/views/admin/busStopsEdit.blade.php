<link rel="stylesheet" type="text/css" href="{{ asset('formStyles.css') }}">
@extends('necessary.admin_template')
@section('content')
    <section>
        <div class="center-container mt-5">
            <div class="form-container col-md-4 mb-3">
                <p class="title">Edit Stop Details</p>
                <form class="form" action="{{ route('stopUpdate', $stop->id) }}" method="POST">
                    @csrf
                    <div class="input-group">
                        <label>Info:</label>
                        <input type="text" name="info" value="{{ $stop->info }}">
                    </div>
                    <div class="input-group">
                        <label>Latitude:</label>
                        <input type="text" name="latitude" value="{{ $stop->latitude }}">
                    </div>
                    <div class="input-group">
                        <label>Longitude:</label>
                        <input type="text" name="longitude" value="{{ $stop->longitude }}">
                    </div>
                    <div class="input-group">
                        <label>Vehicle Stops:</label>
                        <select name="vehicle_type">
                            <option value="{{ $stop->vehicle_type }}">{{ ucfirst($stop->vehicle_type) }}</option>
                            <option value="bus">Bus</option>
                            <option value="micro">Micro</option>
                            <option value="tempo">Tempo</option>
                        </select>
                    </div>
                    <button class="sign mt-3" type="submit">Update</button>
                </form>
            </div>
        </div>
    </section>
@endsection
