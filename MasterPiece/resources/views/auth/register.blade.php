<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/register/register.css') }}">
</head>

<body>

    <div class="register-container">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-header">
                <h2><i class="fa-solid fa-user-plus"></i> Register</h2>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Name:</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        <input name="name" type="text" id="name" class="form-control form-control-lg"
                            required>
                    </div>
                    <div class="mt-1">
                        <small id="nameError" class="text-danger d-none">Invalid name, use letters only, no extra
                            spaces.</small>
                        <small id="nameSuccess" class="text-success d-none">✅ Valid name!</small>
                    </div>
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Email:</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        <input name="email" type="email" id="email" class="form-control form-control-lg"
                            required>
                    </div>
                    <div class="mt-1">
                        <small id="emailError" class="text-danger d-none">❌ Invalid email format.</small>
                        <small id="emailSuccess" class="text-success d-none">✅ Valid email!</small>
                        <small id="emailTakenError" class="text-danger d-none">❌ This email is already taken.</small>
                    </div>
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Password:</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input name="password" type="password" id="password" class="form-control form-control-lg"
                            required>
                        <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                    <div class="mt-1">
                        <small id="passwordError" class="text-danger d-none">❌ Password must be at least 8 characters,
                            include uppercase, lowercase, number, and special character.</small>
                        <small id="passwordStrength" class="text-warning d-none"></small>
                        <small id="passwordValid" class="text-success d-none">✅ Password is valid!</small>
                    </div>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Confirm Password:</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input name="password_confirmation" type="password" id="password_confirmation"
                            class="form-control form-control-lg" required>
                        <span class="input-group-text" id="toggleConfirmPassword" style="cursor: pointer;">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                    <div class="mt-1">
                        <small id="confirmPasswordError" class="text-danger d-none">❌ Passwords do not match.</small>
                        <small id="confirmPasswordValid" class="text-success d-none">✅ Passwords match!</small>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Phone Number:</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        <input name="phone" type="text" id="phone" class="form-control form-control-lg">
                    </div>
                    <div class="mt-1">
                        <small id="phoneError" class="text-danger d-none">❌ Invalid phone number. It should be 10 digits
                            starting with 079, 078, or 077.</small>
                        <small id="phoneSuccess" class="text-success d-none">✅ Valid phone number!</small>
                    </div>
                </div>


                <div class="col-md-6">
                    <label class="form-label">Gender:</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                        <select name="gender" id="gender" class="form-select form-select-lg" required>
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Age:</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                        <input name="age" type="number" id="age" class="form-control form-control-lg"
                            min="1" max="120" required>
                    </div>

                    <div class="mt-1">
                        <small id="ageError" class="text-danger d-none">❌ Please enter a valid age between 1 and
                            120.</small>
                        <small id="ageValid" class="text-success d-none">✅ Valid age!</small>
                    </div>

                    @error('age')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>


                <div class="col-md-6">
                    <label class="form-label">Location:</label>
                    <div class="input-group">
                        <select name="address" id="province" class="form-select form-select-lg" required>
                            <option value="">Select a province</option>
                            <option value="Amman">Amman</option>
                            <option value="Irbid">Irbid</option>
                            <option value="Zarqa">Zarqa</option>
                            <option value="Balqa">Balqa</option>
                            <option value="Madaba">Madaba</option>
                            <option value="Jerash">Jerash</option>
                            <option value="Ajloun">Ajloun</option>
                            <option value="Mafraq">Mafraq</option>
                            <option value="Karak">Karak</option>
                            <option value="Tafilah">Tafilah</option>
                            <option value="Ma'an">Ma'an</option>
                            <option value="Aqaba">Aqaba</option>
                        </select>
                    </div>
                    <small id="provinceError" class="text-danger d-none">❌ Please select a province.</small>
                </div>


            </div>

            <div class="input-group mb-3">
                <button style="background-color: #e12454; color: white" type="submit" class="btn w-100 btn-lg">
                    <i class="fas fa-user-plus"></i> Register
                </button>
            </div>

            <p class="text-center mt-3">Already have an account? <a href="{{ route('login') }}"
                    class="text-login">Login</a></p>
        </form>
    </div>






    <script src="{{ asset('js/register/register.js') }}"></script>
    <div class="text-center">

        <a href="{{ route('index') }}" class="btn btn-secondary">Back</a>
    </div>






    @if (session('success'))
        <p>{{ session('success') }}</p>
        log
    @endif


    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Registration Successful',
                text: '{{ session('success') }}',
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ session('error') }}',
            });
        </script>
    @endif

</body>

</html>
