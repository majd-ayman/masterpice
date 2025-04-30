@include('superAdmin.ap.header')

<div class="container mt-5">
    <h2>Add New Clinic</h2>

    <form action="{{ route('superAdmin.clinics.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Clinic Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>


        <div class="form-group">
            <label for="contact_number">Contact Number</label>
            <input type="text" name="contact_number" class="form-control">
        </div>

        <div class="form-group">
            <label for="facilities">Facilities</label>
            <textarea name="facilities" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="icon">Icon (CSS class)</label>
            <input type="text" name="icon" class="form-control" placeholder="Example: icofont-heartbeat">        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Add Clinic</button>
    </form>
</div>

@include('superAdmin.ap.footer')
