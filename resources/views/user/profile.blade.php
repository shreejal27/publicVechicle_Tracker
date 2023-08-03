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
        <ul class="nav nav-pills">
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

    <div class="tab-content">
        <div class="tab-pane fade show active" id="profile" role="tabpanel" data-path="profile">
            <h1>View Profile</h1>
            <form action="">
                <label>FirstName</label>
                <input type="text">
                <label> LastName</label>
                <input type="text">
                <label>Email</label>
                <input type="email">
                <label>Contact Number</label>
                <input type="number">
            </form>
        </div>
        <div class="tab-pane fade" id="updateProfile" role="tabpanel" data-path="updateProfile">
            <h1>Update Profile</h1>
            <form action="">
                <label>FirstName</label>
                <input type="text">
                <label> LastName</label>
                <input type="text">
                <label>Email</label>
                <input type="email">
                <label>Contact Number</label>
                <input type="number">
        </div>
        <div class="tab-pane fade" id="changeCredentials" role="tabpanel" data-path="changeCredentials">
            <h1>Change Credentials</h1>
            <form action="">
                <label>UserName</label>
                <input type="text">
                <label> Password</label>
                <input type="text">
                <label> New Password</label>
                <input type="text">

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
