<link rel="stylesheet" type="text/css" href="{{ asset('formStyles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('pillStyles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('passwordEye.css') }}">
<style>
    .image-container {
        text-align: center;
    }

    #profileImage,
    #updateProfileImage {
        width: 8rem;
        height: 8rem;
        border-radius: 8rem;
        margin: 0 auto;
        margin-top: -1rem;
        object-fit: cover;
        border: 2px solid #F3DEBA;
        /* background-size: cover;
        background-position: center; */
        /* background-position: 50% 50%; */
        /* background-repeat: no-repeat; */
    }

    #updateProfileImage:hover {
        cursor: pointer;
    }
</style>
@extends('necessary.driver_template')
@section('content')
    <div>

        <ul class="nav nav-pills mt-2 ml-2 ">
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
            <div class="center-container">
                <div class="form-container mt-5 mb-5">
                    <p class="title">Profile</p>
                    <form class="form" action="#">
                        @csrf
                        <div class="image-container">
                            <img src="{{ asset('images/drivers/' . ($driver['profileImage'] ? $driver['profileImage'] : 'anonymous.jpg')) }}" alt="Profile Image"
                                id="profileImage">
                        </div>

                        <div class="input-group">
                            <label>First Name</label>
                            <input type="text" value="{{ $driver['firstname'] }}" disabled>
                        </div>
                        <div class="input-group">
                            <label>Last Name </label>
                            <input type="text" value="{{ $driver['lastname'] }}" disabled>
                        </div>
                        <div class="input-group">
                            <label>Address</label>
                            <input type="text" value="{{ $driver['address'] }}" disabled>
                        </div>
                        <div class="input-group">
                            <label>License Number</label>
                            <input type="text" value="{{ $driver['license_number'] }}" disabled>
                        </div>
                        <div class="input-group">
                            <label>Contact Number</label>
                            <input type="text" value="{{ $driver['contact_number'] }}" disabled>
                        </div>
                        <div class="input-group">
                            <label>Vehicle</label>
                            <input type="text" value="{{ $driver['vehicle_type'] }}" disabled>
                        </div>
                        <div class="input-group">
                            <label>Vehicle Number</label>
                            <input type="text" value="{{ $driver['vehicle_number'] }}" disabled>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="updateProfile" role="tabpanel" data-path="updateProfile">
            <div class="center-container">
                <div class="form-container mt-5 mb-5">
                    <p class="title">Update Profile</p>
                    <form class="form" action="{{ route('updateDriverProfile') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="image-container">
                            <img src="{{ asset('images/drivers/' . ($driver['profileImage'] ? $driver['profileImage'] : 'anonymous.jpg')) }}" alt="Profile Image"
                                id="updateProfileImage" onclick="chooseFile()">
                            <input type="file" style="display: none;" id="fileInput" accept="image/*"
                                onchange="displaySelectedFile()" name="driverImage">
                        </div>
                        <div class="input-group">
                            <label>First Name</label>
                            <input type="text" name="firstname" value="{{ $driver['firstname'] }}" >
                        </div>
                        <div class="input-group">
                            <label>Last Name </label>
                            <input type="text" name="lastname" value="{{ $driver['lastname'] }}" >
                        </div>
                        <div class="input-group">
                            <label>Address</label>
                            <input type="text" name="address" value="{{ $driver['address'] }}" >
                        </div>
                        <div class="input-group">
                            <label>License Number</label>
                            <input type="text" name="licenseNumber" value="{{ $driver['license_number'] }}" >
                        </div>
                        <div class="input-group">
                            <label>Contact Number</label>
                            <input type="text" name="contactNumber" value="{{ $driver['contact_number'] }}" >
                        </div>
                        <div class="input-group">
                            <label>Vehicle</label>
                            <input type="text" name="vehicleType" value="{{ $driver['vehicle_type'] }}" >
                        </div>
                        <div class="input-group">
                            <label>Vehicle Number</label>
                            <input type="text" name="vehicleNumber" value="{{ $driver['vehicle_number'] }}" >
                        </div>
                        <button class="sign mt-3" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="changeCredentials" role="tabpanel" data-path="changeCredentials">
            <div class="center-container">
                <div class="form-container mt-5">
                    <p class="title">Update Credentials</p>
                    <form class="form" id="userCredentialForm" action="{{ route('updateDriverCredentials') }}"
                        method="POST">
                        @csrf
                        <div class="input-group">
                            <label>Username</label>
                            <input type="text" name="username" id="username" value="{{ $driver['username'] }}"
                                required disabled>
                        </div>
                        <div class="input-group">
                            <label>Current Password</label>
                            <input type="password" name="cpassword" id="Cpassword"
                                value="{{ $driver['password'] }}"required disabled>
                            <i class="fa-solid fa-eye-slash fa-lg" id="Ctoggle-password"></i>
                        </div>
                        <div class="input-group">
                            <label>New Password</label>
                            <input type="password" name="npassword" id="Npassword" required>
                            <i class="fa-solid fa-eye-slash fa-lg" id="Ntoggle-password"></i>
                        </div>
                        <div class="input-group">
                            <label>Rewrite New Password</label>
                            <input type="password" name="rpassword" id="Rpassword" required>
                            <i class="fa-solid fa-eye-slash fa-lg" id="Rtoggle-password"></i>
                        </div>
                        <button class="sign mt-3" type="submit">Update</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <script src="passwordEye.js" type="text/javascript"></script>

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
        document.getElementById("userCredentialForm").addEventListener("submit", function(event) {

            if (!formCheck()) {
                event.preventDefault(); // Prevent form submission
            }
        });

        function formCheck() {
            var Cpassword = document.getElementById("Cpassword").value;
            var Npassword = document.getElementById("Npassword").value;
            var Rpassword = document.getElementById("Rpassword").value;
            if (Cpassword != Npassword) {
                if (Npassword != Rpassword) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'New Password and Rewrite New Password does not match',
                        showConfirmButton: false,
                        timer: 2500
                    })
                    return false;
                } else {
                    return true;
                }
            } else {
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Current Password and New Password cannot be the same',
                    showConfirmButton: false,
                    timer: 2500
                })
                return false;
            }
        }
    </script>
    <script>
        function chooseFile() {
            // Trigger the file input when the user clicks on the image
            document.getElementById('fileInput').click();
        }

        function displaySelectedFile() {
            // Get the selected file
            const fileInput = document.getElementById('fileInput');
            const selectedFile = fileInput.files[0];

            if (selectedFile) {
                // You can also update the image source if needed
                const updateProfileImage = document.getElementById('updateProfileImage');
                updateProfileImage.src = URL.createObjectURL(selectedFile);
            }
        }
    </script>
@endsection
