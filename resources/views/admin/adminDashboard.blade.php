<link rel="stylesheet" type="text/css" href="{{ asset('tableStyles.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">

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
@extends('necessary.admin_template')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
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
                            <div class="text ">
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
                            <div class="text ">
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
                            <div class="text ">
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
                            <div class="text ">
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
                                <p> Driver Online</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="infoTablesAndCharts">
        <div class="row m-3">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="chart">
                    <canvas id="myChart" style="width:100%; cursor:pointer;"
                        onclick="redirectComplainFeedback()"></canvas>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <table class="table table-hover" id="driverOnline" style="width:100%; cursor:pointer;"
                    onclick="redirectDriverPage()">
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
                        @if (empty($driverDetails))
                            <tr>
                                <td colspan="5">No one is available at the moment</td>
                            </tr>
                        @else
                            @foreach ($driverDetails as $driverData)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $driverData['driverName'] }}</td>
                                    <td>{{ $driverData['vehicleType'] }}</td>
                                    <td>{{ $driverData['contactNumber'] }}</td>
                                    <td>{{ $driverData['vehicleNumber'] }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <script>
            var xValues = @json($weekDays);
            var yValues = @json($complaintCounts);
            var dates = @json($weekDates);
            // var barColors = ["red", "green", "blue", "orange", "brown", "purple", "pink"];
            var barColor = "#F3DEBA";


            var maxValue = Math.max(...yValues);

            console.log("Maximum value:", maxValue);

            new Chart("myChart", {
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
                                stepSize: 1,
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
                        text: "Total Request in a week",
                        fontColor: "#F3DEBA",
                        fontFamily: "Josefin Sans, sans-serif",
                        fontSize: 15,
                    },
                    tooltips: {
                        callbacks: {
                            title: function(tooltipItem, data) {
                                return dates[tooltipItem[0].index]; // Display the date
                            },
                            label: function(tooltipItem, data) {
                                return "Count: " + tooltipItem.yLabel; // Display the count
                            }
                        }
                    }
                }
            });
        </script>
        <script>
            function redirectComplainFeedback() {
                window.location.href = "{{ route('adminComplainFeedback') }}";
            }

            function redirectDriverPage() {
                window.location.href = "{{ route('adminViewDriver') }}";
            }
        </script>

        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#driverOnline').DataTable({
                    "order": [
                        [0, "asc"]
                    ],
                    "lengthMenu": [3],
                    "pageLength": 3
                });
            });
        </script>
    </section>
@endsection
