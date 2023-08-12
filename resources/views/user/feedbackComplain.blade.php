<link rel="stylesheet" type="text/css" href="{{ asset('formStyles.css') }}">
@extends('necessary.user_template')
@section('content')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="center-container mt-5">
        <div class="form-container col-md-4 mb-3">
            <p class="title">We are here to assist you</p>
            <p class="subtitle">Please complete the form below</p>
            <form class="form" id="userCredentialForm" action="{{ route('storeComplainFeedback') }}" method="POST">
                @csrf
                <div class="input-group">
                    <label>UserName:</label>
                    <input type="text" name="username" required>
                </div>
                <div class="input-group">
                    <label>Select Issue:</label>
                    <select name="formType" required>
                        <option value="complain">Complain</option>
                        <option value="feedback">Feedback</option>
                        <option value="query">Query</option>
                        <option value="request">Request</option>
                    </select>

                </div>
                <div class="input-group">
                    <label>Message:</label>
                </div>
                <textarea name="formDescription" placeholder="Write your message here" rows="5"></textarea>

                <button class="sign mt-3" type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection
