@include('admin.app.header')

<div class="container mt-5">
    <h3>Edit Appointment</h3>
    <form action="{{ route('appointments.update', $appointment->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Patient Name</label>
            <input type="text" class="form-control" value="{{ $appointment->user->name }}" disabled>
        </div>

        <div class="mb-3">
            <label>Phone Number</label>
            <input type="text" class="form-control" value="{{ $appointment->user->phone }}" disabled>
        </div>

        <div class="mb-3">
            <label>Clinic</label>
            <select name="clinic_id" class="form-control" disabled>
                @foreach ($clinics as $clinic)
                    <option value="{{ $clinic->id }}" {{ $appointment->clinic_id == $clinic->id ? 'selected' : '' }}>
                        {{ $clinic->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Doctor</label>
            <select name="doctor_id" class="form-control" disabled>
                @foreach ($doctors as $doctor)
                    <option value="{{ $doctor->id }}" {{ $appointment->doctor_id == $doctor->id ? 'selected' : '' }}>
                        {{ $doctor->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Date</label>
            <input type="date" id="appointment_date" name="appointment_date" class="form-control"
                value="{{ $appointment->appointment_date }}">
        </div>
        <div class="mb-3">
            <label for="appointment_time">الوقت</label>
            <select name="appointment_time" id="time_slots" class="form-control" required>
                <option value="{{ $appointment->appointment_time }}">{{ $appointment->appointment_time }}</option>
            </select>
        </div>




        <div class="mb-3">
            <label>Notes</label>
            <textarea name="notes" class="form-control">{{ $appointment->notes }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Appointment</button>
    </form>
</div>

<script>
    console.log(document.getElementById('appointment_date'));
    document.getElementById('appointment_date').addEventListener('change', function() {
        fetchAvailableTimes();
    });

    function fetchAvailableTimes() {

        var doctorId = {{ $doctor->id }};
        var appointmentDate = document.getElementById('appointment_date').value;

        if (doctorId && appointmentDate) {
            fetch(`/get-available-times/${doctorId}/${appointmentDate}`)
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    var timeSlotsDropdown = document.getElementById('time_slots');
                    timeSlotsDropdown.innerHTML = '<option value="">Select Time</option>';

                    if (data.length > 0) {
                        data.forEach(function(time) {
                            var option = document.createElement('option');
                            option.value = time;
                            option.textContent = time;
                            timeSlotsDropdown.appendChild(option);
                        });
                    } else {
                        timeSlotsDropdown.innerHTML = '<option value="">No available times</option>';
                    }
                })
                .catch(error => {
                    console.error('Error fetching available times:', error);
                    alert('An error occurred while fetching available times');
                });
        }
    }
</script>
@include('admin.app.footer')
