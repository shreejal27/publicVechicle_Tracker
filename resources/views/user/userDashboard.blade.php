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
{{-- for bar graph --}}
{{-- for bar graph --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
@section('content')
    <section>
        {{--  $user_id = session()->get('user_id');
         echo $user_id; --}}
        <section class="infoPills">
            <div class="row mt-3">
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
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="small-box">
                        <div class="inner">
                            <div class="icon-and-text">
                                <div class="icon">
                                    <i class="fa-solid fa-house fa-2x"></i>
                                </div>
                                <div class="text ">
                                    <h4>Address:</h4>
                                    <p>{{ $userAddress }}</p>
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
                                    <i class="fa-solid fa-briefcase fa-2x"></i>
                                </div>
                                <div class="text ">
                                    <h4>Occupation:</h4>
                                    <p>{{ $userOccupation }}</p>
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
                                    <i class="fa-solid fa-envelope fa-2x"></i>
                                </div>
                                <div class="text ">
                                    <h4>Email:</h4>
                                    <p>{{ $userEmail }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
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
                                    <h4>{{ $driverOnlineCount }}</h4>
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
                                    <h4>{{ $stopCount }}</h4>
                                    <p> Stops</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <section class="infoTablesAndCharts">
            <div class="row mt-3">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="chart">
                        <canvas id="vehicleOnline" style="width:100%; cursor:pointer;"></canvas>
                    </div>
                </div>
            </div>
        </section>
        {{-- for bar graph --}}
        <script>
            var xValues = @json($vehicleTypes);
            var yValues = @json($vehicleCounts);
            var barColor = "#F3DEBA";

            console.log("X Values:", xValues);
            console.log("Y Values:", yValues);
            var maxValue = Math.max(...yValues);
            
            new Chart("vehicleOnline", {
                type: "bar",
                data: {
                    labels: xValues,
                    datasets: [{
                        backgroundColor: barColor,
                        data: yValues
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            display: true,
                            ticks: {
                                beginAtZero: true,
                                stepSize: 5,
                                max: maxValue + 1,
                                fontFamily: "Josefin Sans, sans-serif",
                                fontColor: "#F3DEBA",
                                fontSize: 13
                            }
                        }],
                        xAxes: [{
                            ticks: {
                                fontFamily: "Josefin Sans, sans-serif",
                                fontColor: "#F3DEBA",
                                fontSize: 13
                            }
                        }]
                    },
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: "Top address of Users",
                        fontColor: "#F3DEBA",
                        fontFamily: "Josefin Sans, sans-serif",
                        fontSize: 15,
                    },
                    tooltips: {
                        callbacks: {
                            label: function(tooltipItem, data) {
                                return "Count: " + tooltipItem.yLabel; // Display the count
                            }
                        }
                    }
                }
            });
        </script>
    </section>
@endsection
