@extends('necessary.common_template')
@section('content')
    <section>
        <!-- Additional content specific to the index file -->
        <h2>This is the first file of the project</h2>
        <p>Public Vechicle Tracker</p>
    </section>
    <section class="sliderImages">
        <h1>hello this is slider</h1>
    </section>
    <section class="information">
        <div style="border: 1px solid black;">
            <div class="img" style="width: 50%; float: left">
                img
            </div>
            <div class="info" style="width: 50%; float: left">
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
@endsection

@include('necessary.footer')
