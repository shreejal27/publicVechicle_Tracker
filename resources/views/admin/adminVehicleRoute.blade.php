<script src="https://kit.fontawesome.com/74ddeb49ef.js" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('formStyles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('tableStyles.css') }}">

<style>
    td a {
        margin: 0 0.4rem;
    }
</style>
@extends('necessary.admin_template')
@section('content')
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
                            <a href="/vehicleRouteEdit/{{ $vehicle->id }}"><i class=" fa fa-solid fa-pen-to-square fa-lg"
                                    style="color: #f3deba;"></i> </a>

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
                    console.log(route);
                    window.location.href = route;
                }
            });

            return false;
        }
    </script>
@endsection
