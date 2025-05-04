




<div class="container mt-5">
    <h3>Add Medical Record for {{ $appointment->user->name ?? 'Patient' }}</h3>

    <form action="{{ route('doctor.medical-records.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="user_id" value="{{ $appointment->user_id }}">
        <input type="hidden" name="doctor_id" value="{{ $appointment->doctor_id }}">
        <input type="hidden" name="appointment_id" value="{{ $appointment->id }}">

        <div class="form-group">
            <label for="diagnosis">Diagnosis</label>
            <textarea name="diagnosis" class="form-control" rows="3" required></textarea>
        </div>

        <div class="form-group">
            <label for="treatment">Treatment</label>
            <textarea name="treatment" class="form-control" rows="3"></textarea>
        </div>

        <div class="form-group">
            <label for="prescription">Prescription</label>
            <textarea name="prescription" class="form-control" rows="3"></textarea>
        </div>

        <div class="form-group">
            <label for="record_date">Record Date</label>
            <input type="date" name="record_date" class="form-control" value="{{ date('Y-m-d') }}" required>
        </div>

        <div class="form-group">
            <label for="diagnosis_date">Diagnosis Date</label>
            <input type="date" name="diagnosis_date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="follow_up">Follow Up Date</label>
            <input type="date" name="follow_up" class="form-control">
        </div>

        <div class="form-group">
            <label for="image">Attach Image (Optional)</label>
            <input type="file" name="image" class="form-control-file">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Save Record</button>
        <a href="{{ route('doctor.dashboard') }}" class="btn btn-secondary mt-3">Cancel</a>
    </form>
</div>