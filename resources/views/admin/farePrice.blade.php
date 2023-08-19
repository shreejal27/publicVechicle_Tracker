<link rel="stylesheet" type="text/css" href="{{ asset('formStyles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('tableStyles.css') }}">

@extends('necessary.admin_template')
@section('content')
    <section>
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

    <section class="m-3 mt-4">

        <table class="table table-hover col-md-6 col-sm-6 col-lg-6 col-xl-6">
            <thead>
                <th colspan="4"> Fare List</th>
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
                            <a href="/fareEdit/{{ $fare->id }}"><i class=" fa fa-solid fa-pen-to-square fa-lg"
                                    style="color: #f3deba;"></i></a>
                            <a href="" data-route="/fareDelete/{{ $fare->id }}"
                                onclick="return confirmDelete(event)"><i class="fa-solid fa-trash fa-lg"
                                    style="color: #f3deba;"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
    <script>
        function confirmDelete(event) {
            event.preventDefault(); // Prevent the default link behavior
            const route = event.currentTarget.getAttribute('data-route');
            Swal.fire({
                position: 'top-end',
                title: 'Are you sure you want to delete?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = route;
                }
            });

            return false;
        }
    </script>
@endsection
