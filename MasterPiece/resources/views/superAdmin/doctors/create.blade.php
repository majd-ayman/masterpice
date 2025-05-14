@include('superAdmin.ap.header')

<div class="container">
    <h1 style="font-weight: 500;">Add New Doctor</h1>

    <form action="{{ route('superAdmin.doctors.store') }}" method="POST">
        @csrf
    
        <!-- Name -->
        <div class="form-group">
            <label for="name">Doctor Name</label>
            <input type="text" name="name" class="form-control" required>
            @error('name') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
    
        <!-- Email -->
        <div class="form-group">
            <label for="email">Doctor Email</label>
            <input type="email" name="email" class="form-control" required>
            @error('email') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
    
        <!-- Password -->
        <div class="form-group">
            <label for="password">Doctor Password</label>
            <input type="password" name="password" class="form-control" required>
            @error('password') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
    
        <!-- Clinic -->
        <div class="form-group">
            <label for="clinic_id">Clinic</label>
            <select name="clinic_id" class="form-control" required>
                @foreach($clinics as $clinic)
                    <option value="{{ $clinic->id }}">{{ $clinic->name }}</option>
                @endforeach
            </select>
            @error('clinic_id') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
    
        <!-- Department -->
        <div class="form-group">
            <label for="department_id">Department</label>
            <select name="department_id" class="form-control" required>
                @foreach($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                @endforeach
            </select>
            @error('department_id') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
    
        <!-- Phone -->
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" class="form-control" required>
            @error('phone') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
    
        <!-- Specialty -->
        <div class="form-group">
            <label for="specialty">Specialty</label>
            <input type="text" name="specialty" class="form-control" required>
            @error('specialty') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
    
        <!-- Available From -->
        <div class="form-group">
            <label for="available_from">Available From</label>
            <input type="time" name="available_from" class="form-control" required>
            @error('available_from') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
    
        <!-- Available To -->
        <div class="form-group">
            <label for="available_to">Available To</label>
            <input type="time" name="available_to" class="form-control" required>
            @error('available_to') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        
        <div class="form-group">
            <label for="image">Doctor Image</label>
            <input type="file" name="image" class="form-control">
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-primary mt-3 mp-4">Add Doctor</button>
    </form>
    
    
</div>

@include('superAdmin.ap.footer')
