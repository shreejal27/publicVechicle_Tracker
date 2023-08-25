@extends('necessary.common_template')

@section('content')
    <style>
        .info {
            background-color: #A9907E;
            color: black;
        }

        .form {
            background-color: #675D50;
        }

        input,
        select {
            height: 40px;
            background-color: #A9907E;
            color: #F3DEBA;
            border-radius: 10px;
            border: 1px solid #F3DEBA;
        }

        select {
            padding-left: 15px;
        }

        ::placeholder {
            padding-left: 15px;
            color: #F3DEBA;

        }

        textarea {
            border-radius: 10px;
            color: white;
        }

        input[type=submit] {
            width: 80px;
            height: 40px;
            background-color: #F3DEBA;
            color: black;
        }

        input[type=submit]:hover {
            background-color: #ABC4AA;
        }
    </style>
    @if (session('success'))
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 5000
            })
        </script>
    @endif
    <section class="title mt-4 mb-4">
        <h2 class="text-center">How Can We Help You?</h2>
    </section>
    <section class="main">
        <div class="info" style="width: 48%; border: 1px solid black; padding:1rem; float: left">
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
        <div class="form ml-3" style="width: 48%; border: 1px solid red; padding:1rem; float:left;">
            <form action="{{ route('storeComplainFeedback') }}" method="POST">
                @csrf
                <input type="text" placeholder="Full Name" style="width: 48%" name="fullname" required>
                <input type="email" placeholder="Email" style="width: 48%" name="email" required>
                <br>
                <br>
                <input type="number" placeholder="Number" name="number" style="width: 48%;" required>
                <select name="type" id="" style="width: 48%; " required>
                    <option value="">Subject Type</option>
                    <option value="complain">Complain</option>
                    <option value="feedback">Feedback</option>
                    <option value="query">Query</option>
                    <option value="request">Request</option>
                </select>
                <br>
                <br>
                <input type="text" name="subject" placeholder="Subject" style="width: 100%;" required>
                <br>
                <br>
                <textarea name="description" placeholder="Write your message here" rows="5"
                    style="width: 100%; height: 15rem; background-color:#A9907E" required></textarea>
                <br>
                <br>
                <input type="submit" value="Send">
            </form>
        </div>
    </section>
@endsection
