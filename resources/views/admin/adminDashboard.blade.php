@extends('necessary.admin_template')
@section('content')
    <section>
        <!-- Additional content specific to the index file -->
        <?php
        $admin_id = session()->get('admin_id');
        echo $admin_id;
        ?>
        <h2>This is the Admin Index File</h2>

        <section class="d-flex">
            <div class="row ml-3">
                <div>
                    <p> registered Users:
                        <br>
                        11
                    </p>

                </div>
                <div>
                    <p>registered Drivers:
                        <br>
                        20
                    </p>
                </div>
            </div>
        </section>
    </section>
@endsection
