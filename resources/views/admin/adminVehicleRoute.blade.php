<link rel="stylesheet" type="text/css" href="{{ asset('formStyles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('tableStyles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('pillStyles.css') }}">
@extends('necessary.admin_template')
@section('content')
    <div>
        <ul class="nav nav-pills mt-2 ml-2">
            <li class="nav-item" data-path="vehicleRouteList">
                <a class="nav-link active" data-toggle="tab" href="#vehicleRouteList" aria-selected="true">Vehicle Route
                    List</a>
            </li>
            <li class="nav-item" data-path="vehicleRouteForm">
                <a class="nav-link " data-toggle="tab" href="#vehicleRouteForm" aria-selected="false">Add Vehicle
                    Route</a>
            </li>

        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade " id="vehicleRouteForm" role="tabpanel" data-path="vehicleRouteForm">
            <section class="mt-4">
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
        </div>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="vehicleRouteList" role="tabpanel" data-path="vehicleRouteList">
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
                                    <a href="/vehicleRouteEdit/{{ $vehicle->id }}"><i
                                            class=" fa fa-solid fa-pen-to-square fa-lg" style="color: #f3deba;"></i>
                                    </a>
                                    <a href="/vehicleRouteDelete/{{ $vehicle->id }}"
                                        data-route="{{ route('deleteVehicleRoute', ['id' => $vehicle->id]) }}"
                                        onclick="return confirmDelete(event)">
                                        <i class="fa-solid fa-trash fa-lg" style="color: #f3deba;"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
        function confirmDelete(event) {
            event.preventDefault(); // Prevent the default link behavior
            const route = event.currentTarget.getAttribute('data-route');
            Swal.fire({
                position: 'top-end',
                title: 'Are you sure you want to delete?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = route;
                }
            });
            return false;
        }
    </script>
@endsection
