<link rel="stylesheet" type="text/css" href="{{ asset('tableStyles.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">

<style>
    table.dataTable {
        border-collapse: collapse !important;
    }
</style>
@extends('necessary.admin_template')
@section('content')
    <section class="m-3 mt-4">
        <table class="table table-hover col-md-12 col-sm-12 col-lg-12 col-xl-12" id="driverTable">
            <thead>
                <th colspan="8"> All Drivers</th>
                <tr>
                    <th>SN</th>
                    <th>Name</th>
                    <th>Address </th>
                    <th>License Number</th>
                    <th>Vechicle</th>
                    <th>Number</th>
                    <th>Status</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($drivers as $driver)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $driver['firstname'] }} {{ $driver['lastname'] }}</td>
                        <td>{{ $driver['address'] }}</td>
                        <td>{{ $driver['license_number'] }}</td>
                        <td>{{ $driver['vehicle_type'] }}</td>
                        <td>{{ $driver['contact_number'] }}</td>
                        <td data-status="{{ $workingDriverId->contains($driver->id) ? '0' : '1' }}"
                            style="vertical-align: middle;">
                            @if ($workingDriverId->contains($driver->id))
                                <i class="fa-solid fa-toggle-on fa-lg"></i>
                            @else
                                <i class="fa-solid fa-toggle-off fa-lg"></i>
                            @endif
                        </td>

                    </tr>
                @endforeach

            </tbody>
        </table>
    </section>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#driverTable').DataTable({
                "order": [
                    [0, "asc"]
                ],
                "columnDefs": [{
                    "orderable": true,
                    "targets": [6],
                    "type": "dom-status"
                }]
            });
        });
    </script>
@endsection
