<!-- resources/views/superAdmin/doctors/edit.blade.php -->

@include('superAdmin.ap.header')
    <div class="container">
        <h1>Edit Doctor</h1>

        <form action="{{ route('superAdmin.doctors.update', $doctor->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $doctor->name }}" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" class="form-control" value="{{ $doctor->phone }}">
            </div>

            <div class="form-group">
                <label for="user_id">User</label>
                <select name="user_id" class="form-control" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $doctor->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="clinic_id">Clinic</label>
                <select name="clinic_id" class="form-control" required>
                    @foreach($clinics as $clinic)
                        <option value="{{ $clinic->id }}" {{ $doctor->clinic_id == $clinic->id ? 'selected' : '' }}>{{ $clinic->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="department_id">Department</label>
                <select name="department_id" class="form-control" required>
                    @foreach($departments as $department)
                        <option value="{{ $department->id }}" {{ $doctor->department_id == $department->id ? 'selected' : '' }}>{{ $department->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="specialty">Specialty</label>
                <input type="text" name="specialty" class="form-control" value="{{ $doctor->specialty }}" required>
            </div>

            <div class="form-group">
                <label for="available_from">Available From</label>
                <input type="time" name="available_from" class="form-control" value="{{ $doctor->available_from }}" required>
            </div>

            <div class="form-group">
                <label for="available_to">Available To</label>
                <input type="time" name="available_to" class="form-control" value="{{ $doctor->available_to }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control">{{ $doctor->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="skills">Skills</label>
                <textarea name="skills" class="form-control">{{ $doctor->skills }}</textarea>
            </div>

            <div class="form-group">
                <label for="educational_qualifications">Educational Qualifications</label>
                <textarea name="educational_qualifications" class="form-control">{{ $doctor->educational_qualifications }}</textarea>
            </div>

            <div class="form-group">
                <label for="image">Profile Picture</label>
                <input type="file" name="image" class="form-control">
                @if($doctor->image)
                    <img src="{{ asset('uploads/doctors/' . $doctor->image) }}" alt="Profile Picture" width="100">
                @endif
            </div>

            <div class="form-group">
                <label for="experience">Experience (Years)</label>
                <input type="number" name="experience" class="form-control" value="{{ $doctor->experience }}">
            </div>

            <div class="form-group">
                <label for="working_days">Working Days</label>
                <input type="text" name="working_days" class="form-control" value="{{ json_encode($doctor->working_days) }}">
            </div>

            <button type="submit" class="btn btn-success">Update Doctor</button>
        </form>
    </div>
@include('superAdmin.ap.footer')