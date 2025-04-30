@include('doctor.apps.header')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm rounded-3">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Edit Profile</h4>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success text-center">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('doctor.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" name="name" id="name" class="form-control"
                                   value="{{ old('name', $doctor->name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="text" name="phone" id="phone" class="form-control"
                                   value="{{ old('phone', $doctor->phone) }}">
                        </div>

                        <div class="mb-3">
                            <label for="specialty" class="form-label">Specialty</label>
                            <input type="text" name="specialty" id="specialty" class="form-control"
                                   value="{{ old('specialty', $doctor->specialty) }}">
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control">{{ old('description', $doctor->description) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="skills" class="form-label">Skills</label>
                            <textarea name="skills" id="skills" class="form-control">{{ old('skills', $doctor->skills) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="educational_qualifications" class="form-label">Educational Qualifications</label>
                            <textarea name="educational_qualifications" id="educational_qualifications" class="form-control">{{ old('educational_qualifications', $doctor->educational_qualifications) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="experience" class="form-label">Experience</label>
                            <textarea name="experience" id="experience" class="form-control">{{ old('experience', $doctor->experience) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="working_days" class="form-label">Working Days</label>
                            <input type="text" name="working_days" id="working_days" class="form-control"
                                   value="{{ old('working_days', $doctor->working_days) }}">
                        </div>

                        <div class="mb-3">
                            <label for="expertise_area" class="form-label">Expertise Area</label>
                            <input type="text" name="expertise_area" id="expertise_area" class="form-control"
                                   value="{{ old('expertise_area', $doctor->expertise_area) }}">
                        </div>

                        <div class="mb-3">
                            <label for="profile_picture" class="form-label">Profile Picture</label>
                            <input type="file" name="profile_picture" id="profile_picture" class="form-control" accept="image/*">
                            
                            @if($doctor->profile_picture)
                                <div class="mt-2">
                                    <img src="{{ asset('uploads/doctors/' . $doctor->profile_picture) }}" alt="Profile Picture" width="120" class="rounded">
                                </div>
                            @endif
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success px-4">Update Profile</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

@include('doctor.apps.footer')
