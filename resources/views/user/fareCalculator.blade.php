<link rel="stylesheet" type="text/css" href="{{ asset('formStyles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('tableStyles.css') }}">

@extends('necessary.user_template')
@section('content')
    <section>
        <script>
            Swal.fire({
                position: 'top-end',
                title: 'Passengers can carry goods up to 15 kg for free <br> <br> Rs 5 per kg will be charged for more than 10 kg. ',
                showCloseButton: true,
            })
        </script>
        <table class="table table-hover col-md-5 col-sm-12 col-lg-5 col-xl-5">
            <thead>
                <tr>
                    <th class="text-center" colspan="3">Fare List</th>
                </tr>
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

        <hr>
        <br>
        <div class="center-container">
            <div class="form-container  mb-3">
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
