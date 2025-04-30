@include('admin.app.header')

<div class="container mt-5">
    <h3>Edit Appointment</h3>
    <form action="{{ route('appointments.update', $appointment->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- اسم المريض (غير قابل للتعديل) --}}
        <div class="mb-3">
            <label>Patient Name</label>
            <input type="text" class="form-control" value="{{ $appointment->user->name }}" disabled>
        </div>

        {{-- رقم التلفون (غير قابل للتعديل) --}}
        <div class="mb-3">
            <label>Phone Number</label>
            <input type="text" class="form-control" value="{{ $appointment->user->phone }}" disabled>
        </div>

        {{-- العيادة --}}
        <div class="mb-3">
            <label>Clinic</label>
            <select name="clinic_id" class="form-control">
                @foreach($clinics as $clinic)
                    <option value="{{ $clinic->id }}" {{ $appointment->clinic_id == $clinic->id ? 'selected' : '' }}>
                        {{ $clinic->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- الطبيب --}}
        <div class="mb-3">
            <label>Doctor</label>
            <select name="doctor_id" class="form-control">
                @foreach($doctors as $doctor)
                    <option value="{{ $doctor->id }}" {{ $appointment->doctor_id == $doctor->id ? 'selected' : '' }}>
                        {{ $doctor->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- التاريخ --}}
        <div class="mb-3">
            <label>Date</label>
            <input type="date" name="appointment_date" class="form-control" value="{{ $appointment->appointment_date }}">
        </div>

        {{-- الوقت --}}
        <div class="mb-3">
            <label>Time</label>
            <input type="time" name="appointment_time" class="form-control" value="{{ $appointment->appointment_time }}">
        </div>

        {{-- الحالة --}}
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="pending" {{ $appointment->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="completed" {{ $appointment->status == 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="canceled" {{ $appointment->status == 'canceled' ? 'selected' : '' }}>Canceled</option>
            </select>
        </div>

        {{-- الملاحظات --}}
        <div class="mb-3">
            <label>Notes</label>
            <textarea name="notes" class="form-control">{{ $appointment->notes }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Update Appointment</button>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Back</a>
    </form>
</div>

@include('admin.app.footer')