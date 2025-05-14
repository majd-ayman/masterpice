<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/login/login.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>


@include('partials.header')

<body>

    <div class="container d-flex flex-column align-items-center">

        <div class="login-container" style="max-width: 400px; width: 100%;">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-header text-center mb-4">
                    <h2><i class="fa-solid fa-user"></i> Login</h2>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label class="form-label">Email:</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        <input name="email" type="email" class="form-control" required>
                    </div>
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label class="form-label">Password:</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input name="password" type="password" class="form-control" required>
                    </div>
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Submit -->
                <button type="submit" class="btn w-100" style="background-color: #e12454; color: white;">
                    <i class="fas fa-sign-in-alt"></i> Login
                </button>

                <p class="text-center mt-3">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="text-login">Register</a>
                </p>
            </form>
        </div>





    </div>





    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ session('error') }}',
            });
        </script>
    @endif
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
            });
        </script>
    @endif



    <script src="{{ asset('js/login/login.js') }}"></script>
</body>

</html>
