@extends('necessary.common_template')
@section('content')
    <style>
        .center-container {
            display: flex;
            justify-content: center;
        }

        .form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            max-width: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 20px;
            position: relative;
            border: 1px solid black;
        }

        .title {
            font-size: 28px;
            color: royalblue;
            font-weight: 600;
            letter-spacing: -1px;
            position: relative;
            display: flex;
            align-items: center;
            padding-left: 30px;
        }

        .title::before,
        .title::after {
            position: absolute;
            content: "";
            height: 16px;
            width: 16px;
            border-radius: 50%;
            left: 0px;
            background-color: royalblue;
        }

        .title::before {
            width: 18px;
            height: 18px;
            background-color: royalblue;
        }

        .title::after {
            width: 18px;
            height: 18px;
            animation: pulse 1s linear infinite;
        }

        .message,
        .signin {
            color: rgba(88, 87, 87, 0.822);
            font-size: 14px;
        }

        .signin {
            text-align: center;
        }

        .signin a {
            color: royalblue;
        }

        .signin a:hover {
            text-decoration: underline royalblue;
        }

        .flex {
            display: flex;
            width: 100%;
            gap: 6px;
        }

        .form label {
            position: relative;
        }

        .form label .input {
            width: 100%;
            padding: 10px 10px 20px 10px;
            outline: 0;
            border: 1px solid rgba(105, 105, 105, 0.397);
            border-radius: 10px;
        }

        .form label .input+span {
            position: absolute;
            left: 10px;
            top: 15px;
            color: grey;
            font-size: 0.9em;
            cursor: text;
            transition: 0.3s ease;
        }

        .form label .input:placeholder-shown+span {
            top: 15px;
            font-size: 0.9em;
        }

        .form label .input:focus+span,
        .form label .input:valid+span {
            top: 30px;
            font-size: 0.7em;
            font-weight: 600;
        }

        .form label .input:valid+span {
            color: green;
        }

        .submit {
            border: none;
            outline: none;
            background-color: royalblue;
            padding: 10px;
            border-radius: 10px;
            color: #fff;
            font-size: 16px;
            transform: .3s ease;
        }

        .submit:hover {
            background-color: rgb(56, 90, 194);
        }

        @keyframes pulse {
            from {
                transform: scale(0.9);
                opacity: 1;
            }

            to {
                transform: scale(1.8);
                opacity: 0;
            }
        }
    </style>
    <br>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <div class="center-container">


        <form class="form" action="{{ route('storeDriver') }}" method="POST">
            @csrf
            <p class="title">Register As a Driver </p>
            <p class="message">Signup now. </p>
            <div class="flex">
                <label>
                    <input required="" placeholder="" type="text" class="input" name="firstname">
                    <span>Firstname</span>
                </label>

                <label>
                    <input required="" placeholder="" type="text" class="input" name="lastname">
                    <span>Lastname</span>
                </label>
            </div>


            <label>
                <input required="" placeholder="" type="number" class="input" name="contact_number">
                <span>Contact Number </span>
            </label>

            <label>
                <input required="" placeholder="" type="text" class="input" name="address">
                <span>Address </span>
            </label>

            <label>
                <input required="" placeholder="" type="text" class="input" name="license_number">
                <span>License Number</span>
            </label>

            <label>
                <input required="" placeholder="" type="text" class="input" name="vehicle_number">
                <span>Vechicle Number </span>
            </label>

            <label>
                <input required="" placeholder="" type="text" class="input" name="username">
                <span>UserName</span>
            </label>

            <label>
                <input required="" placeholder="" type="password" class="input" name="password">
                <span>Password</span>
            </label>
            <label>
                <input required="" placeholder="" type="password" class="input">
                <span>Confirm password</span>
            </label>
            <button class="submit">Submit</button>
            <p class="signin">Already have an acount ? <a href="#">Signin</a> </p>
        </form>
    </div>
@endsection
