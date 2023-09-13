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

    .sliderImage {
        height: 800px;
        width: 100%;
        /* border: 4px solid #675D50;
        padding: 10px; */
    }

    .img {
        height: 20%;
        width: 45%;
        /* border: 4px solid #675D50; */
        float: left;
    }

    img {
        height: 100%;
        width: 100%;
    }

    .info {
        height: 20%;
        width: 55%;
        /* border: 4px solid #675D50; */
        padding: 40px;
        background-color: #675D50;
        color: white;
        float: left;
    }

    .objectives {
        text-align: center;
    }

    .notice {
        height: 400px;
        width: 100%;
        background-color: #A9907E;
    }

    .blogs {
        height: 700px;
        width: 100%;
        background-color: #F3DEBA;
    }

    .blog {
        height: 100%;
        padding: 1.5rem;
        width: 33%;
        float: left;
        text-align: left;
        border-left: 3px solid #675D50;
        margin-bottom: 5rem;
    }

    .blogImages {
        margin-bottom: 1rem;
        width: 100%;
        height: 300px;
        filter: brightness(75%);
        object-fit: cover;
    }

    .blogImages:hover {
        filter: brightness(100%);
        transition: 3s ease;
    }
</style>
@section('content')
    <section class="sliderImages ">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100 sliderImage" src="{{ asset('images/sliderImages/sliderImage1.jpg') }}"
                        alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 sliderImage" src="{{ asset('images/sliderImages/sliderImage2.jpg') }}"
                        alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 sliderImage" src="{{ asset('images/sliderImages/sliderImage3.jpg') }}"
                        alt="Third slide">
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
    <section class="information mt-5 mb-5 clearfix">
        <div class="img">
            <img src="images/blogs/blog2.jpg" alt="objectiveImage">
        </div>
        <div class="info">
            <p class="h3 mb-4">Objective</p>
            <p>Public Vehicle Tracker is a web application that will help the user to track the public vehicle in the
                Kathmandu Valley. <br> <br>
                The user can track the public vehicle by entering the vehicle name. The user can
                also track the public vehicle by entering the source and destination.
                <br> <br>The user can also find the nearest
                bus stop from the current location. The user can also calculate the fare of the public vehicle by
                entering the source and destination.
                <br> <br>The user can also find the nearest
                bus stop from the current location. The user can also calculate the fare of the public vehicle by
                entering the source and destination.

            </p>
        </div>
    </section>
    {{-- <section class="objectives clearfix mt-5">
        <h2>Our Services</h2>
        <br>
        <p>Track Public Vehicle
            <br> <br>
            Nearest Bus Stop
            <br><br>
            Fare Calculator
        </p>
    </section> --}}
    <section class="notice clearfix">
        <br><br><br><br>
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

    <section class="blogs clearfix mt-5 text-center ">
        <p class="h3 mb-5">Media & Blogs</p>
        <div class="blog" style="border-left: none;">
            <img class="blogImages" alt="Blog Image1" src="{{ asset('images/blogs/blog1.jpg') }}">
            <p class="h4">The Importance of Public Vehicle Tracking</p><br>
            <p>Public vehicle tracking plays a crucial role in modern transportation systems. It provides benefits
                such as improved passenger safety, reduced traffic congestion, and enhanced operational efficiency. <br><br>
                This
                article explores the significance of public vehicle tracking and highlights how it can revolutionize the way
                we commute in cities.</p>
        </div>
        <div class="blog">
            <img class="blogImages" alt="Blog Image2" src="{{ asset('images/blogs/blog2.jpg') }}">
            <p class="h4">The Future of Public Transportation and Tracking</p><br>
            <p>As cities grow and transportation demands increase, the need for smarter and more efficient public
                transportation systems becomes evident.
                <br> <br>
                This article delves into the future of public transportation and
                explores how smart tracking solutions, coupled with advanced technologies like GPS and real-time data
                analytics.
            </p>
        </div>
        <div class="blog">
            <img class="blogImages" alt="Blog Image3" src="{{ asset('images/blogs/blog3.jpg') }}">
            <p class="h4"> Public Transportation with Real-time Tracking </p><br>
            <p>In this article, we discuss the benefits of real-time tracking in public
                transportation.
                <br> <br>Discover how real-time tracking can transform public transportation into
                seamless and convenient mode of travel. Discover how real-time tracking can transform public transportation
                into
                seamless and convenient mode of travel.
            </p>
        </div>
    </section>
@endsection
