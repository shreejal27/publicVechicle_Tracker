<link rel="stylesheet" type="text/css" href="{{ asset('pillStyles.css') }}">
@extends('necessary.common_template')

@section('content')
    <style>
        .nav-pills .nav-item {
            display: block;
            width: 100% !important;
        }
    </style>
    <section class="title mt-5 mb-5">
        <h2 class="text-center">About Us</h2>
    </section>
    <section class="main m-5">
        <div style="width: 20%; padding:1rem; float: left">
            <ul class="nav nav-pills">
                <li class="nav-item" data-path="who">
                    <a class="nav-link active" data-toggle="tab" href="#who" aria-selected="true">Who We Are</a>
                </li>
                <li class="nav-item" data-path="our">
                    <a class="nav-link " data-toggle="tab" href="#our" aria-selected="false">Our History</a>
                </li>
                <li class="nav-item" data-path="vision">
                    <a class="nav-link " data-toggle="tab" href="#vision" aria-selected="false">Vision & Strategy</a>
                </li>
            </ul>
        </div>
        <div class="form ml-3" style="width: 75%; padding:1rem; float:left;">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="who" role="tabpanel" data-path="who">
                    <section>
                        <h2> Who We Are</h2>
                        <p>
                            Established in 1962, Sajha Yatayat is a cooperative company providing public transportation
                            services. Currently, we are operating a fleet of 71 large Euro 3 and 4 standard diesel buses.
                            Most of our buses operate primarily in the Kathmandu valley, servicing around 26,000 passengers
                            daily across the metropolitan region. We also provide long-route transportation services to
                            districts neighbouring the valley, including Baglung district, Butwal and Bhairahawa in
                            Rupandehi district, as well as Kushma in Parbat district. <br><br>

                            Our fleet covers over 74,000 km daily and connects two metropolitan cities, namely Kathmandu and
                            Lalitpur. We also cover seven municipalities which are Budhanilkantha, Madhya Thimi, Bhaktapur,
                            Dakshinkali, Karyabinayak, Mahalaxmi, and Godawari.<br><br>

                            We aim to provide clean transportation services. With this aim in mind, we are adding 40 Battery
                            Operated Electric Buses (BEB) to our current fleet and plan to replace all our diesel buses with
                            BEB by 2025.
                        </p>
                    </section>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade" id="our" role="tabpanel" data-path="our">
                    <section>
                        <h2> Our History</h2>

                        <h5>The Beginning</h5>
                        <p>
                            With the main objective of operating cheap, accessible and reliable transport service for the
                            general public, Sajha Yatayat was registered as a cooperative under the then Cooperatives Act
                            1959 AD on Wednesday, 16th March 1962. Four months after its establishment, the organisation
                            started providing public transport services in the urban area of Kathmandu on 16th July 1962, Mr
                            Vishwabandhu Thapa was the founding chairman of this organisation. Ministries and departments of
                            the Government of Nepal, Kathmandu Metropolitan City, Lalitpur Metropolitan City, Godavari
                            Municipality, Mahalakshmi Municipality, local level, various organisations and the general
                            public have also invested in our organisation.
                        </p>
                        <h5>Current Scenario</h5>
                        <p>
                            Currently, Sajha Yatayat operates 71 large size buses in its fleet out of which four buses are
                            running in long routes and the remaining 67 are operating as city buses within Kathmandu Valley.
                            Adding to this, 40 mid-sized electric buses have been procured which will be in operation by
                            August, 2022.<br><br>

                            There are 21 employees of different posts and levels working under the management of Sajha
                            Yatayat. The manpower required for the operation of the bus has been outsourced to 124 bus
                            drivers, 124 conductors, 3 security guards and 1 light driver.
                        </p>
                    </section>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade" id="vision" role="tabpanel" data-path="vision">
                    <section>
                        <h2> Vision & Strategy</h2>
                        <p>
                            Our Vision statement is as follows:
                        </p>

                        <h5> "To be the leading transport agency providing affordable, efficient and safe mode of urban and inter-district public transportation services in Nepal, as well as flag-carrier cross border service to regional cities."</h5>
                        <p>
                            To achieve our vision, we embark on certain short-, medium- and long-term strategy. 
                        </p>
                        <h5> Our short-term strategy</h5>
                        <p>
                            Revive its operations in Kathmandu Valley's urban space, with the aim of generating public goodwill as well as visibility, while maximizing the sustainability factor before the organization enters into a more profitably restructured entity in the medium- and long-term.
                        </p>

                    </section>
                </div>
            </div>
        </div>
    </section>
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
@endsection
