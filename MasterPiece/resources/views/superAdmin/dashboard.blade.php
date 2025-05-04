@include('superAdmin.ap.header')

<div class="container text-center my-4">
    <!-- عنوان الترحيب -->
    <h1>Welcome to the Super Admin Dashboard</h1>
</div>

<!-- Dashboard Content -->
<div class="container-fluid pt-4 px-4">
    <!-- ترتيب الكاردات الصغيرة بجانب بعضها -->
    <div class="row g-4 justify-content-center">
        <!-- Today's Appointments -->
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-3">
                <i class="fa fa-calendar-check fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Today's Appointments</p>
                    {{-- <h6 class="mb-0">{{ $appointmentsToday }}</h6> --}}
                </div>
            </div>
        </div>

        <!-- Available Doctors -->
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-3">
                <i class="fa fa-user-md fa-3x text-info"></i>
                <div class="ms-3">
                    <p class="mb-2">Available Doctors</p>
                    {{-- <h6 class="mb-0">{{ $availableDoctors }}</h6> --}}
                </div>
            </div>
        </div>

        <!-- Total Clinics -->
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-3">
                <i class="fa fa-clinic-medical fa-3x text-info"></i>
                <div class="ms-3">
                    <p class="mb-2">Total Clinics</p>
                    {{-- <h6 class="mb-0">{{ $clinicsCount }}</h6> --}}
                </div>
            </div>
        </div>

        <!-- Total Patients -->
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-3">
                <i class="fa fa-users fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Total Patients</p>
                    {{-- <h6 class="mb-0">{{ $totalPatients }}</h6> --}}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Appointments Table (If needed) -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">All Reservations</h6>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th scope="col">Patient's name</th>
                        <th scope="col">Clinic</th>
                        <th scope="col">Date</th>
                        <th scope="col">Time</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                     @foreach ($appointments as $appointment)
                        <tr>
                            <td>{{ $appointment->user->name ?? 'N/A' }}</td>
                            <td>{{ $appointment->clinic->name ?? 'N/A' }}</td>
                            <td>{{ $appointment->appointment_date }}</td>
                            <td>{{ $appointment->appointment_time }}</td>
                            <td>{{ $appointment->status }}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-primary" title="Details">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ route('appointments.edit', $appointment->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Delete" onclick="return confirm('Are you sure you want to delete this appointment?');">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach 
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('superAdmin.ap.footer')
