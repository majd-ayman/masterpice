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

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/styleadmin.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

</head>

<body>

    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <div class="navbar-brand mx-4 mb-3">
                    <a href="#">
                        <img src="{{ asset('images/calmoram.png') }}" alt="Site Logo" style="height: 50px;">
                    </a>
                </div>

                @php
                    $user = Auth::user();
                    $doctor = $user->doctor ?? null;
                @endphp

                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle"
                        src="{{ $user->profile_picture ? asset('storage/profile_pictures/' . $user->profile_picture) : asset('images/user.jpg') }}"
                        alt="Doctor" style="width: 40px; height: 40px;">
                        <div
                            class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                        </div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">{{ $doctor ? $doctor->name : 'Guest' }}</h6>
                        <span>Doctor</span>
                    </div>
                </div>
                <style>
                    .nav-item {
                        color: black;
                    }

                    .nav-item i {
                        color: red;
                    }
                </style>


<ul class="navbar-nav">
    <li>
        <a href="{{ route('doctor.dashboard') }}" class="nav-item nav-link {{ request()->routeIs('doctor.dashboard') ? 'active' : '' }}">
            <i class="fa fa-tachometer-alt me-2"></i> Dashboard
        </a>
        <a href="{{ route('doctor.edit.info') }}" class="nav-item nav-link {{ request()->routeIs('doctor.edit.info') ? 'active' : '' }}">
            <i class="fa fa-edit me-2"></i> Edit Profile
        </a>
    </li>
</ul>



            </nav>


        </div>

        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">


                    @php
                        use Illuminate\Support\Facades\Auth;
                        $user = Auth::user();
                        $doctor = $user->doctor ?? null;
                    @endphp

                    {{-- //notifications --}}
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notifications</span>
                            @if (auth()->user()->unreadNotifications->count())
                                <span class="badge bg-danger">{{ auth()->user()->unreadNotifications->count() }}</span>
                            @endif
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0"
                            style="max-height: 300px; overflow-y: auto;">

                            @forelse(auth()->user()->notifications->take(5) as $notification)
                                <a href="{{ url('/doctor/appointments') }}" class="dropdown-item">
                                    <h6 class="fw-normal mb-0">{{ $notification->data['title'] ?? 'New Notification' }}
                                    </h6>
                                    <small>{{ $notification->created_at->diffForHumans() }}</small>
                                </a>
                                <hr class="dropdown-divider">
                            @empty
                                <a href="#" class="dropdown-item text-center">No Notifications</a>
                            @endforelse
                            <form action="{{ route('notifications.markAsRead') }}" method="POST" class="text-center">
                                @csrf
                                <button type="submit" class="dropdown-item text-primary border-0 bg-transparent w-100">
                                    Mark all as read
                                </button>
                            </form>
                            
                        </div>
                    </div>



                    <div class="nav-item dropdown">

                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle"



                            src="{{ $user->profile_picture ? asset('storage/profile_pictures/' . $user->profile_picture) : asset('images/2.jpg') }}"



                                alt="Doctor" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">{{ $doctor ? $doctor->name : 'Guest' }}</span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="{{ route('logout') }}" class="dropdown-item"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Log Out
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>

                </div>
            </nav>
            <!-- Navbar End -->
