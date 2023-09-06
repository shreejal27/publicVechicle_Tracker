<link rel="stylesheet" type="text/css" href="{{ asset('tableStyles.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">

<style>
    table.dataTable {
        border-collapse: collapse !important;
    }

    td {
        cursor: pointer;
    }
</style>
@extends('necessary.admin_template')

@section('content')
    <section class="m-3 mt-4">
        <table class="table table-hover col-md-12 col-sm-12 col-lg-12 col-xl-12" id="complainFeedback">
            <thead>
                <th colspan="8"> All Requests</th>
                <tr>
                    {{-- <th>SN</th> --}}
                    <th>Date</th>
                    <th>Name</th>
                    {{-- <th>Email</th> --}}
                    <th>Number </th>
                    <th>Type</th>
                    <th>Subject</th>
                    {{-- <th>Description</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($complainFeedbacks as $complainFeedback)
                    <tr data-description="{{ $complainFeedback['description'] }}"
                        data-email="{{ $complainFeedback['email'] }}">
                        {{-- <td>{{ $loop->iteration }}</td> --}}
                        <td>{{ \Carbon\Carbon::parse($complainFeedback['created_at'])->format('Y-m-d (l)') }}</td>
                        <td>{{ $complainFeedback['fullname'] }}</td>
                        {{-- <td>{{ $complainFeedback['email'] }}</td> --}}
                        <td>{{ $complainFeedback['number'] }}</td>
                        <td>{{ $complainFeedback['type'] }}</td>
                        <td>{{ $complainFeedback['subject'] }}</td>
                        {{-- <td>{{ $complainFeedback['description'] }}</td> --}}
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
            var table = $('#complainFeedback').DataTable({
                "order": [
                    [0, "desc"]
                ],
                "lengthMenu": [5, 10, 25, 50], // Customize the number of entries options
                "pageLength": 10 // Default number of entries shown on page load
            });

            //for click event listener to table rows
            $('#complainFeedback tbody').on('click', 'tr', function() {

                var rowData = table.row(this).data(); // to get data of specific row
                var description = $(this).data('description');
                var email = $(this).data('email');

                // SweetAlert dialog
                var content = '<div style="text-align: left; font-size: 1rem;">' +
                    '<br><strong>Date:</strong> ' + rowData[0] + '<br><br>' +
                    '<strong>Name:</strong> ' + rowData[1] + '<br><br>' +
                    '<strong>Email:</strong> ' + email + '<br><br>' +
                    '<strong>Number:</strong> ' + rowData[2] + '<br><br>' +
                    '<strong>Type:</strong> ' + rowData[3] + '<br><br>' +
                    '<strong>Subject:</strong> ' + rowData[4] + '<br><br>' +
                    '<strong>Description:</strong><br><br> ' + description +
                    '</div>';

                // Display the SweetAlert dialog with the row data
                Swal.fire({
                    title: 'Information',
                    html: content,
                    
                });
            });
        });
    </script>
@endsection
