@include('admin.app.header')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('success'))

    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '{{ session('success') }}',
            confirmButtonColor: '#3085d6'
        });
    </script>
@endif

@if (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ session('error') }}',
            confirmButtonColor: '#d33'
        });
    </script>
@endif

<div class="container-fluid pt-4 px-4">

    <h2 class="mb-4">Appointment Management</h2>

    <!-- Filters -->
    <form method="GET" class="row g-5 mb-4 ">
        <div class="col-md-3">
            <input type="date" name="date" class="form-control form-control-lg" value="{{ request('date') }}">
        </div>
        <div class="col-md-3">
            <select name="clinic_id" class="form-control form-control-lg ">
                <option value="">-- Select the clinic --</option>
                @foreach ($clinics as $clinic)
                    <option value="{{ $clinic->id }}" {{ request('clinic_id') == $clinic->id ? 'selected' : '' }}>
                        {{ $clinic->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <select name="doctor_id" class="form-control form-control-lg">
                <option value="">-- Choose a doctor --</option>
                @foreach ($doctors as $doctor)
                    <option value="{{ $doctor->id }}" {{ request('doctor_id') == $doctor->id ? 'selected' : '' }}>
                        {{ $doctor->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <button type="submit" class="btn btn-primary w-100 btn-lg">Search</button>
        </div>
    </form>

    <!-- Appointments Table -->
    <div class="bg-light text-center rounded p-4">
        <div class="table-responsive mp-5">
            <table class="table text-start align-middle table-bordered  mb-0 ">
                <thead>
                    <tr class="text-dark">
                        <th>Patient</th>
                        <th>Phone</th>
                        <th>Doctor</th>
                        <th>Clinic</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Status</th>
                        <th>Notes</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($appointments as $appointment)
                        <tr>
                            <td>{{ $appointment->user->name ?? 'N/A' }}</td>
                            <td>{{ $appointment->user->phone ?? 'N/A' }}</td>
                            <td>{{ $appointment->doctor->name ?? 'N/A' }}</td>
                            <td>{{ $appointment->clinic->name ?? 'N/A' }}</td>
                            <td>{{ $appointment->appointment_date }}</td>
                            <td>{{ $appointment->appointment_time }}</td>

                            <!-- Status Form -->
                            <td>
                                <form action="{{ route('appointments.updateStatus', $appointment->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" class="form-control form-control-sm"
                                        onchange="this.form.submit()">
                                        <option value="completed"
                                            {{ $appointment->status == 'completed' ? 'selected' : '' }}>Completed
                                        </option>
                                        <option value="canceled"
                                            {{ $appointment->status == 'canceled' ? 'selected' : '' }}>Canceled
                                        </option>
                                    </select>
                                </form>
                            </td>

                            <td>{{ $appointment->notes ?? 'No notes available' }}</td>

                            <!-- Actions -->
                            <td style="display: flex; gap: 5px; justify-content: center; align-items: center;">
                                <a href="{{ route('appointments.edit', $appointment->id) }}"
                                    class="btn btn-sm btn-warning" title="Edit">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <!-- - - Delete ------->
                                {{-- <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST"
                                    class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form> --}}

                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">No appointments found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            {{ $appointments->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
{{-- <script>
    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault(); 

            Swal.fire({
                title: 'Are you sure?',
                text: "You can't undo a deletion!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script> --}}


@include('admin.app.footer')
