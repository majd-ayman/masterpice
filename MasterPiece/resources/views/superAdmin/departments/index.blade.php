@include('superAdmin.ap.header')

    <h1>Departments</h1>
    <a href="{{ route('superAdmin.departments.create') }}" class="btn btn-primary">Add New Department</a>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($departments as $department)
                <tr>
                    <td>{{ $department->name }}</td>
                    <td>{{ $department->description }}</td>
                    <td>
                        <a href="{{ route('superAdmin.departments.edit', $department->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('superAdmin.departments.destroy', $department->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @include('superAdmin.ap.footer')
