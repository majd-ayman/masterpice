<!-- resources/views/superAdmin/doctors/index.blade.php -->

@include('superAdmin.ap.header')

    <div class="container">
        <h1>Doctors</h1>
        <a href="{{ route('superAdmin.doctors.create') }}" class="btn btn-primary">Add New Doctor</a>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Specialty</th>
                    <th>Available From</th>
                    <th>Available To</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($doctors as $doctor)
                    <tr>
                        <td>{{ $doctor->name }}</td>
                        <td>{{ $doctor->phone }}</td>
                        <td>{{ $doctor->specialty }}</td>
                        <td>{{ $doctor->available_from }}</td>
                        <td>{{ $doctor->available_to }}</td>
                        <td>
                            <a href="{{ route('superAdmin.doctors.edit', $doctor->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('superAdmin.doctors.destroy', $doctor->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@include('superAdmin.ap.footer')