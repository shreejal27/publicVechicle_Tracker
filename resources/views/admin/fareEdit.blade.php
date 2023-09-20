<link rel="stylesheet" type="text/css" href="{{ asset('formStyles.css') }}">
@extends('necessary.admin_template')
@section('content')
    <section>
        {{-- check if this session holds any importance or not --}}
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <div class="center-container mt-5">
            <div class="form-container col-md-3 mb-3">
                <p class="title">Edit Fare</p>
                <form class="form" id="editFare" action="{{ route('update', $fare->id) }}" method="POST">
                    @csrf
                    <div class="input-group">
                        <label>Distance (in kms):</label>
                        <input type="text" name="distance" value="{{ $fare->distance }}" required>
                    </div>
                    @error('distance')
                    <p class="text-danger">**{{ $message }}</p>
                    @enderror
                    <div class="input-group">
                        <label>Price:</label>
                        <input type="text" name="price" value="{{ $fare->price }}" required>
                    </div>
                    @error('price')
                    <p class="text-danger">**{{ $message }}</p>
                    @enderror
                    <button class="sign mt-3" type="submit">Update</button>
                </form>
            </div>
        </div>
    </section>
@endsection
