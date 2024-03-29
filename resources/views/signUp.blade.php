<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('passwordEye.css') }}">
    <style>
        .center-container {
            display: flex;
            justify-content: center;
        }

        .form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            max-width: auto;
            background-color: #675D50;
            padding: 20px;
            border-radius: 20px;
            position: relative;
            border: 1px solid black;
        }

        .title {
            font-size: 28px;
            color: #F3DEBA;
            font-weight: 600;
            letter-spacing: -1px;
            position: relative;
            display: flex;
            align-items: center;
            padding-left: 30px;
        }

        .title::before,
        .title::after {
            position: absolute;
            content: "";
            height: 16px;
            width: 16px;
            border-radius: 50%;
            left: 0px;
            background-color: #F3DEBA;
        }

        .title::before {
            width: 18px;
            height: 18px;
            background-color: #F3DEBA;
        }

        .title::after {
            width: 18px;
            height: 18px;
            animation: pulse 1s linear infinite;
        }

        .message,
        .signin {
            color: #F3DEBA;
            font-size: 14px;
        }

        .signin {
            text-align: center;
        }

        .signin a {
            color: whitesmoke;
        }

        .signin a:hover {
            text-decoration: none;
            color: #F3DEBA;
        }

        .flex {
            display: flex;
            width: 100%;
            gap: 6px;
        }

        .form label {
            position: relative;
        }

        .input {
            border: 2px solid #F3DEBA;
            background-color: #A9907E;
        }

        .form label .input {
            width: 100%;
            padding: 10px 10px 20px 10px;
            outline: 0;
            border: 1px solid rgba(105, 105, 105, 0.397);
            border-radius: 10px;
        }

        .form label .input+span {
            position: absolute;
            left: 10px;
            top: 15px;
            color: #F3DEBA;
            font-size: 0.9em;
            cursor: text;
            transition: 0.3s ease;
        }

        .form label .input:placeholder-shown+span {
            top: 15px;
            font-size: 0.9em;
        }

        .form label .input:focus+span,
        .form label .input:valid+span {
            top: 30px;
            font-size: 0.7em;
            font-weight: 600;
        }

        .form label .input:valid+span {
            color: white;
        }

        .submit {
            border: none;
            outline: none;
            background-color: #F3DEBA;
            padding: 10px;
            border-radius: 10px;
            color: #000;
            font-size: 16px;
            transform: .3s ease;
        }

        .submit:hover {
            background-color: #ABC4AA;
        }

        @keyframes pulse {
            from {
                transform: scale(0.9);
                opacity: 1;
            }

            to {
                transform: scale(1.8);
                opacity: 0;
            }
        }

        .nav-item a {
            color: black !important;
        }

        .nav-item .active {
            background-color: #A9907E !important;
            color: #F3DEBA !important;
        }

        select {
            width: 100%;
            padding: 15px 10px 15px 10px;
            outline: 0;
            border: 1px solid rgba(105, 105, 105, 0.397);
            border-radius: 10px;
            background-color: #A9907E;
            color: #F3DEBA;
        }
    </style>
</head>

<body>
    @extends('necessary.common_template')
    @section('content')
        <ul class="nav nav-pills mt-2 ml-2">
            <li class="nav-item" data-path="userSignUp">
                <a class="nav-link active" data-toggle="tab" href="#userSignUp" aria-selected="true">Sign Up As User</a>
            </li>
            <li class="nav-item" data-path="driverSignUp">
                <a class="nav-link" data-toggle="tab" href="#driverSignUp" aria-selected="false">Sign Up As Public
                    Driver</a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="userSignUp" role="tabpanel" data-path="userSignUp">
                <div class="center-container">
                    <form class="form mt-4 mb-5" id="userRegister" action="{{ route('storeUser') }}" method="POST">
                        @csrf
                        <p class="title">Register </p>
                        <p class="message">Signup now and get full access to our features. </p>
                        <div class="flex">
                            <label>
                                <input required id="firstname" type="text" class="input" name="firstname">
                                <span>Firstname</span>
                            </label>
                            @error('firstname')
                            <p class="text-danger">**{{ $message }}</p>
                            @enderror

                            <label>
                                <input required id="lastname" type="text" class="input" name="lastname">
                                <span>Lastname</span>
                            </label>
                            @error('lastname')
                            <p class="text-danger">**{{ $message }}</p>
                            @enderror
                        </div>

                        <label>
                            <input required id="email" type="email" class="input" name="email">
                            <span>Email</span>
                        </label>
                        @error('email')
                        <p class="text-danger">**{{ $message }}</p>
                        @enderror
                        <label>
                            <input required id="address" type="text" class="input" name="address">
                            <span>Address</span>
                        </label>
                        @error('address')
                        <p class="text-danger">**{{ $message }}</p>
                        @enderror
                        <label>
                            <input required id="number" type="number" class="input" name="contact_number">
                            <span>Contact Number </span>
                        </label>
                        @error('contact_number')
                        <p class="text-danger">**{{ $message }}</p>
                        @enderror
                        <select name="occupation" class="mb-1" required>
                            <option value="">--Select Your Occupation--</option>
                            <option value="student">Student</option>
                            <option value="teacher">Teacher</option>
                            <option value="employee">Employee</option>
                            <option value="bussinessman">BussinessMan</option>
                            <option value="housewife">Housewife</option>
                            <option value="unemployed">Unemployed</option>
                        </select>
                        @error('occupation')
                        <p class="text-danger">**{{ $message }}</p>
                        @enderror
                        <label>
                            <input required id="username" type="text" class="input" name="username">
                            <span>UserName</span>
                        </label>
                        @error('username')
                        <p class="text-danger">**{{ $message }}</p>
                        @enderror
                        <label class="password-container">
                            <input required id="password" type="password" class="input" name="password">
                            <span>Password</span>
                            <i class="fa-solid fa-eye-slash fa-lg" style="color: #f3deba;" id="toggle-password"></i>
                        </label>
                        @error('password')
                        <p class="text-danger">**{{ $message }}</p>
                        @enderror
                        <button class="submit" type="submit">Submit</button>
                        <p class="signin">Already have an acount ? <a href="{{ url('/login') }}">Login</a> </p>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade show" id="driverSignUp" role="tabpanel" data-path="driverSignUp">
                <div class="center-container">
                    <form class="form mt-4 mb-5" id="driverRegister" action="{{ route('storeDriver') }}" method="POST">
                        @csrf
                        <p class="title">Register As a Driver </p>
                        <p class="message">Signup now </p>
                        <div class="flex">
                            <label>
                                <input required id="dfirstname" type="text" class="input" name="firstname">
                                <span>Firstname</span>
                            </label>
                            @error('firstname')
                            <p class="text-danger">**{{ $message }}</p>
                            @enderror

                            <label>
                                <input required id="dlastname" type="text" class="input" name="lastname">
                                <span>Lastname</span>
                            </label>
                            @error('lastname')
                            <p class="text-danger">**{{ $message }}</p>
                            @enderror
                        </div>


                        <label>
                            <input required type="number" id="dnumber" class="input" name="contact_number">
                            <span>Contact Number </span>
                        </label>
                        @error('contact_number')
                        <p class="text-danger">**{{ $message }}</p>
                        @enderror

                        <label>
                            <input required type="text" id="daddress" class="input" name="address">
                            <span>Address </span>
                        </label>
                        @error('address')
                        <p class="text-danger">**{{ $message }}</p>
                        @enderror

                        <label>
                            <input required type="text" id="lnumber" class="input" name="license_number">
                            <span>License Number</span>
                        </label>
                        @error('license_number')
                        <p class="text-danger">**{{ $message }}</p>
                        @enderror

                        <select name="vehicle_type" class="mb-1" required>
                            <option value="">--Select Your Vehicle--</option>
                            <option value="bus">Bus</option>
                            <option value="micro">Micro</option>
                            <option value="tempo">Tempo</option>
                        </select>
                        @error('vehicle_type')
                        <p class="text-danger">**{{ $message }}</p>
                        @enderror

                        <label>
                            <input required type="text" id="vnumber" class="input" name="vehicle_number">
                            <span>Vechicle Number </span>
                        </label>
                        @error('vehicle_number')
                        <p class="text-danger">**{{ $message }}</p>
                        @enderror

                        <label>
                            <input required type="text" id="dusername" class="input" name="username">
                            <span>UserName</span>
                        </label>
                        @error('username')
                        <p class="text-danger">**{{ $message }}</p>
                        @enderror

                        <label>
                            <input required type="password" id="driverPassword" class="input" name="password">
                            <span>Password</span>
                            <i class="fa-solid fa-eye-slash fa-lg" style="color: #f3deba;" id="driverTogglePassword"></i>
                        </label>
                        @error('password')
                        <p class="text-danger">**{{ $message }}</p>
                        @enderror
                        <button class="submit">Submit</button>
                        <p class="signin">Already have an acount ? <a href="{{ url('/login') }}">Signin</a> </p>
                    </form>
                </div>
            </div>
        </div>
        <script src="passwordEye.js" type="text/javascript"></script>
    @endsection

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
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("userRegister").addEventListener("submit", function(event) {

                if (!userFormCheck()) {
                    event.preventDefault(); // Prevent form submission
                }
            });
        });

        function showErrorAlert(message) {
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: message,
                showConfirmButton: false,
                timer: 2500
            });
        }

        function userFormCheck() {
            var firstname = document.getElementById("firstname").value;
            var lastname = document.getElementById("lastname").value;
            var email = document.getElementById("email").value;
            var number = document.getElementById("number").value;
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;

            if (firstname.length > 15) {
                showErrorAlert("Please enter a valid first name (up to 15 characters).");
                return false;
            }

            if (lastname.length > 15) {
                showErrorAlert("Please enter a valid last name (up to 15 characters).");
                return false;
            }

            if ((firstname.match(/\d/)) || (lastname.match(/\d/))) {
                showErrorAlert("Your Name should not contain numbers.");
                return false;
            }

            if (!email.includes("@") || !email.includes(".com")) {
                showErrorAlert("Please enter a valid email address.");
                return false;
            }

            if (!number.startsWith("98") || number.length !== 10) {
                showErrorAlert("Please enter a valid phone number (starting with 98 and 10 characters).");
                return false;
            }

            if (username.length > 10) {
                showErrorAlert("Please enter a valid username (up to 10 characters).");
                return false;
            }

            return true;
        }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("driverRegister").addEventListener("submit", function(event) {

                if (!driverFormCheck()) {
                    event.preventDefault(); // Prevent form submission
                }
            });
        });

        function showErrorAlert(message) {
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: message,
                showConfirmButton: false,
                timer: 2500
            });
        }

        function driverFormCheck() {
            var firstname = document.getElementById("dfirstname").value;
            var lastname = document.getElementById("dlastname").value;
            var address = document.getElementById("daddress").value;
            var number = document.getElementById("dnumber").value;
            var licensenumber = document.getElementById("lnumber").value;
            var licensenumber = document.getElementById("vnumber").value;
            var username = document.getElementById("dusername").value;
            var password = document.getElementById("driverPassword").value;

            if (firstname.length > 15) {
                showErrorAlert("Please enter a valid first name (up to 15 characters).");
                return false;
            }

            if (lastname.length > 15) {
                showErrorAlert("Please enter a valid last name (up to 15 characters).");
                return false;
            }

            if ((firstname.match(/\d/)) || (lastname.match(/\d/))) {
                showErrorAlert("Your Name should not contain numbers.");
                return false;
            }

            if (!number.startsWith("98") || number.length !== 10) {
                showErrorAlert("Please enter a valid phone number (starting with 98 and 10 characters).");
                return false;
            }

            if (username.length > 10) {
                showErrorAlert("Please enter a valid username (up to 10 characters).");
                return false;
            }

            return true;
        }
    </script>
</body>

</html>
