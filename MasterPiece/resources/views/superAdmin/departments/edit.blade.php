@include('superAdmin.ap.header')

<div class="container mt-5">
    <h1>Edit Department</h1>

    <form action="{{ route('superAdmin.departments.update', $department->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mt-3">
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ $department->name }}" class="form-control" required>
        </div>

        <div class="form-group mt-3">
            <label for="description">Description</label>
            <textarea name="description" class="form-control">{{ $department->description }}</textarea>
        </div>

        <div class="form-group mt-3">
            <label for="long_description">Long Description</label>
            <textarea name="long_description" class="form-control">{{ $department->long_description }}</textarea>
        </div>

        <div class="form-group mt-3">
            <label for="services">Services</label>
            <textarea name="services" class="form-control">{{ $department->services }}</textarea>
        </div>

        <div class="form-group mt-3">
            <label for="services_features">Services Features</label>
            <textarea name="services_features" class="form-control">{{ $department->services_features }}</textarea>
        </div>

        <div class="form-group mt-3">
            <label for="image">Image</label><br>
            @if ($department->image)
                <img src="{{ asset('uploads/departments/' . $department->image) }}" width="100" class="mb-2">
            @endif
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary mt-4">Update</button>
    </form>
</div>

@include('superAdmin.ap.footer')
