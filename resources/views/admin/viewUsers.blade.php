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
        <table class="table table-hover col-md-6 col-sm-6 col-lg-6 col-xl-6" id="userTable">
            <thead>
                <th colspan="5"> All Users</th>
                <tr>
                    <th>SN</th>
                    <th>Name</th>
                    <th>Email </th>
                    <th>Number</th>
                    <th>UserName</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user['firstname'] }} {{ $user['lastname'] }}</td>
                        <td>{{ $user['email'] }}</td>
                        <td>{{ $user['contact_number'] }}</td>
                        <td>{{ $user['username'] }}</td>
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
            $('#userTable').DataTable({
                "order": [
                    [0, "asc"]
                ],
            });
        });
    </script>
@endsection
