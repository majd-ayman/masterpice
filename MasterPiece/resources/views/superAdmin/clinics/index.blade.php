@include('superAdmin.ap.header')

<style>
    .table td,
    .table th {
        padding: 1rem 1.5rem;
        vertical-align: middle;
    }

    .action-buttons {
        display: flex;
        gap: 10px;
    }

    .action-buttons form {
        margin: 0;
    }

    .contact-column {
        min-width: 150px;
    }

    .page-title {
        text-align: center;
        margin-bottom: 20px;
    }
</style>

<div class="container mt-3">
    <h1 style="font-weight: 500;">All Clinics</h1>

    <a href="{{ route('superAdmin.clinics.create') }}" class="btn btn-primary mt-2 mb-3">Add New Clinic</a>


    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th class="contact-column">Contact</th>
                <th>Facilities</th>
                <th>Description</th>
                <th>Icon</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clinics as $clinic)
                <tr>
                    <td>{{ $clinic->name }}</td>
                    <td class="contact-column">{{ $clinic->contact_number }}</td>
                    <td>{{ $clinic->facilities }}</td>
                    <td>{{ $clinic->description }}</td>
                    {{-- <td>
                        @if ($clinic->icon)
                            <i class="{{ $clinic->icon }}" style="font-size: 24px; color: #333;"></i>
                        @else
                            <span>No Icon</span>
                        @endif
                    </td> --}}
                    <td>{{ $clinic->icon }}</td>


                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('superAdmin.clinics.edit', $clinic->id) }}" class="btn btn-sm btn-warning">
                                <i class="fa fa-edit"></i>
                            </a>

                            <form action="{{ route('superAdmin.clinics.destroy', $clinic->id) }}" method="POST"
                                id="delete-form-{{ $clinic->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-sm btn-danger"
                                    onclick="confirmDelete({{ $clinic->id }})">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>

                            <script>
                                function confirmDelete(clinicId) {
                                    Swal.fire({
                                        title: 'Are you sure?',
                                        text: "You won't be able to revert this!",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonText: 'Yes, delete it!',
                                        cancelButtonText: 'No, cancel!',
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            document.getElementById('delete-form-' + clinicId).submit();
                                        }
                                    });
                                }
                            </script>



                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Successful',
            text: '{{ session('success') }}',
            confirmButtonText: 'OK'
        });
    </script>
@endif


@include('superAdmin.ap.footer')
