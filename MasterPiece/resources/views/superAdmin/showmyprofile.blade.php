@include('superAdmin.ap.header')

<div class="container mt-4">
    <h1 style="font-weight: 500;" >My Profile</h1>
    <p><strong>Name:</strong> {{ $supperadmin->name }}</p>
    <p><strong>Email:</strong> {{ $supperadmin->email }}</p>
    <p><strong>Phone:</strong> {{ $supperadmin->phone }}</p>
        <p><strong>gender:</strong> {{ $supperadmin->gender}}</p>



    <a href="{{ route('superAdmin.editprofile') }}" class="btn btn-primary">Edit Profile</a>
</div>
@include('superAdmin.ap.footer')
