document.getElementById('togglePassword').addEventListener('click', function() {
    const passwordField = document.getElementById('password');
    const icon = this.querySelector('i');

    if (passwordField.type === "password") {
        passwordField.type = "text";
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        passwordField.type = "password";
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
});

document.getElementById('toggleConfirmPassword').addEventListener('click', function() {
    const confirmPasswordField = document.getElementById('password_confirmation');
    const icon = this.querySelector('i');

    if (confirmPasswordField.type === "password") {
        confirmPasswordField.type = "text";
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        confirmPasswordField.type = "password";
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
});

document.getElementById('name').addEventListener('input', function() {
    const nameError = document.getElementById('nameError');
    const nameSuccess = document.getElementById('nameSuccess');
    const name = this.value;

    // تحقق من أن الاسم لا يبدأ بفراغ
    if (name.trim().length === 0 || name.startsWith(' ')) {
        nameError.classList.remove('d-none'); // إظهار رسالة الخطأ
        nameSuccess.classList.add('d-none'); // إخفاء رسالة النجاح
    }
    // تحقق من أن الاسم لا يحتوي إلا على الأحرف والمسافات فقط
    else if (/[^a-zA-Z\s]/.test(name)) {
        nameError.classList.remove('d-none'); // إظهار رسالة الخطأ
        nameSuccess.classList.add('d-none'); // إخفاء رسالة النجاح
    } else {
        nameError.classList.add('d-none'); // إخفاء رسالة الخطأ
        nameSuccess.classList.remove('d-none'); // إظهار رسالة النجاح
    }
});
document.getElementById('phone').addEventListener('input', function() {
    const phoneError = document.getElementById('phoneError');
    const phoneSuccess = document.getElementById('phoneSuccess');
    const phone = this.value;

    if (/\D/.test(phone)) {
        phoneError.classList.remove('d-none');
        phoneSuccess.classList.add('d-none');
        phoneError.classList.remove('d-none');
        phoneSuccess.classList.add('d-none');
    } else {
        phoneError.classList.add('d-none');
        phoneSuccess.classList.remove('d-none');
    }
});

document.getElementById('email').addEventListener('input', function() {
    const emailError = document.getElementById('emailError');
    const emailSuccess = document.getElementById('emailSuccess');
    const emailTakenError = document.getElementById('emailTakenError');
    const email = this.value;

    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailPattern.test(email)) {
        emailError.classList.remove('d-none');
        emailSuccess.classList.add('d-none');
        emailTakenError.classList.add('d-none');
    } else {
        emailError.classList.add('d-none');
        emailSuccess.classList.remove('d-none');
        emailTakenError.classList.add('d-none');

        checkEmailAvailability(email);
    }
});

function checkEmailAvailability(email) {
    fetch(`/check-email?email=${email}`)
        .then(response => response.json())
        .then(data => {
            if (data.exists) {
                document.getElementById('emailSuccess').classList.add('d-none');
                document.getElementById('emailTakenError').classList.remove('d-none');
            } else {
                document.getElementById('emailSuccess').classList.remove('d-none');
                document.getElementById('emailTakenError').classList.add('d-none');
            }
        })
        .catch(error => console.error('Error checking email:', error));
}


document.addEventListener('DOMContentLoaded', function() {
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('password_confirmation');
    const passwordStrength = document.getElementById('passwordStrength');
    const passwordValid = document.getElementById('passwordValid');
    const passwordError = document.getElementById('passwordError');
    const confirmPasswordError = document.getElementById('confirmPasswordError');
    const confirmPasswordValid = document.getElementById('confirmPasswordValid');
    const togglePassword = document.getElementById('togglePassword');
    const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');

    passwordInput.addEventListener('input', function() {
        const password = passwordInput.value;
        let strength = getPasswordStrength(password);

        if (strength === 'Weak') {
            passwordStrength.textContent = '⚠️ Weak password';
            passwordStrength.className = 'text-danger';
            passwordValid.classList.add('d-none');
            passwordError.classList.remove('d-none');
        } else if (strength === 'Medium') {
            passwordStrength.textContent = '🟡 Medium strength';
            passwordStrength.className = 'text-warning';
            passwordValid.classList.add('d-none');
            passwordError.classList.add('d-none');
        } else if (strength === 'Strong') {
            passwordStrength.textContent = '✅ Strong password ';
            passwordStrength.className = 'text-success';
            passwordValid.classList.remove('d-none');
            passwordError.classList.add('d-none');
        } else {
            passwordStrength.classList.add('d-none');
            passwordValid.classList.add('d-none');
            passwordError.classList.remove('d-none');
        }
    });

    confirmPasswordInput.addEventListener('input', function() {
        if (passwordInput.value === confirmPasswordInput.value && passwordInput.value !== '') {
            confirmPasswordError.classList.add('d-none');
            confirmPasswordValid.classList.remove('d-none');
        } else {
            confirmPasswordError.classList.remove('d-none');
            confirmPasswordValid.classList.add('d-none');
        }
    });

    togglePassword.addEventListener('click', function() {
        togglePasswordVisibility(passwordInput, this);
    });

    toggleConfirmPassword.addEventListener('click', function() {
        togglePasswordVisibility(confirmPasswordInput, this);
    });

    function togglePasswordVisibility(input, toggleIcon) {
        if (input.type === 'password') {
            input.type = 'text';
            toggleIcon.innerHTML = '<i class="fas fa-eye-slash"></i>';
        } else {
            input.type = 'password';
            toggleIcon.innerHTML = '<i class="fas fa-eye"></i>';
        }
    }

    function getPasswordStrength(password) {
        if (password.length < 8) return 'Weak';
        let hasUpper = /[A-Z]/.test(password);
        let hasLower = /[a-z]/.test(password);
        let hasNumber = /[0-9]/.test(password);
        let hasSpecial = /[!@#$%^&*(),.?":{}|<>]/.test(password);

        if (hasUpper && hasLower && hasNumber && hasSpecial) return 'Strong';
        if ((hasUpper && hasLower) || (hasNumber && hasSpecial)) return 'Medium';
        return 'Weak';
    }

});
document.getElementById("togglePassword").addEventListener("click", function() {
    const passwordField = document.getElementById("password");
    const type = passwordField.type === "password" ? "text" : "password";
    passwordField.type = type;
    this.querySelector("i").classList.toggle("fa-eye-slash");
});

document.getElementById("toggleConfirmPassword").addEventListener("click", function() {
    const confirmPasswordField = document.getElementById("password_confirmation");
    const type = confirmPasswordField.type === "password" ? "text" : "password";
    confirmPasswordField.type = type;
    this.querySelector("i").classList.toggle("fa-eye-slash");
});

console.log("hi");





document.getElementById('age').addEventListener('input', function() {
    const ageInput = this.value.trim();
    const age = parseInt(ageInput);
    const ageError = document.getElementById('ageError');
    const ageValid = document.getElementById('ageValid');

    if (!/^\d{1,3}$/.test(ageInput) || isNaN(age) || age < 1 || age > 120) {
        ageError.classList.remove('d-none');
        ageValid.classList.add('d-none');
    } else {
        ageError.classList.add('d-none');
        ageValid.classList.remove('d-none');
    }
});







document.querySelector('form').addEventListener('submit', function(e) {
    let province = document.getElementById('province');
    let error = document.getElementById('provinceError');

    if (province.value === '') {
        e.preventDefault();
        error.classList.remove('d-none');
    } else {
        error.classList.add('d-none');
    }
});