@include('superAdmin.ap.header')

<h1 style="font-weight: 500;">Add New Department</h1>

<form action="{{ route('superAdmin.departments.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control" required></textarea>
    </div>

    <div class="form-group">
        <label for="long_description">Long Description</label>
        <textarea name="long_description" class="form-control" required></textarea>
    </div>

    <div class="form-group">
        <label for="services">Services</label>
        <textarea name="services" class="form-control" required></textarea>
    </div>

    <div class="form-group">
        <label for="services_features">Services Features</label>
        <textarea name="services_features" class="form-control" required></textarea>
    </div>

    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" name="image" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary mt-3 mp-5">Save</button>
</form>

@include('superAdmin.ap.footer')
