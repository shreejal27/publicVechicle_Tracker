<link rel="stylesheet" type="text/css" href="{{ asset('formStyles.css') }}">
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
@extends('necessary.admin_template')
@section('content')
    <section>
        {{-- check if this session holds any importance or not --}}
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <div class="center-container mt-5">
            <div class="form-container col-md-3 mb-3">
                <p class="title">Edit Driver Details</p>
                <form class="form" id="editFare" action="{{ route('adminUpdateDriver', $driver->id) }}" method="POST"
                    enctype="multipart/form-data">

                    @csrf
                    <div class="image-container">
                        <img src="{{ asset('images/drivers/' . ($driver['profileImage'] ? $driver['profileImage'] : 'anonymous.jpg')) }}"
                            alt="Profile Image" id="updateProfileImage" onclick="chooseFile()">
                        <input type="file" style="display: none;" id="fileInput" accept="image/*"
                            onchange="displaySelectedFile()" name="driverImage">
                    </div>
                    <div class="input-group">
                        <label>First Name</label>
                        <input type="text" name="firstname" value="{{ $driver['firstname'] }}">
                    </div>
                    <div class="input-group">
                        <label>Last Name </label>
                        <input type="text" name="lastname" value="{{ $driver['lastname'] }}">
                    </div>
                    <div class="input-group">
                        <label>Address</label>
                        <input type="text" name="address" value="{{ $driver['address'] }}">
                    </div>
                    <div class="input-group">
                        <label>License Number</label>
                        <input type="text" name="licenseNumber" value="{{ $driver['license_number'] }}">
                    </div>
                    <div class="input-group">
                        <label>Contact Number</label>
                        <input type="text" name="contactNumber" value="{{ $driver['contact_number'] }}">
                    </div>
                    <div class="input-group">
                        <label>Vehicle</label>
                        <input type="text" name="vehicleType" value="{{ $driver['vehicle_type'] }}">
                    </div>
                    <div class="input-group">
                        <label>Vehicle Number</label>
                        <input type="text" name="vehicleNumber" value="{{ $driver['vehicle_number'] }}">
                    </div>
                    <button class="sign mt-3" type="submit">Update</button>
                </form>
            </div>
        </div>
    </section>
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
