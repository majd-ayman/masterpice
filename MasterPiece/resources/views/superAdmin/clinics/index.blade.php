@include('superAdmin.ap.header')

<div class="container mt-5">
    <h2>All Clinics</h2>

    <a href="{{ route('superAdmin.clinics.create') }}" class="btn btn-primary mb-3">Add New Clinic</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Contact</th>
                <th>Facilities</th>
                <th>Description</th>
                <th>Icon</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clinics as $clinic)
                <tr>
                    <td>{{ $clinic->name }}</td>
                    <td>{{ $clinic->contact_number }}</td>
                    <td>{{ $clinic->facilities }}</td>
                    <td>{{ $clinic->description }}</td>
                    <td>
                        @if($clinic->icon)
                            <img src="{{ asset('uploads/clinics/' . $clinic->icon) }}" alt="Icon" width="50" height="50">
                        @else
                            <span>No Icon</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('superAdmin.clinics.edit', $clinic->id) }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('superAdmin.clinics.destroy', $clinic->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@include('superAdmin.ap.footer')
