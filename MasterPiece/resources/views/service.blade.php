<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="Orbitor,business,company,agency,modern,bootstrap4,tech,software">
  <meta name="author" content="themefisher.com">

  <title>Service</title>

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico" />

  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
  <!-- Icon Font Css -->
  <link rel="stylesheet" href="plugins/icofont/icofont.min.css">
  <!-- Slick Slider  CSS -->
  <link rel="stylesheet" href="plugins/slick-carousel/slick/slick.css">
  <link rel="stylesheet" href="plugins/slick-carousel/slick/slick-theme.css">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="css/style.css">
</head>

<body id="top">
  @include('partials.header')

  <section class="page-title bg-1">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="block text-center">
            <span class="text-white">Our services</span>
            <h1 class="text-capitalize mb-5 text-lg">What We Do</h1>
          </div>
        </div>
      </div>
    </div>
  </section>



  
  <section class="section service-2">
    <div class="container">
      <div class="row">
        @foreach($departments as $department)
          <div class="col-lg-4 col-md-6 col-sm-6 d-flex align-items-stretch">
            <div class="service-block mb-4 w-100 shadow rounded text-center p-3" style="background-color: #fff;">
              <img src="{{ asset('images/service/' . $department->image) }}" alt="Service Image" class="img-fluid rounded" style="height: 200px; object-fit: cover; width: 100%;">
              <div class="content mt-3">
                <h4 class="title-color mb-2">{{ $department->name }}</h4>
                <p class="text-muted">{{ $department->description }}</p>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
  
  
  
  <section class="section cta-page">
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <div class="cta-content">
            <div class="divider mb-4"></div>
            <h2 class="mb-5 text-lg">We are pleased to offer you the <span class="title-color">chance to have the healthy</span></h2>
            <a href="{{ route('appointment.form') }}" class="btn btn-main-2 btn-round-full">Get appointment <i class="icofont-simple-right ml-2"></i></a>
          </div>
        </div>
      </div>
    </div>
  </section>

  @include('partials.footer')

  <!-- Scripts -->
  <script src="plugins/jquery/jquery.js"></script>
  <script src="plugins/bootstrap/js/popper.js"></script>
  <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
  <script src="plugins/counterup/jquery.easing.js"></script>
  <script src="plugins/slick-carousel/slick/slick.min.js"></script>
  <script src="plugins/counterup/jquery.waypoints.min.js"></script>
  <script src="plugins/shuffle/shuffle.min.js"></script>
  <script src="plugins/counterup/jquery.counterup.min.js"></script>
  <script src="plugins/google-map/map.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap"></script>
  <script src="js/script.js"></script>
  <script src="js/contact.js"></script>
</body>
</html>
