@extends('necessary.admin_template')
@section('content')
    <section class="title">
        <h1>Edit Fare</h1>
    </section>
    <section>
        <form action="{{ route('update', $fare->id) }}" method="post">
            @csrf
            <label>Distance (in kms):</label>
            <input type="text" name="distance" value="{{ $fare->distance }}"> <br>
            <label>Price:</label>
            <input type="text" name="price" value="{{ $fare->price }}"> <br>
            <input type="submit" value="Update">
        </form>
    </section>
@endsection
