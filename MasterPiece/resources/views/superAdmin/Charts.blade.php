@include('superAdmin.ap.header')
{{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>




<div class="container mt-5">
    <h2 class="mb-4 text-center">Super Admin Dashboard</h2>
    <div class="row">

        {{-- Users Count --}}
        {{-- <div class="col-md-4 mb-4">
            <div class="card text-white bg-primary shadow">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Users</h5>
                        <p class="card-text fs-4">{{ $usersCount }}</p>
                    </div>
                    <a href="{{ route('superadmin.users.index') }}" class="text-white">
                        <i class="fas fa-users fa-2x"></i>
                    </a>
                </div>
            </div>
        </div> --}}

        {{-- Doctors Count --}}
    

        {{-- Clinics Count --}}
        {{-- <div class="col-md-4 mb-4">
            <div class="card text-white bg-info shadow">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Clinics</h5>
                        <p class="card-text fs-4">{{ $clinicsCount }}</p>
                    </div>
                    <a href="{{ route('superadmin.clinics.index') }}" class="text-white">
                        <i class="fas fa-clinic-medical fa-2x"></i>
                    </a>
                </div>
            </div>
        </div> --}}

        {{-- Completed Appointments --}}
        {{-- <div class="col-md-4 mb-4">
            <div class="card text-white bg-warning shadow">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Completed Appointments</h5>
                        <p class="card-text fs-4">{{ $completedAppointmentsCount }}</p>
                    </div>
                    <a href="{{ route('superadmin.appointments.completed') }}" class="text-white">
                        <i class="fas fa-check-circle fa-2x"></i>
                    </a>
                </div>
            </div>
        </div> --}}

        {{-- Canceled Appointments --}}
        {{-- <div class="col-md-4 mb-4">
            <div class="card text-white bg-danger shadow">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Canceled Appointments</h5>
                        <p class="card-text fs-4">{{ $canceledAppointmentsCount }}</p>
                    </div>
                    <a href="{{ route('superadmin.appointments.canceled') }}" class="text-white">
                        <i class="fas fa-times-circle fa-2x"></i>
                    </a>
                </div>
            </div>
        </div>  --}}

        {{-- Contact Messages --}}
        {{-- <div class="col-md-4 mb-4">
            <div class="card text-white bg-secondary shadow">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Contact Messages</h5>
                        <p class="card-text fs-4">{{ $contactMessagesCount }}</p>
                    </div>
                    <a href="{{ route('superadmin.contacts.index') }}" class="text-white">
                        <i class="fas fa-envelope fa-2x"></i>
                    </a>
                </div>
            </div>
        </div> --}}

    {{-- </div>
</div> --}}

@include('superAdmin.ap.footer')
