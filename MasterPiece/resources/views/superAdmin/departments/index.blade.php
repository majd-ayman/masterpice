@include('superAdmin.ap.header')

<style>
    .table-padding-lg td,
    .table-padding-lg th {
        padding: 1rem !important;
        vertical-align: middle;
    }
    .image-thumbnail {
        width: 80px;
        height: auto;
    }
</style>

<div class="container mt-3">
    <h1 style="font-weight: 500;">All Departments</h1>

    <div class="mt-4 mb-4">
        <a href="{{ route('superAdmin.departments.create') }}" class="btn btn-primary">
            Add New Department
        </a>
    </div>

    <table class="table table-bordered table-padding-lg">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Long Description</th>
                <th>Services</th>
                <th>Services Features</th>
                <th>Image</th>
                <th style="width: 120px;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($departments as $department)
                <tr>
                    <td>{{ $department->name }}</td>
                    <td>{{ $department->description }}</td>
                    <td>{{ $department->long_description }}</td>
                    <td>{{ $department->services }}</td>
                    <td>{{ $department->services_features }}</td>
                    <td>
                        @if ($department->image)
                            <img src="{{ asset('uploads/departments/' . $department->image) }}" class="image-thumbnail" alt="Department Image">
                        @else
                            No Image
                        @endif
                    </td>
                    <td class="text-center">
                        <a href="{{ route('superAdmin.departments.edit', $department->id) }}" class="btn btn-warning btn-sm me-1">
                            <i class="fa fa-edit"></i>
                        </a>
                        <form action="{{ route('superAdmin.departments.destroy', $department->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@include('superAdmin.ap.footer')
