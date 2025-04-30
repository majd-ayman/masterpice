@include('superAdmin.ap.header')

<div class="container">
    <h1>Add New Doctor</h1>

    <form action="{{ route('superAdmin.doctors.store') }}" method="POST">
        @csrf
    
        <div class="form-group">
            <label for="name">Doctor Name</label>
            <input type="text" name="name" class="form-control" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    
        <div class="form-group">
            <label for="email">Doctor Email</label>
            <input type="email" name="email" class="form-control" required>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    
        <div class="form-group">
            <label for="password">Doctor Password</label>
            <input type="password" name="password" class="form-control" required>
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    
        <div class="form-group">
            <label for="clinic_id">Clinic</label>
            <select name="clinic_id" class="form-control" required>
                @foreach($clinics as $clinic)
                    <option value="{{ $clinic->id }}">{{ $clinic->name }}</option>
                @endforeach
            </select>
            @error('clinic_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        
    
        <div class="form-group">
            <label for="department_id">Department</label>
            <select name="department_id" class="form-control" required>
                @foreach($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                @endforeach
            </select>
            @error('department_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    
        <button type="submit" class="btn btn-success">Add Doctor</button>
    </form>
    
</div>

@include('superAdmin.ap.footer')
