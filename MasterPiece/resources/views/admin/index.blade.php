@include('admin.app.header')
@section('content')
    <div class="container py-4">
        <h2 class="mb-4">Appointment Management</h2>
        <form method="GET" class="row g-3 mb-4">
            <div class="col-md-3">
                <input type="date" name="date" class="form-control" value="{{ request('date') }}">
            </div>
            <div class="col-md-3">
                <select name="clinic_id" class="form-control">
                    <option value="">-- Select the clinic --</option>
                    @foreach ($clinics as $clinic)
                        <option value="{{ $clinic->id }}" {{ request('clinic_id') == $clinic->id ? 'selected' : '' }}>
                            {{ $clinic->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <select name="doctor_id" class="form-control">
                    <option value="">-- Choose a doctor --</option>
                    @foreach ($doctors as $doctor)
                        <option value="{{ $doctor->id }}" {{ request('doctor_id') == $doctor->id ? 'selected' : '' }}>
                            {{ $doctor->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary w-100">Search</button>
            </div>
        </form>




        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Patient</th>
                    <th>Doctor</th>
                    <th>Clinic</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Condition</th>
                    <th>Notes</th>
                </tr>
            </thead>
            <tbody>
                @forelse($appointments as $appointment)
                    <tr>
                        <td>{{ $appointment->user->name ?? '-' }}</td> <!-- اسم المريض -->
                        <td>{{ $appointment->doctor->name ?? '-' }}</td> <!-- اسم الطبيب -->
                        <td>{{ $appointment->clinic->name ?? '-' }}</td> <!-- اسم العيادة -->
                        <td>{{ $appointment->appointment_date }}</td> <!-- تاريخ الموعد -->
                        <td>{{ $appointment->appointment_time }}</td> <!-- وقت الموعد -->
                        <td>{{ $appointment->status ?? '-' }}</td> <!-- حالة الموعد -->
                        <td>{{ $appointment->notes ?? '-' }}</td> <!-- ملاحظات الموعد -->
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No appointments</td>
                        <!-- تغيير عدد الأعمدة هنا 7 لأنك أضفت عمود "ملاحظات" -->
                    </tr>
                @endforelse
            </tbody>
        </table>


        {{ $appointments->links() }}
    </div>
@endsection









<!-- Sale & Revenue Start -->

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <!-- عدد المواعيد اليوم -->
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-calendar-check fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Today's patients</p>
                    <h6 class="mb-0">{{ $appointmentsToday }}</h6>
                </div>
            </div>
        </div>

        <!-- عدد المرضى المنتظرين -->
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-user-clock fa-3x text-warning"></i>
                <div class="ms-3">
                    <p class="mb-2">Waiting </p>
                    <h6 class="mb-0">{{ $waitingPatients }}</h6>
                </div>
            </div>
        </div>

        <!-- المرضى الجدد اليوم -->
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-user-plus fa-3x text-success"></i>
                <div class="ms-3">
                    <p class="mb-2">New patients </p>
                    <h6 class="mb-0">{{ $newPatientsToday }}</h6>
                </div>
            </div>
        </div>

        <!-- الأطباء المتاحين -->
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-user-md fa-3x text-info"></i>
                <div class="ms-3">
                    <p class="mb-2">Available Doctors</p>
                    <h6 class="mb-0">{{ $availableDoctors }}</h6>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- ----------------------------------------------------------------------- هوووووووووووووووووون شغليييييييييي------------- ------------------------------------ --}}
<!-- Start of appointments -->
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

                        {{-- <th scope="col">Invoice</th> --}}
                        {{-- <th scope="col">Status</th> --}}
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                        <th scope="col">Phone number</th>


                    </tr>
                </thead>
                <tbody>
                    @foreach ($appointments as $appointment)
                        <tr>
                            <td>{{ $appointment->user->name ?? 'N/A' }}</td>
                            <td>{{ $appointment->clinic->name ?? 'N/A' }}</td>
                            <td>{{ $appointment->appointment_date }}</td>
                            <td>{{ $appointment->appointment_time }}</td>
                            {{-- <td>{{ $appointment->status }}</td> --}}

                            <td>
                                <form action="{{ route('appointments.updateStatus', $appointment->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT') <!-- استخدم PUT لتحديث البيانات -->
                                    <select name="status" class="form-control" onchange="this.form.submit()">
                                        <option value="pending"
                                            {{ $appointment->status == 'pending' ? 'selected' : '' }}>
                                            Pending</option>
                                        <option value="completed"
                                            {{ $appointment->status == 'completed' ? 'selected' : '' }}>
                                            Completed</option>
                                        <option value="canceled"
                                            {{ $appointment->status == 'canceled' ? 'selected' : '' }}>
                                            Canceled</option>
                                    </select>
                                </form>
                            </td>
                            <td>
                                <a href="#" class="btn btn-sm btn-primary" title="Details">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ route('appointments.edit', $appointment->id) }}"
                                    class="btn btn-sm btn-warning" title="Edit">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Delete"
                                        onclick="return confirm('Are you sure you want to delete this appointment?');">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>

                            <td>{{ $appointment->user->phone ?? 'N/A' }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>

@include('admin.app.footer')
