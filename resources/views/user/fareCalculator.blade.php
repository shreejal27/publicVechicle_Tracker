<link rel="stylesheet" type="text/css" href="{{ asset('formStyles.css') }}">
@extends('necessary.user_template')
@section('content')
    <section>
        <h2>Fare List</h2>
        <table>
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Distance (in kms)</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fares as $fare)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $fare->distance }}</td>
                        <td>{{ $fare->price }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <p>Note: Passengers can carry goods up to 15 kg for free and Rs5 per kg will be charged for more than 10 kg.
        </p>
        <div class="center-container">
            <div class="form-container mt-5">
                <p class="title">Fare Calculator</p>
                <form class="form" id="userCredentialForm" action="{{ route('calculateFare') }}" method="POST">
                    @csrf
                    <div class="input-group">
                        <label>From:</label>
                        <input type="text" name="from" required>
                    </div>
                    <div class="input-group">
                        <label>To</label>
                        <input type="text" name="to" required>
                    </div>
                    <div class="input-group">
                        <label>Total Weight:</label>
                        <input type="text" name="weight">
                    </div>
                    <button class="sign mt-3" type="submit">Calculate</button>
                </form>
            </div>
        </div>
        @if ($sessionValue != 0)
            @if ($matchingVehicleNames)
                <p> Total Cost: {{ $totalFare }}</p>
                @foreach ($matchingVehicleNames as $vehicleName)
                    <p>Suggested Vehicle: {{ $vehicleName }}</p>
                    <br>
                @endforeach
            @else
                <p>No matching vehicle found</p>
            @endif
        @endif
    </section>
@endsection
