@extends('necessary.driver_template')
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

        Fare Calculator
        <form action="{{ route('calculateDriverFare') }}" method="POST">
            @csrf
            <label>From: </label>
            <input type="text" name="from" required> <br>
            <label>To: </label>
            <input type="text" name="to" required> <br>
            <label>Additional Weight: </label>
            <input type="text" name="weight"><br>
            <button type="submit">Calculate</button>
        </form>
        @if ($sessionValue != 0)
            @if ($totalFare == 0)
                <p> No vehicle with input route found </p>
            @else
                <p> Total Distance: {{ $distance }} km</p>
                <p> Total Cost: {{ $totalFare }}</p>
            @endif
        @endif
    </section>
@endsection
