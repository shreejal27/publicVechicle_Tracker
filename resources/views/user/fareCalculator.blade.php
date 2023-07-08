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

        Fare Calculator
        <form action="{{ route('calculateFare') }}" method="POST">
            @csrf
            <label>From: </label>
            <input type="text" name="from"> <br>
            <label>To: </label>
            <input type="text" name="to"> <br>
            <label>Total Weight: </label>
            <input type="text" name="weight"><br>
            <button type="submit">Calculate</button>
        </form>
    </section>
@endsection
