<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('images/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries -->
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Stylesheets -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styleadmin.css') }}" rel="stylesheet">
</head>

<body>
    @php $user = Auth::user(); @endphp

    <div class="container-xxl position-relative bg-white d-flex p-0">

        <!-- Spinner -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <div class="navbar-brand mx-4 mb-3">
                    <a href="#"><img src="{{ asset('images/calmoram.png') }}" alt="Site Logo" style="height: 50px;"></a>
                </div>

                <!-- User Info -->
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle"
                            src="{{ $user->profile_picture ? asset('storage/profile_pictures/' . $user->profile_picture) : asset('images/user.jpg') }}"
                            alt="User" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">{{ $user ? $user->name : 'Guest' }}</h6>
                    </div>
                </div>

                <style>
                    .nav-item { color: black; }
                    .nav-item i { color: red; }
                </style>

                <!-- Navigation Links -->
                <ul class="navbar-nav">
                    <li>
                        <a href="{{ route('user-account.my-account') }}" class="nav-item nav-link">
                            <i class="fa fa-user-circle me-2"></i> My Account
                        </a>
                        <a href="{{ route('appointment.form') }}" class="nav-item nav-link">
                            <i class="fa fa-calendar-plus me-2"></i> Book Now
                        </a>
                        <a href="{{ route('user-account.editProfile') }}" class="nav-item nav-link">
                            <i class="fa fa-edit me-2"></i> Edit Profile
                        </a>
                        <a href="{{ route('home') }}" class="nav-item nav-link">
                            <i class="fa fa-sign-out-alt me-2"></i> Back
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Content -->
        <div class="content">

            <!-- Top Navbar -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="#" class="sidebar-toggler flex-shrink-0"><i class="fa fa-bars"></i></a>

                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle"
                                src="{{ $user->profile_picture ? asset('storage/profile_pictures/' . $user->profile_picture) : asset('images/user.jpg') }}"
                                alt="User" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">{{ $user ? $user->name : 'Guest' }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="{{ route('logout') }}" class="dropdown-item"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Log Out
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page-specific Content (You can add more here) -->

        </div>
        <!-- End Content -->

    </div>

    <!-- Footer -->
    @include('user-account.appp.footer')

    <!-- Animation Styles -->
    <style>
        .fade-in {
            opacity: 0;
            transform: translateY(-50px);
            animation: fadeInAnimation 1s ease-out forwards;
        }
        @keyframes fadeInAnimation {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

</body>
</html>
