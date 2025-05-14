<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="Orbitor,business,company,agency,modern,bootstrap4,tech,software">
    <meta name="author" content="themefisher.com">

    <title>Masterpice</title>

    <!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico" />

    <!-- bootstrap.min css -->
	<link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">
    <!-- Icon Font Css -->
    <link rel="stylesheet" href="plugins/icofont/icofont.min.css">
    <!-- Slick Slider  CSS -->
	<link rel="stylesheet" href="{{ asset('plugins/slick-carousel/slick/slick.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/slick-carousel/slick/slick-theme.css') }}">

    <!-- Main Stylesheet -->
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<!-- Font Awesome CDN -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

</head>

<body id="top">

    @include('partials.header')


    <section class="page-title bg-1">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <span class="text-white">Department Details</span>
                        <h1 class="text-capitalize mb-5 text-lg">Single Department</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="section department-single">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="department-img">
						<img src="{{ asset('images/service/bg-1.jpg') }}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="department-content mt-5">
						<h3>{{ $department->name }}</h3>
						<p>{{ $department->long_description }}</p>
						
						<h4>Services features:</h4>
						<ul>
							@foreach (explode(',', $department->services) as $feature)
								<li>{{ trim($feature) }}</li>
							@endforeach
						</ul>
						


                        <a href="{{ route('appointment.form') }}" class="btn btn-main-2 btn-round-full">Make an
                            Appointment <i class="icofont-simple-right ml-2"></i></a>
                    </div>
                </div>


               <div class="col-lg-4">
    <div class="sidebar-widget schedule-widget mt-5">
        <h5 class="mb-4">Time Schedule</h5>

        <ul class="list-unstyled">
            <li class="d-flex justify-content-between align-items-center">
                <a >Sunday - Thursday</a>
                <span>8:00 AM - 13:00 PM</span>
            </li>
            <li class="d-flex justify-content-between align-items-center">
                <a >Friday - Saturday </a>
                <span>Closed</span>
            </li>
          
        </ul>

        <div class="sidebar-contatct-info mt-4">
            <p class="mb-0">Need Urgent Help?</p>
            <h3>0770467339</h3>
        </div>
    </div>
</div>

            </div>
        </div>
    </section>

    <!-- footer Start -->
    @include('partials.footer')

    <!--
    Essential Scripts
    =====================================-->
<!-- Main jQuery -->
<script src="{{ asset('plugins/jquery/jquery.js') }}"></script>

<!-- Bootstrap 4.3.2 -->
<script src="{{ asset('plugins/bootstrap/js/popper.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('plugins/counterup/jquery.easing.js') }}"></script>

<!-- Slick Slider -->
<script src="{{ asset('plugins/slick-carousel/slick/slick.min.js') }}"></script>

<!-- Counterup -->
<script src="{{ asset('plugins/counterup/jquery.waypoints.min.js') }}"></script>

<script src="{{ asset('plugins/shuffle/shuffle.min.js') }}"></script>
<script src="{{ asset('plugins/counterup/jquery.counterup.min.js') }}"></script>

<!-- Google Map -->
<script src="{{ asset('plugins/google-map/map.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap"></script>

<script src="{{ asset('js/script.js') }}"></script>
<script src="{{ asset('js/contact.js') }}"></script>


</body>

</html>
