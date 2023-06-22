@extends('necessary.common_template')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
@section('content')
    <section>
        <p id="greetings" class="font-weight-bold"></p>
    </section>
    <section class="sliderImages">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ asset('images/sliderImages/sliderImage1.jpg') }}" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('images/sliderImages/sliderImage2.jpg') }}" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('images/sliderImages/sliderImage3.jpg') }}" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>
    <section class="information ">
        <div style="border: 1px solid black;">
            <div class="img" style="width: 50%; float: left">
                img
            </div>
            <div class="info " style="width: 50%; float: left">
                <h2>Objective</h2>
                <p>Public Vehicle Tracker is a web application that will help the user to track the public vehicle in the
                    Kathmandu Valley. The user can track the public vehicle by entering the vehicle number. The user can
                    also track the public vehicle by entering the source and destination. The user can also find the nearest
                    bus stop from the current location. The user can also calculate the fare of the public vehicle by
                    entering the source and destination.</p>
            </div>
        </div>
    </section>
    <section class="objectives">
        <p> This one section is for objectives
        <ul>
            <li>Track Public Vehicle</li>
            <li>Nearest Bus Stop</li>
            <li>Fare Calculator</li>
        </ul>
        </p>
    </section>
    <section class="notice">
        <div style="border: 1px solid black;">
            <div class="heading" style="width: 50%; float: left">
                <h1>Notices and Publications</h1>
            </div>
            <div class="noticePoints" style="width: 50%; float: left">
                <ul>
                    <li>Notice 1</li>
                    <li>Notice 2</li>
                    <li>Notice 3</li>
                    <li>Notice 4</li>
                    <li>Notice 5</li>
                </ul>
            </div>
        </div>
    </section>
    <section class="blogs">
        <h1>Blogs</h1>
        <div>
            <div class="blog" style="border: 1 px solid black; width:33%; float:left;">
                <h2>Blog 1</h2>
                <p>Blog 1 content</p>
                <p>Blog 1 content</p>
                <p>Blog 1 content</p>
                <p>Blog 1 content</p>
                <p>Blog 1 content</p>
            </div>
            <div class="blog" style="border: 1 px solid black; width:33%; float:left;">
                <h2>Blog 2</h2>
                <p>Blog 2 content</p>
            </div>
            <div class="blog" style="border: 1 px solid black; width:33%; float:left;">
                <h2>Blog 3</h2>
                <p>Blog 3 content</p>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        const currentHour = new Date().getHours();
        const greeting = document.getElementById("greetings");

        if (currentHour >= 5 && currentHour < 12) {
            greeting.textContent = "Good Morning!";
        } else if (currentHour >= 12 && currentHour < 18) {
            greeting.textContent = "Good Afternoon!";
        } else {
            greeting.textContent = "Good Evening!";
        }
    </script>
@endsection
