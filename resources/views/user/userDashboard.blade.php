@extends('necessary.user_template')

@section('content')
    <section>
        <!-- Additional content specific to the index file -->
        <?php
        $user_id = session()->get('user_id');
        echo $user_id;
        ?>
        <h2>This is the User Dashboard File</h2>
        <p>Now from now on everything becomes interesting!1

        </p>
    </section>
@endsection
