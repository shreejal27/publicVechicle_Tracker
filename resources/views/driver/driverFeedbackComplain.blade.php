<link rel="stylesheet" type="text/css" href="{{ asset('formStyles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('tableStyles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('pillStyles.css') }}">

@extends('necessary.driver_template')
@section('content')
    @if (session('success'))
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 5000
            })
        </script>
    @endif

    <div>
        <ul class="nav nav-pills mt-2 ml-2">
            <li class="nav-item" data-path="form">
                <a class="nav-link active" data-toggle="tab" href="#form" aria-selected="true">Form</a>
            </li>
            <li class="nav-item" data-path="sentForms">
                <a class="nav-link " data-toggle="tab" href="#sentForm" aria-selected="false">Sent Forms</a>
            </li>
        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="form" role="tabpanel" data-path="form">
            <div class="center-container mt-5">
                <div class="form-container col-md-4 mb-3">
                    <p class="title">We are here to assist you</p>
                    <p class="subtitle">Please complete the form below</p>
                    <form class="form" id="userComplainFeedback" action="{{ route('storeComplainFeedback') }}"
                        method="POST">
                        @csrf

                        <input type="hidden" name="fullname" value="{{ $dName }}">
                        <input type="hidden" name="email" value="{{ $dEmail }}">
                        <input type="hidden" name="number" value="{{ $dNumber }}">

                        <div class="input-group">
                            <label> Type:</label>
                            <select name="type" required>
                                <option value="complain">Complain</option>
                                <option value="feedback">Feedback</option>
                                <option value="query">Query</option>
                                <option value="request">Request</option>
                            </select>
                            <div class="input-group">
                                <label>Subject:</label>
                                <input type="text" name="subject" required>
                            </div>
                        </div>
                        <div class="input-group">
                            <label>Description:</label>
                        </div>
                        <textarea name="description" placeholder="Write your message here" rows="5"></textarea>

                        <button class="sign mt-3" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade" id="sentForm" role="tabpanel" data-path="sentForm">
            <section>
                <table class="table table-hover col-md-10 col-sm-12 col-lg-10 col-xl-10" id="complainFeedback">
                    <thead>
                        <tr>
                            <th class="text-center" colspan="4">All Sent Forms</th>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <th>Type</th>
                            <th>Subject</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($complainFeedbacksBySpecificDriver->isEmpty())
                            <td colspan="4">No forms have been submitted yet. </td>
                        @else
                            @foreach ($complainFeedbacksBySpecificDriver as $complainFeedback)
                                <tr>

                                    <td>{{ \Carbon\Carbon::parse($complainFeedback->created_at)->format('Y-m-d (l)') }}</td>
                                    <td>{{ $complainFeedback->type }}</td>
                                    <td>{{ $complainFeedback->subject }}</td>
                                    <td>{{ $complainFeedback->description }}</td>
                                </tr>
                            @endforeach
                        @endif
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
@endsection
