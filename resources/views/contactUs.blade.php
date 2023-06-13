@extends('necessary.common_template')

@section('content')
    <section class="title">
        <h2>How Can We Help You?</h2>
    </section>
    <section class="main">
        <div class="info" style="width: 47.5%; border: 1px solid black; padding:1rem; float: left">
            <p>
                Hotline Number:
                <br>
                01-5142523/01-5124587
                <br>
                <br>
                Address:
                <br>
                Ward No. 10, Kathmandu Metropolitan City, Kathmandu
                <br>
                Nepal-44600
                <br>
                LandMark: Near Bhatbhateni Supermarket
                <br>
                <br>
                Troll Free Number:
                <br>
                16600123456
                <br><br>
                Email:
                <br>
                info.publicvechicletracker@gmail.com
            </p>
        </div>
        <div class="form" style="width: 47.5%; border: 1px solid red; padding:1rem; float:left;">
            <form action="">
                @csrf
                <input type="text" placeholder="Full Name" style="width: 47%">
                <input type="email" placeholder="Email" style="width: 47%">
                <br>
                <input type="number" placeholder="Number" style="width: 47%">
                <select name="" id="" style="width: 47%">
                    <option value="">Subject Type</option>
                    <option value="">Complain</option>
                    <option value="">Feedback</option>
                    <option value="">Query</option>
                    <option value="">Request</option>
                </select>
                <br>
                <input type="text" placeholder="Subject" style="width: 100%">
                <br>
                <textarea rows="10" cols="90"></textarea>
                <br>
                <input type="submit" value="Send">
            </form>
        </div>
    </section>
@endsection
