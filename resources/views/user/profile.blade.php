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
        </ul>
    </div>

    <div class="tab-content">
        <div class="tab-pane fade show active" id="profile" role="tabpanel" data-path="profile">
            <h1>View Profile</h1>
            <p>This is the content of the Home tab.</p>
        </div>
        <div class="tab-pane fade" id="updateProfile" role="tabpanel" data-path="updateProfile">
            <h1>Update Profile</h1>
            <p>This is the content of Update Profile</p>
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
