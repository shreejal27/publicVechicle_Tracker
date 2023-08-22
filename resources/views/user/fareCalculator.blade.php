<link rel="stylesheet" type="text/css" href="{{ asset('formStyles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('tableStyles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('pillStyles.css') }}">

@extends('necessary.user_template')
@section('content')

    <div>
        <ul class="nav nav-pills mt-2 ml-2">
            <li class="nav-item" data-path="fareCalculator">
                <a class="nav-link active" data-toggle="tab" href="#fareCalculator" aria-selected="true">Fare Calculator</a>
            </li>
            <li class="nav-item" data-path="fareTable">
                <a class="nav-link " data-toggle="tab" href="#fareTable" aria-selected="false">Fare Table</a>
            </li>
            <li class="ml-auto mt-2 mr-3">
                <i class="fa-solid fa-circle-info fa-2xl" style="color: #A9907E; cursor:pointer;"
                    onclick="information()"></i>
            </li>
        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade" id="fareTable" role="tabpanel" data-path="fareTable">
            <section>
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
            </section>
        </div>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="fareCalculator" role="tabpanel" data-path="fareCalculator">
            <section>
                <div class="center-container">
                    <div class="form-container mt-3">
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
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            // Show the active tab content on page load
            $('.nav-pills .active a').tab('show');

            // Update the active tab content when a new tab is clicked
            $('.nav-pills a').on('click', function(event) {
                event.preventDefault();
                var path = $(this).data('path');
                $('.tab-content .tab-pane').removeClass('show active');
                $('.tab-content').find('[data-path="' + path + '"]').addClass('show active');
            });
        });
    </script>
    <script>
        function information() {
            Swal.fire({
                position: 'top-end',
                title: 'Passengers can carry goods up to 15 kg for free <br> <br> Rs 5 per kg will be charged for more than 10 kg. ',
                showConfirmButton: false,
                timer: 7000
            })
        }
    </script>
@endsection
