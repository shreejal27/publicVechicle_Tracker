<link rel="stylesheet" type="text/css" href="{{ asset('formStyles.css') }}">
@extends('necessary.user_template')
@section('content')
    <style>
        li a {
            color: black !important;
        }

        li .active {
            background-color: #A9907E !important;
            color: #F3DEBA !important;
        }
    </style>
    <div>

        <ul class="nav nav-pills mt-2 ml-2">
            <li class="nav-item" data-path="profile">
                <a class="nav-link active" data-toggle="tab" href="#profile" aria-selected="true">Profile</a>
            </li>
            <li class="nav-item" data-path="updateProfile">
                <a class="nav-link" data-toggle="tab" href="#updateProfile" aria-selected="false">Update Profile</a>
            </li>
            <li class="nav-item" data-path="changeCredentials">
                <a class="nav-link" data-toggle="tab" href="#changeCredentials" aria-selected="false">Change Credentials</a>
            </li>
        </ul>
    </div>
    @if (session('error'))
        <div class="alert alert-success">
            {{ session('error') }}
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="tab-content">
        <div class="tab-pane fade show active" id="profile" role="tabpanel" data-path="profile">
            <div class="center-container">
                <div class="form-container mt-5">
                    <p class="title">Profile</p>
                    <form class="form" action="#">
                        @csrf
                        <div class="input-group">
                            <label>First Name</label>
                            <input type="text" value="{{ $user['firstname'] }}" disabled>
                        </div>
                        <div class="input-group">
                            <label>Last Name </label>
                            <input type="text" value="{{ $user['lastname'] }}" disabled>
                        </div>
                        <div class="input-group">
                            <label>Email</label>
                            <input type="text" value="{{ $user['email'] }}" disabled>
                        </div>
                        <div class="input-group">
                            <label>Contact Number</label>
                            <input type="text" value="{{ $user['contact_number'] }}" disabled>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="updateProfile" role="tabpanel" data-path="updateProfile">
            <div class="center-container">
                <div class="form-container mt-5">
                    <p class="title">Update Profile</p>
                    <form class="form" action="{{ route('updateUserProfile') }}" method="POST">
                        @csrf
                        <div class="input-group">
                            <label>First Name</label>
                            <input type="text" name="firstname" value="{{ $user['firstname'] }}" required>
                        </div>
                        <div class="input-group">
                            <label>Last Name </label>
                            <input type="text" name="lastname" value="{{ $user['lastname'] }}" required>
                        </div>
                        <div class="input-group">
                            <label>Email</label>
                            <input type="text" name="email" value="{{ $user['email'] }}" required>
                        </div>
                        <div class="input-group">
                            <label>Contact Number</label>
                            <input type="text" name="contact_number" value="{{ $user['contact_number'] }}" required>
                        </div>
                        <button class="sign mt-3">Update</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="changeCredentials" role="tabpanel" data-path="changeCredentials">
            <div class="center-container">
                <div class="form-container mt-5">
                    <p class="title">Update Credentials</p>
                    <form class="form" id="userCredentialForm" action="{{ route('updateUserCredentials') }}"
                        method="POST">
                        @csrf
                        <div class="input-group">
                            <label>Username</label>
                            <input type="text" name="username" id="username" value="{{ $user['username'] }}" required
                                disabled>
                        </div>
                        <div class="input-group">
                            <label>Current Password</label>
                            <input type="text" name="password" id="Cpassword" value="{{ $user['password'] }}"required
                                disabled>
                        </div>
                        <div class="input-group">
                            <label>New Password</label>
                            <input type="text" name="password" id="Npassword" required>
                        </div>
                        <div class="input-group">
                            <label>Rewrite New Password</label>
                            <input type="password" name="password" id="Rpassword" required>
                        </div>
                        <button class="sign mt-3" type="submit">Update</button>
                    </form>
                </div>
            </div>

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
        document.getElementById("userCredentialForm").addEventListener("submit", formCheck);

        if (!formCheck()) {
            event.preventDefault(); // Prevent form submission
        }

        function formCheck() {
            var Cpassword = document.getElementById("Cpassword").value;
            var Npassword = document.getElementById("Npassword").value;
            var Rpassword = document.getElementById("Rpassword").value;
            if (Cpassword != Npassword) {
                if (Npassword != Rpassword) {
                    alert("New Password and Rewrite  Password does not match");
                    return false;
                } else {
                    return true;
                }
            } else {
                alert("Current Password and New Password cannot be same");
                return false;
            }

        }
    </script>
@endsection
