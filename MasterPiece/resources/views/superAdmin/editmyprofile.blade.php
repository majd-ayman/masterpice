@include('superAdmin.ap.header')

<div class="container mt-4">
    <h1 style="font-weight: 500;">Edit Profile</h1>

    {{-- <form action="{{ route('superAdmin.updateprofile') }}" method="POST"> --}}
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ $supperadmin->name }}">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $supperadmin->email }}">
        </div>

        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ $supperadmin->phone }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

@include('superAdmin.ap.footer')
