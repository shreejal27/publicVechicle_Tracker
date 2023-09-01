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
@extends('necessary.user_template')
@section('content')
    <section>
        {{--  $user_id = session()->get('user_id');
         echo $user_id; --}}
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
                                    <p>User</p>
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


            </div>
        </section>
    </section>
@endsection
