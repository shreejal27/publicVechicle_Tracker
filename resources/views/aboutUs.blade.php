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
                            Pioneering the future of public transportation, the "Public Vehicle Tracker" project is
                            committed to revolutionizing the way people navigate urban transit systems. Established with a
                            vision for smarter and more efficient public mobility, our project is at the forefront of
                            modernizing public transportation services. <br><br>

                            Our initiative embodies a blend of cutting-edge technology and a deep understanding of the
                            evolving needs of commuters. Through real-time tracking, data analytics, and user-centric
                            applications, we aim to provide passengers with a seamless and convenient travel experience.
                            Whether you're a daily commuter or an occasional traveler, our platform is designed to empower
                            you with information, making your journey more predictable and hassle-free.<br><br>

                            With a commitment to excellence and a passion for enhancing urban mobility, the "Public Vehicle
                            Tracker" project is not just about tracking vehicles; it's about transforming the way people
                            move within their cities. Join us on this journey toward smarter, more sustainable, and more
                            accessible public transportation. Together, we're shaping the future of urban mobility.
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
                            In the annals of modern urban transit, the inception of the "Public Vehicle Tracker" project
                            marks a significant milestone. With an unwavering commitment to providing affordable,
                            accessible, and reliable transportation services for the public, our project's journey commenced
                            under the banner of innovation and cooperative spirit.<br><br>

                            On the historic date of Wednesday, 16th March 1962, Sajha Yatayat was officially registered as a
                            cooperative entity under the then Cooperatives Act of 1959 AD. Just four months after its formal
                            establishment, this visionary organization embarked on its mission to revolutionize public
                            transportation services. On 16th July 1962, the first Sajha Yatayat buses hit the urban streets
                            of Kathmandu, introducing a new era of mobility. Mr. Vishwabandhu Thapa, a visionary leader,
                            served as the founding chairman of this remarkable initiative.<br><br>

                            Over the years, our cooperative has garnered investments from various stakeholders, including
                            government ministries and departments, Kathmandu and Lalitpur Metropolitan Cities, Godavari and
                            Mahalakshmi Municipalities, local communities, organizations, and the general public. This
                            collective effort has played a pivotal role in shaping our organization's legacy.
                        </p>
                        <h5>Current Scenario</h5>
                        <p>
                            The "Public Vehicle Tracker" project has evolved into a dynamic and indispensable component of
                            modern urban transportation systems. As of [Current Date], the project is at the forefront of
                            revolutionizing how the public commutes, offering real-time tracking and information services
                            for public vehicles.<br><br>

                            Our project is proud to report a significant expansion in terms of both coverage and impact.
                            Currently, the system is actively tracking and monitoring a substantial fleet of public
                            vehicles, serving bustling metropolitan areas, suburban regions, and even connecting neighboring
                            districts. This wide-ranging coverage ensures that commuters across various geographies can
                            access accurate and up-to-date information about public vehicle locations, routes, and
                            schedules.<br><br>

                            In terms of technological advancements, the "Public Vehicle Tracker" project remains at the
                            cutting edge. Continuous enhancements and updates have been implemented to provide an intuitive
                            and user-friendly experience for commuters. The project's mobile application and web-based
                            platforms have garnered a growing user base, signifying the increased reliance on this
                            technology for daily commuting needs.
                        </p>
                    </section>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade" id="vision" role="tabpanel" data-path="vision">
                    <section>
                        <h2> Vision & Strategy</h2>
                        <p>
                            The "Public Vehicle Tracker" project envisions a future where public transportation is seamlessly accessible, highly efficient, and environmentally sustainable. At its core, the project aims to redefine urban mobility by harnessing the power of technology to empower commuters and enhance the overall public transportation experience.<br><br>

                            Our vision is to become the go-to platform for commuters across [Your Project's Geographic Region] seeking reliable, real-time information about public vehicles. We aspire to bridge the gap between commuters and public transportation by providing a user-friendly, comprehensive, and intuitive solution that simplifies the daily commute.<br><br>
                            
                            To achieve this vision, our strategy is multifaceted. First and foremost, we are committed to continuous innovation and technological advancement. We will invest in cutting-edge tracking and communication technologies to ensure that commuters can access accurate and up-to-date information about public vehicle locations, routes, and schedules. This will not only reduce waiting times but also contribute to a more efficient use of public transportation resources.<br><br>
                            
                            Furthermore, we are dedicated to fostering partnerships and collaborations with public transportation agencies, local governments, and other stakeholders. By working together, we can integrate our tracking and monitoring system seamlessly into existing transportation infrastructure, ensuring a cohesive and interconnected urban mobility network.
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
