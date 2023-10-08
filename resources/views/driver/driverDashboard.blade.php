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
        margin-top: 0.7rem !important;
        color: #F3DEBA;
    }

    .chart {
        background-color: #675D50;
        color: #F3DEBA;
        padding: 0.7rem;
    }

    table {
        margin: 0;
    }

    table.dataTable {
        border-collapse: collapse !important;
    }
</style>
@extends('necessary.driver_template')
@section('content')
    <section>
        <section class="infoPills">
            <div class="row m-3">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="small-box">
                        <div class="inner">
                            <div class="icon-and-text">
                                <div class="icon">
                                    <i class="fa-solid fa-user-tie fa-2x"></i>
                                </div>
                                <div class="text ">
                                    <h4>Position:</h4>
                                    <p>Driver</p>
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
                                    <i class="fa-solid fa-house fa-2x"></i>
                                </div>
                                <div class="text ">
                                    <h4>Address:</h4>
                                    <p>{{$driverAddress}}</p>
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
                                    <i class="fa-solid fa-gears fa-2x"></i>
                                </div>
                                <div class="text ">
                                    <h4>Vehicle Type:</h4>
                                    <p>{{$driverVehicle}}</p>
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
                                    <i class="fa-solid fa-phone fa-2x"></i>
                                </div>
                                <div class="text ">
                                    <h4>Number:</h4>
                                    <p>{{$driverNumber}}</p>
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
                                    <i class="fa-solid fa-calendar-days fa-2x"></i>
                                </div>
                                <div class="text ">
                                    <h4> Date: </h4>
                                    <p>{{ $dateToday }}</p>
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
                                    <i class="fa-solid fa-toggle-on fa-2x"></i>
                                </div>
                                <div class="text ">
                                    <h4>{{$driverOnlineCount}}</h4>
                                    <p> Drivers Online</p>
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
                                <div class="text ">
                                    <h4>{{ $driverVehicleStops }}</h4>
                                    <p>{{ $driverVehicleType }} Stops</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </section>
@endsection
