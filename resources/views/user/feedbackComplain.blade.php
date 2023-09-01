<link rel="stylesheet" type="text/css" href="{{ asset('formStyles.css') }}">
@extends('necessary.user_template')
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

    <div class="center-container mt-5">
        <div class="form-container col-md-4 mb-3">
            <p class="title">We are here to assist you</p>
            <p class="subtitle">Please complete the form below</p>
            <form class="form" id="userComplainFeedback" action="{{ route('storeComplainFeedback') }}" method="POST">
                @csrf

                <input type="hidden" name="fullname" value="{{ $uName }}">
                <input type="hidden" name="email" value="{{ $uEmail }}">
                <input type="hidden" name="number" value="{{ $uNumber }}">

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
@endsection
