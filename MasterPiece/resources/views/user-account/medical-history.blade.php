<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="{{ asset('images/favicon.ico') }}" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styleadmin.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<style>
    .nav-item {
        color: black;
    }

    .nav-item i {
        color: red;
    }
</style>

<body>
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

    <body>
        <div class="content">
            <div class="container mt-5">
                <div class="text-center mb-4">
                    <h2 style="font-weight: bold; padding:30px">Medical Histories</h2>
                </div>
                <div class="card">
                    <div class="card-body">

                        <form action="{{ route('medical-history.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label>Chronic Diseases</label>
                                <textarea name="chronic_diseases" class="form-control"></textarea>
                            </div>

                            <div class="mb-3">
                                <label>Current Medications</label>
                                <textarea name="current_medications" class="form-control"></textarea>
                            </div>

                            <div class="mb-3">
                                <label>Allergies</label>
                                <textarea name="allergies" class="form-control"></textarea>
                            </div>

                            <div class="mb-3">
                                <label>Past Surgeries</label>
                                <textarea name="past_surgeries" class="form-control"></textarea>
                            </div>

                            @if (auth()->user()->gender === 'female')
                                <div class="mb-3">
                                    <label>Are you pregnant?</label>
                                    <select name="is_pregnant" class="form-control">
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            @endif

                            <div class="mb-3">
                                <label>Family History of Diseases</label>
                                <textarea name="family_history" class="form-control"></textarea>
                            </div>

                            <div class="mb-3">
                                <label>Lifestyle (Smoking, Exercise...)</label>
                                <textarea name="lifestyle" class="form-control"></textarea>
                            </div>

                            <div class="mb-3">
                                <label>Mental Health Notes</label>
                                <textarea name="mental_health_notes" class="form-control"></textarea>
                            </div>

                            <div class="mb-3">
                                <label>Additional Notes</label>
                                <textarea name="additional_notes" class="form-control"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Save Record</button>
                        </form>
                    </div>
                </div>
            </div>
            <script>
                @if (session('success'))
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: '{{ session('success') }}',
                        confirmButtonText: 'Okay'
                    });
                @endif
            
                @if (session('error'))
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: '{{ session('error') }}',
                        confirmButtonText: 'Okay'
                    });
                @endif
            </script>
            
    </body>
</html>
