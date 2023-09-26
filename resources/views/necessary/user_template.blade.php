<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Public Vehicle Tracker</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/74ddeb49ef.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
</head>

<body>
    <style>
        .image-container {
            text-align: center;
        }

        #topBarImage {
            width: 3rem;
            height: 3rem;
            border-radius: 3rem;
            margin: 0 auto;
            margin-top: -1rem;
            object-fit: cover;
            border: 2px solid #F3DEBA;
        }

        .sidebar {
            /* Your sidebar styles here */
            width: 250px !important;
            /* Adjust the width as needed */
            transition: width 0.3s ease;
        }

        .sidebar.collapsed {
            width: 50px !important;
            /* Adjust the collapsed width as needed */
        }

        .toggle-sidebar {
            cursor: pointer;
        }

        .toggle-sidebar i {
            /* Styles for the arrow icon */

            /* Adjust the size as needed */
            /* Add styles for arrow icon appearance */
        }
    </style>
    <div class="container col-md-12 col-sm-12 col-xs-12" style="padding:0">
        <aside class="sidebar" id="sidebar">
            <div class="toggle-sidebar">
                <section style="display: block;">
                    <div class="float-right" style="width: 100%">
                        <i class="fa-solid fa-arrow-left float-right mb-4" style="cursor: pointer"
                            onclick="toggleSidebar()"></i>
                    </div>
                </section>
                <section class="text-center">
                    <img src="{{ asset('images/logo/trackerLogo.png') }}" alt="logo" class="logo" width="80px"
                        style="margin-top: -20px;">
                    <h3>
                        <p class="font-weight-bold">Public Vehicle Tracker</p>
                    </h3>
                    {{-- <h5>
                        <p id="greetings"> </p>
                        <p>{{ ucfirst(session('user_name')) }}</p>
                    </h5> --}}
                </section>
                <br>
                <a href="/userDashboard" class="sidebarLink">
                    <i class="fa-solid fa-chalkboard-user"></i>
                    Dashboard</a><br><br>
                {{-- <a href="/userProfile" class="sidebarLink">
                    <i class="fa-solid fa-address-card"></i>
                    Profile</a><br><br> --}}
                <a href="/userActivePublicVehicle" class="sidebarLink">
                    <i class="fa-solid fa-bus"></i>
                    Track Public Vehicle </a><br><br>
                <a href="/nearestBusStop" class="sidebarLink">
                    <i class="fa-solid fa-location-dot"></i>
                    Nearest Stop</a><br><br>
                <a href="/fareCalculator" class="sidebarLink">
                    <i class="fa-solid fa-calculator"></i>
                    Fare Calculator</a><br><br>
                <a href="/feedbackComplain" class="sidebarLink">
                    <i class="fa-solid fa-message"></i>
                    Submit Your Ticket</a><br><br>
                {{-- <a href="/userLogout" class="sidebarLink">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    Logout</a><br><br> --}}
                <br>
            </div>
        </aside>

        <main>
            <div class="row topBar">

                {{-- <p class="mt-2 pl-3" style="color: #F3DEBA;">Good Evening! Asdf</p> --}}
                <div>

                    <h5 class="mt-2 ml-3">
                        <span id="greetings"></span>
                        <span> {{ ucfirst(session('user_name')) }}</span>

                    </h5>
                </div>

                <div class="image-container mt-3 mr-3">
                    <div class="profile-image" id="profileImageContainer">
                        {{-- static image --}}
                        {{-- img src="{{ asset('/images/users/64fc20ab66beb_shree.jpg') }}" alt="ProfileImage" 
                            id="topBarImage" --}}
                        @php
                            $userProfile = session('userProfile') ? session('userProfile') : 'anonymous.jpg';
                        @endphp

                        <img src="{{ asset('/images/users/' . $userProfile) }}" alt="ProfileImage" id="topBarImage">
                        <div class="dropdown-content" id="dropdownContent">
                            <a href="/userProfile"> <i class="fa-solid fa-address-card"></i> Profile</a>
                            <a href="/userLogout"> <i class="fa-solid fa-right-from-bracket"></i> Logout</a>
                        </div>
                    </div>
                </div>
            </div>
            @yield('content')
            @if (session('error'))
                <script>
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: '{{ session('error') }}',
                        showConfirmButton: false,
                        timer: 2500
                    })
                </script>
            @endif
            @if (session('message'))
                <script>
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: '{{ session('message') }}',
                        showConfirmButton: false,
                        timer: 2500
                    })
                </script>
            @endif
        </main>
    </div>

    @include('necessary.footer')
    <script src="greetings.js" type="text/javascript"></script>
    <script src="sidebarActive.js" type="text/javascript"></script>
    <script>
        // Close the dropdown menu when clicking outside of it
        window.addEventListener("click", function(event) {
            if (!event.target.matches('.profile-image')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.style.display === "block") {
                        openDropdown.style.display = "none";
                    }
                }
            }
        });
    </script>
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById("sidebar");
            sidebar.classList.toggle("collapsed");
        }
    </script>
</body>

</html>
