{{-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="Orbitor,business,company,agency,modern,bootstrap4,tech,software">
  <meta name="author" content="themefisher.com">

  <title>Calmora</title>

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico" />

  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">
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

    .btn-custom:hover {
        color: white !important;
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

    .nav-item.active .nav-link {
        color: #e12454;
        font-weight: bold;
        border-bottom: 2px solid #e12454;
    }
  </style>

</head>

<body id="top">

<header>
    <nav class="navbar navbar-expand-lg navigation" id="navbar">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand" href="{{ route('index') }}">
                <img src="{{ asset('images/calmoram.png') }}" alt="Logo" height="50">
            </a>

            <div class="mx-auto">
                <ul class="navbar-nav">
                    <li class="nav-item {{ request()->routeIs('index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('index') }}">Home</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('about') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('about') }}">About</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('service') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('service') }}">Services</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('department') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('department') }}">Department</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('doctor') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('doctor') }}">Doctors</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('contact.show') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('contact.show') }}">Contact</a>
                    </li>
                </ul>
            </div>

            <div class="ml-auto">
                @if(Auth::check())
                    <li class="nav-item dropdown list-unstyled d-inline-block {{ request()->is('user-account*') ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="dropdownAccount" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img 
                                src="{{ Auth::user()->profile_picture ? asset('storage/profile_pictures/' . Auth::user()->profile_picture) : asset('images/user.jpg') }}" 
                                alt="User" 
                                class="rounded-circle" 
                                width="50" height="50" 
                                style="object-fit: cover; margin-right: 8px;">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownAccount">
                            <li><a class="dropdown-item" href="{{ route('user-account.my-account') }}">My Account</a></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="dropdown-item btn-custom">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    @if (!request()->routeIs('login') && !request()->routeIs('register'))
                        <a class="btn btn-custom" href="{{ route('login') }}">Login</a>
                    @endif
                @endif
            </div>

        </div>
    </nav>
</header>

<script src="plugins/bootstrap/js/bootstrap.min.js"></script>

</body>
</html> --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- مهم للريسبونسيف -->
  <meta name="description" content="Orbitor,business,company,agency,modern,bootstrap4,tech,software">
  <meta name="author" content="themefisher.com">

  <title>Calmora</title>

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico" />

  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">
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

    .btn-custom:hover {
      color: white !important;
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

    .nav-item.active .nav-link {
      color: #e12454;
      font-weight: bold;
      border-bottom: 2px solid #e12454;
    }

    @media (max-width: 991.98px) {
      .navbar-nav {
        text-align: center;
      }
      .ml-auto {
        margin-top: 15px;
        text-align: center;
      }
    }
  </style>
</head>

<body id="top">

<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm" id="navbar">
    <div class="container">

      <a class="navbar-brand" href="{{ route('index') }}">
        <img src="{{ asset('images/calmoram.png') }}" alt="Logo" height="50">
      </a>

      <!-- زر القائمة في الشاشات الصغيرة -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- محتوى النافيجيشن -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mx-auto">
          <li class="nav-item {{ request()->routeIs('index') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('index') }}">Home</a>
          </li>
          <li class="nav-item {{ request()->routeIs('about') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('about') }}">About</a>
          </li>
          <li class="nav-item {{ request()->routeIs('service') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('service') }}">Services</a>
          </li>
          <li class="nav-item {{ request()->routeIs('department') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('department') }}">Department</a>
          </li>
          <li class="nav-item {{ request()->routeIs('doctor') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('doctor') }}">Doctors</a>
          </li>
          <li class="nav-item {{ request()->routeIs('contact.show') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('contact.show') }}">Contact</a>
          </li>
        </ul>

        <div class="ml-auto d-flex align-items-center justify-content-center">
          @if(Auth::check())
            <li class="nav-item dropdown list-unstyled">
              <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="dropdownAccount" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img 
                  src="{{ Auth::user()->profile_picture ? asset('storage/profile_pictures/' . Auth::user()->profile_picture) : asset('images/user.jpg') }}" 
                  alt="User" class="rounded-circle" width="50" height="50" 
                  style="object-fit: cover; margin-right: 8px;">
                {{ Auth::user()->name }}
              </a>
              <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownAccount">
                <li><a class="dropdown-item" href="{{ route('user-account.my-account') }}">My Account</a></li>
                <li>
                  <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="dropdown-item btn-custom">Logout</button>
                  </form>
                </li>
              </ul>
            </li>
          @else
            @if (!request()->routeIs('login') && !request()->routeIs('register'))
              <a class="btn btn-custom" href="{{ route('login') }}">Login</a>
            @endif
          @endif
        </div>

      </div>
    </div>
  </nav>
</header>

<!-- Scripts -->
  {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.min.js"></script>

<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>
