
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="{{ asset('images/favicon.ico') }}" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styleadmin.css') }}" rel="stylesheet">
</head>
   <style>
                    .nav-item {
                        color: black;
                    }

                    .nav-item i {
                        color: red;
                    }
                </style>
<body>
    <div class="sidebar pe-4 pb-3">
        <nav class="navbar bg-light navbar-light">
            <div class="navbar-brand mx-4 mb-3">
                <a href="#">
                    <img src="{{ asset('images/calmoram.png') }}" alt="Site Logo" style="height: 50px;">
                </a>
            </div>

            @php $user = Auth::user(); @endphp

            <div class="d-flex align-items-center ms-4 mb-4">
                <div class="position-relative">
                    @php
                        $user = Auth::user();
                    @endphp

                    <img class="rounded-circle"
                        src="{{ $user->profile_picture ? asset('storage/profile_pictures/' . $user->profile_picture) : asset('images/user.jpg') }}"
                        alt="User" style="width: 40px; height: 40px;">

                    <div
                        class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                    </div>
                </div>
                <div class="ms-3">
                    <h6 class="mb-0">{{ $user ? $user->name : 'Guest' }}</h6>
                </div>
            </div>

            <ul class="navbar-nav">
                <li>
                    <a href="{{ route('user-account.my-account') }}"
                       class="nav-item nav-link {{ request()->routeIs('user-account.my-account') ? 'active' : '' }}">
                        <i class="fa fa-user-circle me-2"></i> My Account
                    </a>
            
                  
            
                    <a href="{{ route('user-account.editProfile') }}"
                       class="nav-item nav-link {{ request()->routeIs('user-account.editProfile') ? 'active' : '' }}">
                        <i class="fa fa-edit me-2"></i> Edit Profile
                    </a>
            
                    <a href="{{ route('user-account.medicalHistory') }}"
                       class="nav-item nav-link {{ request()->routeIs('user-account.medicalHistory') ? 'active' : '' }}">
                        <i class="fa fa-file-medical me-2"></i> Medical Histories

                    </a>
            
                    <a href="{{ route('home') }}" class="nav-item nav-link">
                        <i class="fa fa-sign-out-alt me-2"></i> Back
                    </a>
                </li>
            </ul>
            
        </nav>
    </div>

    <div class="content">
        <!-- Edit Profile Content -->
        <div class="container mt-5">
            <div class="text-center mb-4">
                <h2 style="font-weight: bold; padding:30px">Edit Profile Information</h2>
            </div>

            <div class="card">
                <div class="card-body">

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('user-account.updateProfile') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="name" class="form-label">Full Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ old('name', $user->name) }}" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="email" name="email"
                                        value="{{ old('name', $user->email) }}" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="text" class="form-control" id="phone" name="phone"
                                        value="{{ old('phone', $user->phone) }}">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="profile_picture" class="form-label">Profile Picture</label>
                                    <input type="file" class="form-control" id="profile_picture"
                                        name="profile_picture" accept="image/*">

                                    @if (!empty($user->profile_picture))
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/profile_pictures/' . $user->profile_picture) }}"
                                                alt="Current Profile Picture" class="rounded-circle"
                                                style="width: 100px; height: 100px; object-fit: cover;">
                                        </div>
                                    @endif



                                    @error('profile_picture')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="address" class="form-label">Location</label>
                                    <select class="form-control" id="address" name="address" required>
                                        <option value="">-- Select a province --</option>
                                        <option value="Amman"
                                            {{ old('address', $user->address) == 'Amman' ? 'selected' : '' }}>Amman
                                        </option>
                                        <option value="Zarqa"
                                            {{ old('address', $user->address) == 'Zarqa' ? 'selected' : '' }}>Zarqa
                                        </option>
                                        <option value="Irbid"
                                            {{ old('address', $user->address) == 'Irbid' ? 'selected' : '' }}>Irbid
                                        </option>
                                        <option value="Balqa"
                                            {{ old('address', $user->address) == 'Balqa' ? 'selected' : '' }}>Balqa
                                        </option>
                                        <option value="Madaba"
                                            {{ old('address', $user->address) == 'Madaba' ? 'selected' : '' }}>Madaba
                                        </option>
                                        <option value="Aqaba"
                                            {{ old('address', $user->address) == 'Aqaba' ? 'selected' : '' }}>Aqaba
                                        </option>
                                        <option value="Karak"
                                            {{ old('address', $user->address) == 'Karak' ? 'selected' : '' }}>Karak
                                        </option>
                                        <option value="Tafilah"
                                            {{ old('address', $user->address) == 'Tafilah' ? 'selected' : '' }}>Tafilah
                                        </option>
                                        <option value="Maan"
                                            {{ old('address', $user->address) == 'Maan' ? 'selected' : '' }}>Maan
                                        </option>
                                        <option value="Jerash"
                                            {{ old('address', $user->address) == 'Jerash' ? 'selected' : '' }}>Jerash
                                        </option>
                                        <option value="Ajloun"
                                            {{ old('address', $user->address) == 'Ajloun' ? 'selected' : '' }}>Ajloun
                                        </option>
                                        <option value="Mafraq"
                                            {{ old('address', $user->address) == 'Mafraq' ? 'selected' : '' }}>Mafraq
                                        </option>
                                        <option value="Salt"
                                            {{ old('address', $user->address) == 'Salt' ? 'selected' : '' }}>Salt
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="age" class="form-label">Age</label>
                                    <input type="number" class="form-control" id="age" name="age"
                                        value="{{ old('age', $user->age) }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select class="form-control" id="gender" name="gender">
                                        <option value="male"
                                            {{ old('gender', $user->gender) == 'male' ? 'selected' : '' }}>Male
                                        </option>
                                        <option value="female"
                                            {{ old('gender', $user->gender) == 'female' ? 'selected' : '' }}>Female
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center mt-4 gap-3">
                            <a href="{{ route('user-account.my-account') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update Profile</button>
                        </div>
                    </form>
                    <div class="mt-2">
                        <form action="{{route('profile-picture.delete')}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete Profile Picture</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function deleteProfilePicture() {
            if (confirm("Are you sure you want to delete your profile picture?")) {
                document.querySelector('form').submit();
            }
        }
    </script>
</body>

</html>
