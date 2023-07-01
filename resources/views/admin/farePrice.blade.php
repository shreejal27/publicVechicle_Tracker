@extends('necessary.admin_template')
@section('content')
    <section class="title">
        <h1>This is farePrice</h1>
    </section>
    <section>
        <p>Add new Fare and Distance</p>
    </section>
    <section>
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <form action="{{ route('store') }}" method="post">
            @csrf
            <label>Distance (in kms): </label>
            <input type="text" name="distance" id="distance"> <br>
            <label>Price: </label>
            <input type="text" name="price" id="price"> <br>
            <input type="submit" value="Add">
        </form>
    </section>
@endsection
