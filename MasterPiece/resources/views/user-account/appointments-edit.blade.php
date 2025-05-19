<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('images/favicon.ico') }}" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries -->
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- CSS Files -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styleadmin.css') }}" rel="stylesheet">

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>





    <style>
        .nav-link {
            color: black;
        }

        .nav-link i {
            color: red;
        }

        .container {
            margin-top: 40px;
        }
    </style>
</head>
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
            
                  
            
                    <a href="{{ route('user-account.editProfile') }}"
                       class="nav-item nav-link {{ request()->routeIs('user-account.editProfile') ? 'active' : '' }}">
                        <i class="fa fa-edit me-2"></i> Edit Profile
                    </a>
            
                    <a href="{{ route('user-account.medicalHistory') }}"
                       class="nav-item nav-link {{ request()->routeIs('user-account.medicalHistory') ? 'active' : '' }}">
                        <i class="fa fa-file-medical me-2"></i> Medical Histories

                    </a>
            
                    <a href="{{ route('home') }}" class="nav-item nav-link">
                        <i class="fa fa-sign-out-alt me-2"></i> Back
                    </a>
                </li>
            </ul>
            
        </nav>
    </div>




    <div class="content">
 <div class="container mt-5">
            <div class="text-center mb-4">
                <h2 style="font-weight: bold; padding:30px">Edit Appointment</h2>
            </div>

@if (session('error')) 
<script> 
Swal.fire({ 
icon: 'error', 
title: 'Error', 
text: '{{ session('error') }}' 
}); 
</script> 
@endif
        <form id="appointmentForm" action="{{ route('myappointments.update', $appointment->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Doctor Name</label>
                <input type="text" class="form-control" value="{{ $appointment->doctor->name }}" disabled>
            </div>

            <div class="mb-3">
                <label class="form-label">Patient Name</label>
                <input type="text" class="form-control" value="{{ $appointment->user->name }}" disabled>
            </div>

            <div class="mb-3">
                <label class="form-label">Clinic Name</label>
                <input type="text" class="form-control" value="{{ $appointment->clinic->name }}" disabled>
            </div>

            <div class="mb-3">
                <label class="form-label">Appointment Date</label>
                <input type="date" class="form-control" id="appointment_date" name="appointment_date"
                    value="{{ $appointment->appointment_date }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Appointment Time</label>
                <input type="time" class="form-control" id="appointment_time" name="appointment_time"
                    value="{{ $appointment->appointment_time }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Notes</label>
                <textarea class="form-control" id="notes" name="notes">{{ $appointment->notes }}</textarea>
            </div>

            <!-- Hidden input to store reason -->
            <input type="hidden" name="change_reason" id="change_reason">

            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>

    </div>

    <script>
        document.getElementById('appointmentForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const newDate = new Date(document.getElementById('appointment_date').value);
            const today = new Date();
            const diffTime = newDate - today;
            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
            if (diffDays < 2) {
                Swal.fire({
                    icon: 'error',
                    title: 'Warning!',
                    text: 'You can only edit an appointment at least two days before its date.'
                });
                return;
            }

            Swal.fire({
                title: 'Reason for change of appointment?',
                input: 'radio',
                inputOptions: {
                    'Emergency': 'Emergency',
                    'Error in previous booking': 'Error in previous booking',
                    'Change in schedule': 'Change in schedule',
                    'Other reason': 'Other reason'
                },
                inputValidator: (value) => {
                    if (!value) {
                        return 'Please select a reason for change';
                    }
                },
                showCancelButton: true,
                confirmButtonText: 'Continue',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('change_reason').value = result.value;
                    e.target.submit();
                }
            });
        });
    </script>
</body>

</html>
