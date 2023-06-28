@extends('necessary.admin_template')
@section('content')
    <section class="title">
        <h1>This is farePrice</h1>
    </section>
    <section>
        <p>Add new Fare and Distance</p>
    </section>
    <form action="" method="post">
        <label>Distance (in kms): </label>
        <input type="text" name="distance" id="distance"> <br>
        <label>Price: </label>
        <input type="text" name="distance" id="distance"> <br>
        <input type="submit" value="Add">
    </form>
@endsection
