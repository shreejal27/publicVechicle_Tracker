<link rel="stylesheet" type="text/css" href="{{ asset('tableStyles.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">

<style>
    table.dataTable {
        border-collapse: collapse !important;
    }

    th {
        text-align: center !important;
    }

    .page-item.active .page-link {
        color: #F3DEBA !important;
        background-color: #675D50 !important;
        border-color: #F3DEBA !important;
    }

    .page-link {
        color: #F3DEBA !important;
        background-color: #675D50 !important;
        border: 1px solid #F3DEBA !important;
    }

    .page-link:hover {
        color: #F3DEBA !important;
        background-color: #585045 !important;
        border-color: #F3DEBA !important;
    }
</style>
@extends('necessary.admin_template')

@section('content')
    <section class="m-3 mt-4">
        <table class="table table-hover col-md-12 col-sm-12 col-lg-12 col-xl-12" id="complainFeedback">
            <thead>
                <th colspan="8"> All Requests</th>
                <tr>
                    <th>SN</th>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Number </th>
                    <th>Type</th>
                    <th>Subject</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($complainFeedbacks as $complainFeedback)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ \Carbon\Carbon::parse($complainFeedback['created_at'])->format('Y-m-d (l)') }}</td>
                        <td>{{ $complainFeedback['fullname'] }}</td>
                        <td>{{ $complainFeedback['email'] }}</td>
                        <td>{{ $complainFeedback['number'] }}</td>
                        <td>{{ $complainFeedback['type'] }}</td>
                        <td>{{ $complainFeedback['subject'] }}</td>
                        <td>{{ $complainFeedback['description'] }}</td>
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
            $('#complainFeedback').DataTable();
        });
    </script>
@endsection
