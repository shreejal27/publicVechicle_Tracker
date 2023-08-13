<link rel="stylesheet" type="text/css" href="{{ asset('formStyles.css') }}">
@extends('necessary.admin_template')
@section('content')
  
    <section>
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <div class="center-container mt-5">
            <div class="form-container col-md-3 mb-3">
                <p class="title">This is farePrice</p>
                <p class="subtitle">Add new Fare and Distance</p>
                <form class="form" id="userCredentialForm" action="{{ route('store') }}" method="POST">
                    @csrf
                    <div class="input-group">
                        <label>Distance (in kms):</label>
                        <input type="text" name="distance" required>
                    </div>
                    <div class="input-group">
                        <label>Price:</label>
                        <input type="text" name="price" required>
                    </div>
                    <button class="sign mt-3" type="submit">Submit</button>
                </form>
            </div>
        </div>
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
                            <a href="/fareEdit/{{ $fare->id }}">Edit</a>
                            <a href="/fareDelete/{{ $fare->id }}"
                                onclick="return confirm('Are you sure you want to delete this fare?')">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection
