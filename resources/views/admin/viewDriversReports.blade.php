<link rel="stylesheet" type="text/css" href="{{ asset('tableStyles.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">

<style>
    /* table.dataTable {
        border-collapse: collapse !important;
    } */
    .right {
        display: flex;
        justify-content: flex-end;
        margin-bottom: 1rem;
    }

    .right input {
        width: 15rem;
        height: 2rem;
        border: 1px solid #ccc;
        padding: 0 0.6rem;
        box-sizing: border-box;
        background-color: #675D50;
        color: #F3DEBA;
    }

    .right input::placeholder {
        color: #F3DEBA;
    }

    .box {
        max-width: 1200px;
        /* Adjust the max width as needed */
        margin: 0 auto;
    }

    .grid-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(25%, 1fr));
        /* Create columns with equal width */
        gap: 20px;
        /* Adjust the gap between elements as needed */
    }


    .driverProfile {
        height: 250px;
        background-color: #675D50;
        color: #F3DEBA;
        text-align: center;
        margin-bottom: 20px;
        /* Adjust margin as needed */
        box-sizing: border-box;
        border: 1px solid #ccc;
        /* Add border or styling as needed */
        padding: 10px;
    }

    .image-container {
        text-align: center;
    }

    #profileImage {
        width: 5rem;
        height: 5rem;
        border-radius: 8rem;
        margin: 0 auto;
        margin-top: 1rem;
        margin-bottom: 1rem;
        object-fit: cover;
        border: 2px solid #F3DEBA;
    }
</style>
@extends('necessary.admin_template')
@section('content')
    <section class="m-3 mt-4">
        {{-- <table class="table table-hover col-md-12 col-sm-12 col-lg-12 col-xl-12" id="driverTable">
            <thead>
                <th colspan="8"> All Drivers</th>
                <tr>
                    <th>SN</th>
                    <th>Name</th>
                    <th>Address </th>
                    <th>License Number</th>
                    <th>Vechicle</th>
                    <th>Number</th>
                    <th>Status</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($drivers as $driver)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $driver['firstname'] }} {{ $driver['lastname'] }}</td>
                        <td>{{ $driver['address'] }}</td>
                        <td>{{ $driver['license_number'] }}</td>
                        <td>{{ $driver['vehicle_type'] }}</td>
                        <td>{{ $driver['contact_number'] }}</td>
                        <td data-status="{{ $workingDriverId->contains($driver->id) ? '0' : '1' }}"
                            style="vertical-align: middle;">
                            @if ($workingDriverId->contains($driver->id))
                                <i class="fa-solid fa-toggle-on fa-lg"></i>
                            @else
                                <i class="fa-solid fa-toggle-off fa-lg"></i>
                            @endif
                        </td>

                    </tr>
                @endforeach

            </tbody>
        </table> --}}
        <div class="right">
            <input type="text" id="profileSearch" placeholder="Search">
        </div>
        <div class="box ">
            <div class="grid-container">
                @foreach ($drivers as $driver)
                    <div class="driverProfile ">
                        <div class="image-container">
                            <img src="{{ asset('images/drivers/' . ($driver['profileImage'] ? $driver['profileImage'] : 'anonymous.jpg')) }}"
                                alt="Profile Image" id="profileImage">
                        </div>
                        <h4>{{ $driver['firstname'] }} {{ $driver['lastname'] }}</h4>
                        <h5>{{ $driver['vehicle_type'] }}</h5>
                        <h6><i class="fa-solid fa-location-dot"></i> {{ $driver['address'] }}</h6>
                    </div>
                @endforeach
            </div>
        </div>

    </section>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#driverTable').DataTable({
                "order": [
                    [0, "asc"]
                ],
                "columnDefs": [{
                    "orderable": true,
                    "targets": [6],
                    "type": "dom-status"
                }]
            });
        });
    </script>

    <script>
        const profileSearchInput = document.getElementById('profileSearch');
        const gridContainer = document.querySelector('.grid-container');

        // Add an event listener to the search input
        profileSearchInput.addEventListener('input', function() {
            const searchTerm = profileSearchInput.value.toLowerCase();

            // Loop through each driver profile and check if it matches the search term
            gridContainer.querySelectorAll('.driverProfile').forEach(function(profile) {
                const profileName = profile.querySelector('h4').textContent.toLowerCase();
                const profileVehicle = profile.querySelector('h5').textContent.toLowerCase();
                const profileAddress = profile.querySelector('h6').textContent.toLowerCase();

                // Show or hide the profile based on the search term
                if (
                    profileName.includes(searchTerm) ||
                    profileVehicle.includes(searchTerm) ||
                    profileAddress.includes(searchTerm)
                ) {
                    profile.style.display = 'block';
                } else {
                    profile.style.display = 'none';
                }
            });
        });
    </script>
@endsection
