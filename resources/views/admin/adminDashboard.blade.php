<script src="https://kit.fontawesome.com/74ddeb49ef.js" crossorigin="anonymous"></script>
<style>
    .small-box {
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    }

    .icon-and-text {
        display: flex;
        align-items: center;
    }

    .icon {
        margin: 0 1rem;
        font-size: 1.3rem;
        /* Adjust as needed */
    }
</style>
@extends('necessary.admin_template')
@section('content')
    <section>
        <div class="row m-3">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="small-box ">
                    <div class="inner">
                        <div class="icon-and-text">
                            <div class="icon">
                                <i class="fa-solid fa-user-tie fa-2x"></i>
                            </div>
                            <div class="text mt-2">
                                <h3>Position:</h3>
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
                                <h3>{{ $userCount }}</h3>
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
                                <h3>{{ $driverCount }}</h3>
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
                                <i class="fa-solid fa-map-location-dot fa-2x"></i>
                            </div>
                            <div class="text mt-2">
                                <h3>{{ $stopCount }}</h3>
                                <p> Stops</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>
@endsection
