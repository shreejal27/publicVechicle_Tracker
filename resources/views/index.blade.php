@extends('necessary.common_template')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>

<style>
    li {
        margin-bottom: 0.8rem;
    }

    .clearfix::after {
        content: "";
        display: table;
        clear: both;
    }

    .blogImages {
        width: 250px;
        margin-bottom: 1rem;
    }
</style>
@section('content')
    <section>
        <p id="greetings" class="font-weight-bold"></p>
    </section>
    <section class="sliderImages ">
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
    <section class="information mt-4 clearfix">
        <div class="img" style="width: 50%; float: left">
            img
        </div>
        <div class="info " style="width: 50%; float: left">
            <p class="h3">Objective</p>
            <p>Public Vehicle Tracker is a web application that will help the user to track the public vehicle in the
                Kathmandu Valley. <br>
                The user can track the public vehicle by entering the vehicle name. The user can
                also track the public vehicle by entering the source and destination.
                <br>The user can also find the nearest
                bus stop from the current location. The user can also calculate the fare of the public vehicle by
                entering the source and destination.
            </p>
        </div>
    </section>
    <section class="objectives clearfix">
        <p> Our Services
        <ul>
            <li>Track Public Vehicle</li>
            <li>Nearest Bus Stop</li>
            <li>Fare Calculator</li>
        </ul>
        </p>
    </section>
    <section class="notice clearfix">
        <br>
        <div class="heading text-center" style="width: 50%; float: left">
            <br><br>
            <p class="h3">Notices and <br>
                Publications</p>
        </div>
        <div class="noticePoints" style="width: 50%; float: left">
            <ul style="list-style: none">
                <li>New route added: Route A</li>
                <li>Temporary service disruption on Route B</li>
                <li>Schedule change for Route C</li>
                <li>New bus stop added: Stop X</li>
                <li>Temporary detour on Route Y for road construction. Alternative stops provided.</li>
            </ul>
        </div>
    </section>

    <section class="blogs clearfix mt-4 text-center mb-3">
        <p class="h3 mb-4">Media & Blogs</p>
        <div class="blog" style="border: 1px solid black; width: 33%; float: left;">
            <img class="blogImages" alt="Blog Image1" src="path/to/blog-image1.jpg">
            <p class="h4">The Importance of Public Vehicle Tracking</p>
            <p>Public vehicle tracking plays a crucial role in modern transportation systems. It provides numerous benefits
                such as improved passenger safety, reduced traffic congestion, and enhanced operational efficiency. This
                article explores the significance of public vehicle tracking and highlights how it can revolutionize the way
                we commute in cities.</p>
        </div>
        <div class="blog" style="border: 1px solid black; width: 33%; float: left;">
            <img class="blogImages" alt="Blog Image2" src="path/to/blog-image2.jpg">
            <p class="h4">The Future of Public Transportation: Smart Tracking Solutions</p>
            <p>As cities grow and transportation demands increase, the need for smarter and more efficient public
                transportation systems becomes evident. This article delves into the future of public transportation and
                explores how smart tracking solutions, coupled with advanced technologies like GPS and real-time data
                analytics, can revolutionize the way we experience and interact with public transit.</p>
        </div>
        <div class="blog" style="border: 1px solid black; width: 33%; float: left;">
            <img class="blogImages" alt="Blog Image3" src="path/to/blog-image3.jpg">
            <p class="h4">Enhancing Public Transportation with Real-time Tracking and Fare Calculation</p>
            <p>In this article, we discuss the benefits of real-time tracking and fare calculation systems in public
                transportation. We explore how these technologies empower passengers to plan their journeys more
                efficiently, make informed decisions, and ultimately improve their overall transit experience. Discover how
                real-time tracking and fare calculation can transform public transportation into a seamless and convenient
                mode of travel.</p>
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
