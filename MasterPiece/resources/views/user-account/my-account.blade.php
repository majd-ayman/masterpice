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

    <!-- Icon Font Stylesheets -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheets -->
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/styleadmin.css') }}" rel="stylesheet">
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

                @php $user = Auth::user(); @endphp


                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        @php
                            $user = Auth::user();
                        @endphp

                        <img class="rounded-circle"
                            src="{{ $user->profile_picture ? asset('storage/profile_pictures/' . $user->profile_picture) : asset('images/user.jpg') }}"
                            alt="User" style="width: 40px; height: 40px;">
                        <div
                            class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                        </div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">{{ $user ? $user->name : 'Guest' }}</h6>
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
        <a href="{{ route('user-account.my-account') }}"
           class="nav-item nav-link {{ request()->routeIs('user-account.my-account') ? 'active' : '' }}">
            <i class="fa fa-user-circle me-2"></i> My Account
        </a>

        <a href="{{ route('book.now') }}"
           class="nav-item nav-link {{ request()->routeIs('book.now') ? 'active' : '' }}">
            <i class="fa fa-calendar-plus me-2"></i> Book Now
        </a>

        <a href="{{ route('user-account.editProfile') }}"
           class="nav-item nav-link {{ request()->routeIs('user-account.editProfile') ? 'active' : '' }}">
            <i class="fa fa-edit me-2"></i> Edit Profile
        </a>

        <a href="{{ route('user-account.medicalHistory') }}"
           class="nav-item nav-link {{ request()->routeIs('user-account.medicalHistory') ? 'active' : '' }}">
            <i class="fa fa-file-medical me-2"></i> Medical Records
        </a>

        <a href="{{ route('home') }}" class="nav-item nav-link">
            <i class="fa fa-sign-out-alt me-2"></i> Back
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
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>

                <form class="d-none d-md-flex ms-4" action="{{ route('user-account.search') }}" method="GET">
                    <input class="form-control border-0" type="search" name="query"
                        placeholder="Search appointments, doctors, clinics...">
                </form>


                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">


                            @php
                                $user = Auth::user();
                            @endphp

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
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->
            @if (isset($query))
                <h5>Search Results for: "{{ $query }}"</h5>

                <h6>Appointments</h6>
                @forelse ($appointments as $appointment)
                    <p>{{ $appointment->appointment_date }} - {{ $appointment->status }}</p>
                @empty
                    <p>No appointments found.</p>
                @endforelse

                <h6>Doctors</h6>
                @forelse ($doctors as $doctor)
                    <p>{{ $doctor->name }} - {{ $doctor->specialty }}</p>
                @empty
                    <p>No doctors found.</p>
                @endforelse

                <h6>Clinics</h6>
                @forelse ($clinics as $clinic)
                    <p>{{ $clinic->name }} - {{ $clinic->location }}</p>
                @empty
                    <p>No clinics found.</p>
                @endforelse
            @endif

            <!-- Animation CSS -->
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

            <!-- Welcome Message -->
            <div class="container-fluid custom-container">
                <h2 class="text-center mb-4 fade-in">
                    👋 Welcome, <span style="color: #0d6efd;">{{ $user->name }}</span>!
                </h2>

                <!-- User Profile Information -->
                <div class="card mb-3">
                    <div class="card-header">Profile Information</div>
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-md-6"><strong>Name:</strong> {{ $user->name }}</div>
                            <div class="col-md-6"><strong>Email:</strong> {{ $user->email }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6"><strong>Phone:</strong> {{ $user->phone ?? 'Not Available' }}</div>
                            <div class="col-md-6"><strong>Address:</strong> {{ $user->address ?? 'Not Available' }}
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6"><strong>Gender:</strong>
                                {{ $user->gender == 'male' ? 'Male' : 'Female' }}</div>
                            <div class="col-md-6"><strong>Age:</strong> {{ $user->age ?? 'Not Specified' }}</div>
                        </div>

                        @if ($user->profile_picture)
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <strong>Profile Picture:</strong><br>
                                    <img src="{{ asset('storage/profile_pictures/' . $user->profile_picture) }}"
                                        alt="Current Profile Picture" class="profile-picture-preview">
                                </div>
                            </div>
                        @endif

                        <a href="{{ route('user-account.editProfile') }}" class="btn btn-sm btn-primary mt-3">Edit
                            Profile</a>
                    </div>
                </div>



                <!-- Appointments -->
                <div class="card mb-3">
                    <div class="card-header">My Appointments</div>
                    <div class="card-body">
                        @if ($appointments->count())
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Clinic</th>
                                            <th>Doctor</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Status</th>
                                            <th>Action</th>



                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($appointments as $appointment)
                                            <tr>
                                                <td>{{ $appointment->clinic->name ?? 'Not Available' }}</td>
                                                <td>{{ $appointment->doctor->name ?? 'Not Available' }}</td>

                                                <td>{{ $appointment->appointment_date }}</td>
                                                <td>{{ ucfirst($appointment->appointment_time) }}</td>

                                                <td>{{ ucfirst($appointment->status) }}</td>

                                                <td>
                                                    <form action="{{ route('appointments.cancel', $appointment->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to cancel this appointment?')">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="btn btn-danger btn-sm">Cancel</button>
                                                        <a href="{{ route('myappointments.edit', $appointment->id) }}"
                                                            class="btn btn-primary btn-sm" style="display:inline-block;">
                                                            Edit
                                                        </a>
                                               
                                                    </form>
                                                    
                                                    


                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p>No appointments available.</p>
                        @endif
                    </div>
                </div>

                <!-- Medical Record -->
                @if ($medicalRecord)
                    <div class="card mb-3">
                        <div class="card-header">Medical Record</div>
                        <div class="card-body">
                            <p><strong>Diagnosis:</strong> {{ $medicalRecord->diagnosis }}</p>
                            <p><strong>Prescription:</strong> {{ $medicalRecord->prescription }}</p>
                            <p><strong>Treatment:</strong> {{ $medicalRecord->treatment }}</p>
                            <p><strong>Diagnosis Date:</strong>
                                {{ \Carbon\Carbon::parse($medicalRecord->diagnosis_date)->format('Y-m-d') }}</p>
                            <p><strong>Record Date:</strong>
                                {{ \Carbon\Carbon::parse($medicalRecord->record_date)->format('Y-m-d') }}</p>
                            <p><strong>Follow Up:</strong> {{ $medicalRecord->follow_up }}</p>
                            @if($medicalRecord->image)
                            
                            <img src="{{ asset('images/' . $medicalRecord->image) }}" alt="Medical Record Image" style="max-width: 300px;">
                        @else
                            <p>No image available.</p>
                        @endif

                    

                            <p><strong>Last Updated:</strong> {{ $medicalRecord->updated_at->format('Y-m-d') }}</p>
                        </div>
                    </div>
                @endif


            </div>
            <!-- End of Account Content -->

        </div>
        <!-- Content End -->

    </div>

    @include('user-account.appp.footer')

    <!-- SweetAlert Success Message -->
    @if (session('success'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif

</body>

</html>
