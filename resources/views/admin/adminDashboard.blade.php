<script src="https://kit.fontawesome.com/74ddeb49ef.js" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('tableStyles.css') }}">
<style>
    .small-box {
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        background-color: #675D50;
    }

    .icon-and-text {
        display: flex;
        align-items: center;
    }

    .icon {
        margin: 0 1rem 0 0.7rem;
        font-size: 1rem;
        padding: 15px;
        background-color: #A9907E;
        border-radius: 10px;
        /* Adjust as needed */
    }

    .fa-solid {
        color: #F3DEBA;
    }

    .text {
        color: #F3DEBA;
    }
</style>
@extends('necessary.admin_template')
@section('content')
    <section class="infoPills">
        <div class="row m-3">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="small-box">
                    <div class="inner">
                        <div class="icon-and-text">
                            <div class="icon">
                                <i class="fa-solid fa-user-tie fa-2x"></i>
                            </div>
                            <div class="text mt-2">
                                <h4>Position:</h4>
                                <p>Admin</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="small-box">
                    <div class="inner">
                        <div class="icon-and-text">
                            <div class="icon">
                                <i class="fa-solid fa-users fa-2x"></i>
                            </div>
                            <div class="text mt-2">
                                <h4>{{ $userCount }}</h4>
                                <p> Users</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="small-box">
                    <div class="inner">
                        <div class="icon-and-text">
                            <div class="icon">
                                <i class="fa-solid fa-users-gear fa-2x"></i>
                            </div>
                            <div class="text mt-2">
                                <h4>{{ $driverCount }}</h4>
                                <p> Drivers</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="small-box">
                    <div class="inner">
                        <div class="icon-and-text">
                            <div class="icon">
                                <i class="fa-solid fa-route fa-2x"></i>
                            </div>
                            <div class="text mt-2">
                                <h4>{{ $stopCount }}</h4>
                                <p> Stops</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row m-3">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="small-box">
                    <div class="inner">
                        <div class="icon-and-text">
                            <div class="icon">
                                <i class="fa-solid fa-toggle-on fa-2x"></i>
                            </div>
                            <div class="text mt-2">
                                <h4>{{ $driverOnlineCount }}</h4>
                                <p> Driver Online</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="infoTables">
        <div class="row m-3">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <table class="table table-hover ">
                    <thead>
                        <th colspan="5"> Driver Online</th>
                        <tr>
                            <th>SN</th>
                            <th>Name</th>
                            <th>Vehicle</th>
                            <th>Contact </th>
                            <th>Vehicle No</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($driverDetails as $driverData)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $driverData['driverName'] }}</td>
                                <td>{{ $driverData['vehicleType'] }}</td>
                                <td>{{ $driverData['contactNumber'] }}</td>
                                <td>{{ $driverData['vehicleNumber'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <table class="table table-hover ">
                    <thead>
                        <th colspan="5"> Driver Online</th>
                        <tr>
                            <th>SN</th>
                            <th>Name</th>
                            <th>Vehicle</th>
                            <th>Contact </th>
                            <th>Vehicle No</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($driverDetails as $driverData)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $driverData['driverName'] }}</td>
                                <td>{{ $driverData['vehicleType'] }}</td>
                                <td>{{ $driverData['contactNumber'] }}</td>
                                <td>{{ $driverData['vehicleNumber'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
