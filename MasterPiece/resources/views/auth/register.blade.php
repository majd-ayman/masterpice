<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            /* background-image: url(''); خلفية الصفحة */
            background-size: cover;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #fff;
        }

        .form-container {
            background-color: rgba(0, 0, 0, 0.5); /* لون الخلفية للفورم */
            padding: 30px;
            border-radius: 10px;
            width: 350px;
            text-align: center;
        }

        .form-container h2 {
            margin-bottom: 20px;
            font-size: 24px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-size: 16px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }

        p {
            margin-top: 15px;
            font-size: 14px;
        }

        p a {
            color: #fff;
            text-decoration: none;
        }

        .side-image {
            position: absolute;
            top: 50%;
            right: 0;
            transform: translateY(-50%);
            width: 150px;
            height: auto;
        }

        /* إضافة أيقونات */
        label:before {
            content: '\1F464'; /* رمز الأيقونة لشخص */
            margin-right: 10px;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #007bff;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Register</h2>

        <form id="registerForm" method="POST" action="{{ route('register') }}">
            @csrf
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>
            
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
            
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
            
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required>
            
            <label for="phone">Phone Number:</label>
            <input type="text" name="phone" id="phone" required>

            <button type="submit">Register</button>
        </form>

        <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
    </div>

    {{-- <img src="path/to/your/side-image.jpg" alt="Side Image" class="side-image"> --}}

    <script>
        document.getElementById("registerForm").addEventListener("submit", function(event) {
            event.preventDefault();

            // الحصول على القيم المدخلة
            var name = document.getElementById("name").value;
            var email = document.getElementById("email").value;
            var password = document.getElementById("password").value;
            var password_confirmation = document.getElementById("password_confirmation").value;
            var phone = document.getElementById("phone").value;

            var errors = [];

            // التحقق من الحقول
            if (name.trim() === "") {
                errors.push("Name is required.");
            }

            // التحقق من البريد الإلكتروني
            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
            if (!emailPattern.test(email)) {
                errors.push("Please enter a valid email address.");
            }

            // التحقق من كلمة المرور
            if (password.length < 6) {
                errors.push("Password must be at least 6 characters long.");
            }

            // التحقق من تطابق كلمة المرور
            if (password !== password_confirmation) {
                errors.push("Passwords do not match.");
            }

            // التحقق من رقم الهاتف
            var phonePattern = /^[0-9]{10}$/;
            if (!phonePattern.test(phone)) {
                errors.push("Phone number must be 10 digits.");
            }

            // إذا كانت هناك أخطاء، إظهارها
            if (errors.length > 0) {
                alert(errors.join("\n"));
            } else {
                alert("Form is valid!");
                document.getElementById("registerForm").submit(); // إرسال النموذج إذا كانت البيانات صحيحة
            }
        });
    </script>

</body>
</html>
