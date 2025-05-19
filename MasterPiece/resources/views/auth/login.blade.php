<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap & Font Awesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/login/login.css') }}">

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    @include('partials.header')

    <div class="container d-flex justify-content-center">
        <div class="login-container"
            style="max-width: 400px; width: 100%; margin-top: 20px; box-shadow: 0 4px 14px rgba(0, 0, 0, 0.1); padding: 30px; border-radius: 10px; background-color: white;">

            <form method="POST" action="{{ route('login') }}" id="loginForm">
                @csrf
                <div class="form-header text-center mb-4">
                    <h2 style="color: #e12454;">
                        <i class="fa-solid fa-user" style="color: #e12454;"></i> Login
                    </h2>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label class="form-label">Email:</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') }}" required>
                    </div>
                    @error('email')
                        <div class="text-danger mt-1" style="font-size: 14px;">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label class="form-label">Password:</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input name="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" required>
                    </div>
                    @error('password')
                        <div class="text-danger mt-1" style="font-size: 14px;">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit -->
                <button type="submit" class="btn w-100" style="background-color: #e12454; color: white;">
                    <i class="fas fa-sign-in-alt"></i> Login
                </button>
            </form>

            <p class="text-center mt-3" style="font-size: 14px;">
                Don't have an account? <a href="{{ route('register') }}" style="color: #e12454;">Register</a>
            </p>
        </div>
    </div>


    <!-- Session Alerts -->
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

    <!-- JavaScript Validation -->
    <script>
        document.getElementById("loginForm").addEventListener("submit", function(e) {
            const email = document.querySelector('input[name="email"]').value.trim();
            const password = document.querySelector('input[name="password"]').value.trim();

            let errors = [];

            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                errors.push("Please enter a valid email address.");
            }

            if (password.length < 8) {
                errors.push("Your password must be at least 8 characters long.");
            }

            if (errors.length > 0) {
                e.preventDefault();
                Swal.fire({
                    icon: 'warning',
                    title: 'Input error',
                    html: errors.join("<br>")
                });
            }
        });
    </script>
</body>

</html>
