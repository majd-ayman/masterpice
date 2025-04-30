@include('superAdmin.ap.header')

<div class="container mt-5">
    <h2>Edit Clinic</h2>

    <form action="{{ route('superAdmin.clinics.update', $clinic->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Clinic Name</label>
            <input type="text" name="name" class="form-control" value="{{ $clinic->name }}" required>
        </div>


        <div class="form-group">
            <label for="contact_number">Contact Number</label>
            <input type="text" name="contact_number" class="form-control" value="{{ $clinic->contact_number }}">
        </div>

        <div class="form-group">
            <label for="icon">Clinic Icon (CSS class)</label>
            <input type="text" name="icon" class="form-control" value="{{ $clinic->icon }}">
        </div>

        <div class="form-group">
            <label for="description">Clinic Description</label>
            <textarea name="description" class="form-control" rows="3">{{ $clinic->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="facilities">Facilities</label>
            <textarea name="facilities" class="form-control" rows="3">{{ $clinic->facilities }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Update Clinic</button>
    </form>
</div>

@include('superAdmin.ap.footer')
