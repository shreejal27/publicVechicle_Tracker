<link rel="stylesheet" type="text/css" href="{{ asset('tableStyles.css') }}">
@extends('necessary.admin_template')

@section('content')
    <section class="m-3 mt-4">
        <table class="table table-hover col-md-12 col-sm-12 col-lg-12 col-xl-12">
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
@endsection
