

@include('superAdmin.ap.header')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- IcoFont CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icofont/1.0.1/icofont.css" />

<body class="d-flex flex-column min-vh-100">


<main class="flex-grow-1">
    <div class="container mt-4">
        <h1 style="font-weight: 500;">Add New Clinic</h1>

        <form action="{{ route('superAdmin.clinics.store') }}" method="POST" id="clinicForm">
            @csrf

            <div class="form-group mb-3">
                <label for="name">Clinic Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="contact_number">Contact Number</label>
                <input type="text" name="contact_number" class="form-control" value="{{ old('contact_number') }}" required>
                @error('contact_number')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="facilities">Facilities</label>
                <textarea name="facilities" class="form-control" required>{{ old('facilities') }}</textarea>
                @error('facilities')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="icon">Icon</label>
                <select name="icon" class="form-control" required>
                    <option value="">-- Select Icon --</option>
                    <option value="icofont-heartbeat" {{ old('icon') == 'icofont-heartbeat' ? 'selected' : '' }}>Heartbeat</option>
                    <option value="icofont-tooth" {{ old('icon') == 'icofont-tooth' ? 'selected' : '' }}>Tooth</option>
                    <option value="icofont-stethoscope" {{ old('icon') == 'icofont-stethoscope' ? 'selected' : '' }}>Stethoscope</option>
                    <option value="icofont-brain-alt" {{ old('icon') == 'icofont-brain-alt' ? 'selected' : '' }}>Brain</option>
                    <option value="icofont-injection-syringe" {{ old('icon') == 'icofont-injection-syringe' ? 'selected' : '' }}>Injection Syringe</option>
                    <option value="icofont-hospital" {{ old('icon') == 'icofont-hospital' ? 'selected' : '' }}>Hospital</option>
                    <option value="icofont-pills" {{ old('icon') == 'icofont-pills' ? 'selected' : '' }}>Pills</option>
                    <option value="icofont-nurse-alt" {{ old('icon') == 'icofont-nurse-alt' ? 'selected' : '' }}>Nurse</option>
                    <option value="icofont-xray" {{ old('icon') == 'icofont-xray' ? 'selected' : '' }}>X-ray</option>
                    <option value="icofont-eye-alt" {{ old('icon') == 'icofont-eye-alt' ? 'selected' : '' }}>Eye</option>
                    <option value="icofont-laboratory" {{ old('icon') == 'icofont-laboratory' ? 'selected' : '' }}>Laboratory</option>
                </select>
                @error('icon')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" required>{{ old('description') }}</textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary mt-2 mb-5">Add Clinic</button>
        </form>
    </div>
</main>

@include('superAdmin.ap.footer')

<script>
    document.getElementById('clinicForm').addEventListener('submit', function(e) {
        const name = document.querySelector('[name="name"]').value.trim();
        const contactNumber = document.querySelector('[name="contact_number"]').value.trim();
        const facilities = document.querySelector('[name="facilities"]').value.trim();
        const icon = document.querySelector('[name="icon"]').value.trim();
        const description = document.querySelector('[name="description"]').value.trim();

        const arabicRegex = /[\u0600-\u06FF]/;
        const specialCharRegex = /[^a-zA-Z0-9\s]/;
        const phoneRegex = /^(078|079|077)\d{7}$/;

        // Check for empty fields
        if (!name || !contactNumber || !facilities || !icon || !description) {
            alert('Please fill in all the required fields.');
            e.preventDefault();
            return;
        }

        // Validate name
        if (arabicRegex.test(name) || specialCharRegex.test(name)) {
            alert('Clinic Name must not contain Arabic letters or special characters.');
            e.preventDefault();
            return;
        }

        // Validate contact number
        if (!phoneRegex.test(contactNumber)) {
            alert('Contact Number must be 10 digits and start with 078, 079, or 077.');
            e.preventDefault();
            return;
        }

        // Validate facilities
        if (arabicRegex.test(facilities) || specialCharRegex.test(facilities)) {
            alert('Facilities must not contain Arabic letters or special characters.');
            e.preventDefault();
            return;
        }

        // Validate description
        if (arabicRegex.test(description) || specialCharRegex.test(description)) {
            alert('Description must not contain Arabic letters or special characters.');
            e.preventDefault();
            return;
        }
    });
</script>



</body>
