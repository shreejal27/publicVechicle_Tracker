<link rel="stylesheet" type="text/css" href="{{ asset('formStyles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('tableStyles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('pillStyles.css') }}">

@extends('necessary.admin_template')
@section('content')
    <div>
        <ul class="nav nav-pills">
            <li class="nav-item" data-path="fareList">
                <a class="nav-link active" data-toggle="tab" href="#fareList" aria-selected="true">Fares</a>
            </li>
            <li class="nav-item" data-path="fareForm">
                <a class="nav-link " data-toggle="tab" href="#fareForm" aria-selected="false">Add Fare</a>
            </li>

        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade" id="fareForm" role="tabpanel" data-path="fareForm">
            <section>
                <div class="center-container mt-5">
                    <div class="form-container col-md-3 mb-3">
                        <p class="title">This is farePrice</p>
                        <p class="subtitle">Add new Fare and Distance</p>
                        <form class="form" action="{{ route('store') }}" method="POST">
                            @csrf
                            <div class="input-group">
                                <label>Distance (in kms):</label>
                                <input type="text" name="distance" required>
                            </div>
                            @error('distance')
                                <p class="text-danger">**{{ $message }}</p>
                            @enderror
                            <div class="input-group">
                                <label>Price:</label>
                                <input type="text" name="price" required>
                            </div>
                            @error('price')
                                <p class="text-danger">**{{ $message }}</p>
                            @enderror
                            <button class="sign mt-3" type="submit">Submit</button>
                        </form>


                    </div>
                </div>
            </section>
        </div>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="fareList" role="tabpanel" data-path="fareList">
            <section class="mt-4">
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
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            // Show the active tab content on page load
            $('.nav-pills .active a').tab('show');

            // Update the active tab content when a new tab is clicked
            $('.nav-pills a').on('click', function(event) {
                event.preventDefault();
                var path = $(this).data('path');
                $('.tab-content .tab-pane').removeClass('show active');
                $('.tab-content').find('[data-path="' + path + '"]').addClass('show active');
            });
        });
    </script>
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
