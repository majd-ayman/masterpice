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
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
  <!-- Icon Font Css -->
  <link rel="stylesheet" href="plugins/icofont/icofont.min.css">
  <!-- Slick Slider  CSS -->
  <link rel="stylesheet" href="plugins/slick-carousel/slick/slick.css">
  <link rel="stylesheet" href="plugins/slick-carousel/slick/slick-theme.css">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

 
  <style>
    .btn-custom {
        background-color: #e12454;
        color: white;
        border-radius: 50px;
        padding: 10px 30px;
        transition: background-color 0.3s ease;
        margin: 5px;
    }

    .dropdown-menu {
        background-color: white;
        min-width: 160px;
        border: none;
        padding: 10px 0;
    }

    .dropdown-item {
        color: #333;
        padding: 10px 20px;
        transition: background-color 0.3s ease, color 0.3s ease;
        font-weight: 500;
    }

    .dropdown-item:hover {
        color: white;
        border-radius: 0;
    }

    .navbar-nav .nav-item {
        margin-right: 20px;
    }

    .navbar-nav .nav-item:last-child {
        margin-right: 0;
    }
</style>

</head>

<body id="top">

<header>
    <nav class="navbar navbar-expand-lg navigation" id="navbar">
        <div class="container d-flex justify-content-between align-items-center">

            <!-- الجهة اليسار (مكان اللوجو) -->
            <a class="navbar-brand" href="{{ route('index') }}">
                <!-- أضف صورة اللوجو هنا -->
                <img src="{{ asset('images/calmoram.png') }}" alt="Logo" height="50">
            </a>

            <!-- روابط التنقل في المنتصف -->
            <div class="mx-auto">
                <ul class="navbar-nav">
                    <li class="nav-item active"><a class="nav-link" href="{{route('index')}}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('about')}}">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('service')}}">services</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('department')}}">Department</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('doctor')}}">Doctors</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('contact.show') }}">Contact</a></li>
                </ul>
            </div>

            <!-- الجهة اليمين (Login / User dropdown) -->
            <div class="ml-auto">
                @if(Auth::check())
                    <li class="nav-item dropdown list-unstyled d-inline-block">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownAccount" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Hello, {{ Auth::user()->name }}!
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownAccount">
                            <li><a class="dropdown-item" href="{{route('user-account.my-account')}}">My Account</a></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="dropdown-item btn-custom">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <a class="btn btn-custom" href="{{route('login')}}">Login</a>
                @endif
            </div>

        </div>
    </nav>
</header>

<!-- باقي محتوى الصفحة -->

<!-- Scripts -->
<script src="plugins/jquery/jquery.js"></script>
<script src="plugins/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
