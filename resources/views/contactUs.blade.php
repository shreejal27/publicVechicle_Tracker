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
        <div class="form ml-3" style="width: 47.5%; border: 1px solid red; padding:1rem; float:left;">
            <form action="">
                @csrf
                <input type="text" placeholder="Full Name" style="width: 48%">
                <input type="email" placeholder="Email" style="width: 48%">
                <br>
                <br>
                <input type="number" placeholder="Number" style="width: 48%;">
                <select name="" id="" style="width: 48%; height:27px">
                    <option value="">Subject Type</option>
                    <option value="">Complain</option>
                    <option value="">Feedback</option>
                    <option value="">Query</option>
                    <option value="">Request</option>
                </select>
                <br>
                <br>
                <input type="text" placeholder="Subject" style="width: 100%;">
                <br>
                <br>
                <textarea style="width: 100%; height: 15rem;"></textarea>
                <br>
                <br>
                <input type="submit" value="Send">
            </form>
        </div>
    </section>
@endsection
