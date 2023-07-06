<style>
    .formBox {
        background-color: #15172b;
        border-radius: 20px;
        box-sizing: border-box;
        height: auto;
        padding: 20px;
        width: 50%;
        text-align: center;
        margin-left: 25%;
    }

    .title {
        color: #eee;
        font-family: sans-serif;
        font-size: 36px;
        font-weight: 600;

    }

    .subtitle {
        color: #eee;
        font-family: sans-serif;
        font-size: 16px;
        font-weight: 600;
        margin-top: 10px;
    }

    .input-container {
        height: 50px;
        position: relative;
        width: 100%;
    }

    .ic1 {
        margin-top: 40px;
    }

    .ic2 {
        margin-top: 30px;
    }

    .input {
        background-color: #303245;
        border-radius: 12px;
        border: 0;
        box-sizing: border-box;
        color: #eee;
        font-size: 18px;
        height: 100%;
        outline: 0;
        padding: 4px 20px 0;
        width: 100%;
    }

    .cut {
        background-color: #15172b;
        border-radius: 10px;
        height: 20px;
        left: 20px;
        position: absolute;
        top: -20px;
        transform: translateY(0);
        transition: transform 200ms;
        width: 76px;
    }

    .cut-short {
        width: 50px;
    }

    .iLabel {
        color: #65657b;
        font-family: sans-serif;
        left: 20px;
        line-height: 14px;
        pointer-events: none;
        position: absolute;
        transform-origin: 0 50%;
        transition: transform 200ms, color 200ms;
        top: 20px;
    }

    .input:focus~.cut {
        transform: translateY(8px);
    }

    .input:focus~.iLabel {
        transform: translateY(-30px) translateX(10px) scale(0.75);
    }

    .input:not(:focus)~.iLabel {
        color: #808097;
    }

    .input:focus~.iLabel {
        color: #dc2f55;
    }

    .submit {
        background-color: #08d;
        border-radius: 12px;
        border: 0;
        box-sizing: border-box;
        color: #eee;
        cursor: pointer;
        font-size: 18px;
        height: 50px;
        margin-top: 38px;
        text-align: center;
        width: 100%;
    }

    .submit:active {
        background-color: #06b;
    }

    textarea {
        height: 17rem;
        width: 100%;
    }

    select {
        height: 30px;
        float: left;
        width: 25%;
    }
</style>
@extends('necessary.user_template')
@section('content')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="formBox">
        <div class="title">We are here to assist you</div>
        <div class="subtitle">Please complete the form below!</div>
        <form action="{{ route('storeComplainFeedback') }}" method="POST">
            @csrf
            <div class="input-container ic1">
                <input placeholder="" type="text" class="input" id="username" name="username" required>
                <div class="cut"></div>
                <label class="iLabel" for="username">UserName</label>
            </div>

            {{-- <div class="input-container ic2">
                <input placeholder="" type="text" class="input" id="phone">
                <div class="cut cut-short"></div>
                <label class="iLabel" for="phone">Phone</label>
            </div> --}}
            <br>
            <select name="formType" required>
                <option value="complain">Complain</option>
                <option value="feedback">Feedback</option>
                <option value="query">Query</option>
                <option value="request">Request</option>
            </select>
            <br>
            <br>
            <textarea name="formDescription" placeholder="Write your message here" required></textarea>
            {{-- <div class="input-container ic2">
                <input placeholder="" type="text" class="input" id="email">
                <div class="cut cut-short"></div>
                <label class="iLabel" for="email">Email</label>
            </div> --}}
            <input type="submit" value="submit" class="Submit">
        </form>
    </div>
@endsection
