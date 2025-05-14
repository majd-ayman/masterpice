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
                        <th>Patient</th>
                        <th>Time</th>
                        <th>Status</th>
                        <th>Clinic</th>
                        <th>Medical Histories
                            {{-- <a href="{{ route('doctor.medical_history.show', $history->user_id) }}" class="btn btn-primary mt-2">
                                عرض السجل الكامل
                            </a> --}}
                        <th>Actions</th>

                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($todayAppointments as $appointment)
                        <tr>
                            <td>{{ $appointment->user->name ?? 'N/A' }}</td>
                            <td>{{ $appointment->appointment_time }}</td>
                            <td>{{ $appointment->status }}</td>
                            <td>{{ $appointment->clinic->name }}</td>
                            <td>
                                @if ($appointment->status === 'completed' && $appointment->user->medicalHistory)
                                    <a href="{{ route('doctor.medical_history.show', $appointment->user->id) }}"
                                        class="btn btn-sm btn-info">
                                        View log </a>
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
                        <td>{{ $appointment->status }}</td>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>




    <div class="col-md-12 mt-4">
        <h4 class="mb-4">Reviews</h4>
        @foreach ($doctorReviews as $review)
            <div class="feedback-item p-4 mb-3 border rounded shadow-sm">
                <!-- Display the user's name who gave the review -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    {{-- <strong class="h5">{{ $review->user->name }}</strong> --}}
                    <div class="star-rating">
                        <!-- Display the rating using stars -->
                        @for ($i = 1; $i <= 5; $i++)
                            <i class="fas fa-star {{ $i <= $review->rating ? 'text-warning' : 'text-muted' }}"></i>
                        @endfor
                    </div>
                </div>
                <!-- Display the comment made by the user -->
                <p class="mb-2">{{ $review->comment }}</p>
                <small class="text-muted">Reviewed on: {{ $review->created_at->format('M d, Y') }}</small>
            </div>
        @endforeach
    </div>

</div>
@include('doctor.apps.footer')
