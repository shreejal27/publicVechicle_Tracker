@extends('necessary.common_template')

@section('content')
    <style>
        .info {
            color: #675D50;
            border-left: 2px solid #675D50;
        }

        .form {
            background-color: #675D50;
        }

        label {
            color: #F3DEBA;
        }

        input,
        select {
            height: 40px;
            background-color: #A9907E;
            color: #F3DEBA;
            border-radius: 10px;
            border: 1px solid #F3DEBA;
            padding-left: 10px;
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
            color: #F3DEBA;
            padding-left: 10px;
            padding-top: 10px;
            border: 1px solid #F3DEBA;
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
    <section class="title mt-5 mb-5">
        <h2 class="text-center">How Can We Help You?</h2>
    </section>
    <section class="main m-5">
        <div class="info col-md-5" style=" padding:1rem; float: left">
            <p>
                <h5><strong>Hotline Number:</strong> </h5>
                01-5142523/01-5124587
                <br>
                <br>
                <h5><strong>Address:</strong> </h5>
                Ward No. 14, Kathmandu Metropolitan City, Kathmandu
                <br>
                Nepal-44600
                <br>
                LandMark: Near Himalayan Java, Kuleshwor
                <br>
                <br>
                <h5><strong>Troll Free Number:</strong> </h5>
                16600123456
                <br><br>
                <h5><strong>Email</strong> </h5>
                info.publicvechicletracker@gmail.com
            </p>
        </div>
        <div class="form ml-5 col-md-6 mb-5" style=" padding:1rem; float:left; border-radius: 10px;">
            <form action="{{ route('storeComplainFeedback') }}" method="POST">
                @csrf
                <label style="width: 48%"> Full Name</label>
                <label style="width: 48%"> Email </label><br>
                <input type="text"  style="width: 48%" name="fullname" required>
                <input type="email"  style="width: 48%" name="email" required>
                <br>
                <br>
                <label style="width: 48%"> Number</label>
                <label style="width: 48%"> Subject Type </label>
                <input type="number"  name="number" style="width: 48%;" required>
                <select name="type" id="" style="width: 48%; " required>
                    <option value="">-</option>
                    <option value="complain">Complain</option>
                    <option value="feedback">Feedback</option>
                    <option value="query">Query</option>
                    <option value="request">Request</option>
                </select>
                <br>
                <br>
                <label style="width: 48%"> Subject </label>
                <input type="text" name="subject"  style="width: 100%;" required>
                <br>
                <br>
                <label style="width: 48%"> Write your Message </label>
                <textarea name="description"  rows="4"
                    style="width: 100%; height: 10rem; background-color:#A9907E" required></textarea>
                <input type="submit" value="Send" class="mt-2" style="padding-right:10px;">
            </form>
        </div>
    </section>
@endsection
