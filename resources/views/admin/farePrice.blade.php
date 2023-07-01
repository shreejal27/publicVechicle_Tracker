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
    <section>
        <h2>Fare List</h2>
        <table>
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Distance (in kms)</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fares as $fare)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $fare->distance }}</td>
                        <td>{{ $fare->price }}</td>
                        <td>
                            <a href="{{ route('edit', $fare->id) }}">Edit</a>
                            <a href="{{ route('delete', $fare->id) }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection
