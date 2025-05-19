@include('doctor.apps.header')

<div class="container mt-4">

    <!-- Quick Stats Cards (New Style) -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-5">
            <!-- Weekly Patients -->
            <div class="col-sm-6 col-xl-4">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fas fa-user-injured fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Weekly Patients</p>
                        <h6 class="mb-0">{{ $weeklyPatientCount }}</h6>
                    </div>
                </div>
            </div>

            <!-- Confirmed Appointments -->
            <div class="col-sm-6 col-xl-4">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fas fa-check-circle fa-3x text-success"></i>
                    <div class="ms-3">
                        <p class="mb-2">Confirmed Appointments</p>
                        <h6 class="mb-0">{{ $confirmedAppointmentsCount }}</h6>
                    </div>
                </div>
            </div>

            <!-- Canceled Appointments -->
            <div class="col-sm-6 col-xl-4">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fas fa-times-circle fa-3x text-danger"></i>
                    <div class="ms-3">
                        <p class="mb-2">Canceled Appointments</p>
                        <h6 class="mb-0">{{ $canceledAppointmentsCount }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Today's Appointments -->
    <div class="row mb-4 mt-5">
        <div class="col-md-11">
            <h4>Today's Appointments</h4>
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Patient Name</th>
                        <th>Time</th>
                        <th>Status</th>
                        <th>Clinic</th>
                        <th>Medical Histories</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($todayAppointments as $appointment)
                        <tr>
                            <td>{{ $appointment->user->name ?? 'N/A' }}</td>
                            <td>{{ $appointment->appointment_time }}</td>
    <td>
                                @if ($appointment->status === 'scheduled')
                                    <form action="{{ route('doctor.appointments.markCompleted', $appointment->id) }}"
                                        method="POST" style="display:inline;">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-sm btn-success">Mark as Completed</button>
                                    </form>
                                @elseif ($appointment->status === 'completed')
                                    <span class="badge bg-success">Completed</span>
                                @elseif ($appointment->status === 'canceled')
                                    <span class="badge bg-danger">Canceled</span>
                                @else
                                    <span class="badge bg-secondary">{{ ucfirst($appointment->status) }}</span>
                                @endif
                            </td>                            <td>{{ $appointment->clinic->name ?? 'N/A' }}</td>
                            <td>
                                @if ($appointment->user && $appointment->user->medicalHistories()->exists())
                                    <a href="{{ route('doctor.medical_history.show', $appointment->user->id) }}"
                                        class="btn btn-sm btn-primary">
                                        View Medical Histories
                                    </a>
                                @else
                                    <span class="text-muted">No record</span>
                                @endif

                            </td>
                            <td>
                                <a href="{{ route('doctor.medical-records.create', $appointment->id) }}"
                                    class="btn btn-sm btn-primary">
                                    Add Medical Record
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Upcoming Appointments -->
    <div class="col-md-11 mt-5">
        <h4>Upcoming Appointments</h4>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Patient Name</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($upcomingAppointments as $appointment)
                    <tr>
                        <td>{{ $appointment->user->name ?? 'N/A' }}</td>
                        <td>{{ $appointment->appointment_date }}</td>
                        <td>{{ $appointment->appointment_time }}</td>
                        <td>


                            @if ($appointment->status === 'scheduled')
                                <span class="badge bg-warning">Scheduled</span>
                            @elseif ($appointment->status === 'completed')
                                <span class="badge bg-success">Completed</span>
                            @elseif ($appointment->status === 'canceled')
                                <span class="badge bg-danger">Canceled</span>
                            @else
                                <span class="badge bg-secondary">{{ ucfirst($appointment->status) }}</span>
                            @endif




                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


</div>

@include('doctor.apps.footer')
