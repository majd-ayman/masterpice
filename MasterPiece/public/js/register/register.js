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

document.addEventListener('DOMContentLoaded', function() {
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('password_confirmation');
    const togglePassword = document.getElementById('togglePassword');
    const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
    const passwordStrength = document.getElementById('passwordStrength');
    const passwordValid = document.getElementById('passwordValid');
    const passwordError = document.getElementById('passwordError');
    const confirmPasswordError = document.getElementById('confirmPasswordError');
    const confirmPasswordValid = document.getElementById('confirmPasswordValid');

    function toggleVisibility(inputField, toggleElement) {
        const icon = toggleElement.querySelector('i');
        if (inputField.type === 'password') {
            inputField.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            inputField.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }

    togglePassword.addEventListener('click', () => toggleVisibility(passwordInput, togglePassword));
    toggleConfirmPassword.addEventListener('click', () => toggleVisibility(confirmPasswordInput, toggleConfirmPassword));

    passwordInput.addEventListener('input', function() {
        const password = this.value;
        const strength = getPasswordStrength(password);

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
            passwordStrength.textContent = '✅ Strong password';
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

    // التحقق من الاسم
    // document.getElementById('name').addEventListener('input', function() {
    //     const name = this.value;
    //     const nameError = document.getElementById('nameError');
    //     const nameSuccess = document.getElementById('nameSuccess');

    //     if (name.trim().length === 0 || name.startsWith(' ') || /[^a-zA-Z\s]/.test(name)) {
    //         nameError.classList.remove('d-none');
    //         nameSuccess.classList.add('d-none');
    //     } else {
    //         nameError.classList.add('d-none');
    //         nameSuccess.classList.remove('d-none');
    //     }
    // });

    // التحقق من الهاتف
    document.getElementById('phone').addEventListener('input', function() {
        let phone = this.value;

        if (phone.length > 10) {
            phone = phone.slice(0, 10);
            this.value = phone;
        }

        const phoneError = document.getElementById('phoneError');
        const phoneSuccess = document.getElementById('phoneSuccess');

        const validPhoneRegex = /^(078|079|077)\d{7}$/;

        if (validPhoneRegex.test(phone)) {
            phoneError.classList.add('d-none');
            phoneSuccess.classList.remove('d-none');
        } else {
            phoneError.classList.remove('d-none');
            phoneSuccess.classList.add('d-none');
        }
    });


    // التحقق من البريد الإلكتروني
    document.getElementById('email').addEventListener('input', function() {
        const email = this.value;
        const emailError = document.getElementById('emailError');
        const emailSuccess = document.getElementById('emailSuccess');
        const emailTakenError = document.getElementById('emailTakenError');
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (!emailPattern.test(email)) {
            emailError.classList.remove('d-none');
            emailSuccess.classList.add('d-none');
            emailTakenError.classList.add('d-none');
        } else {
            emailError.classList.add('d-none');
            checkEmailAvailability(email);
        }
    });

    // التحقق من العمر
    document.getElementById('age').addEventListener('input', function() {
        const age = parseInt(this.value.trim());
        const ageError = document.getElementById('ageError');
        const ageValid = document.getElementById('ageValid');

        if (!/^\d{1,3}$/.test(this.value.trim()) || isNaN(age) || age < 1 || age > 120) {
            ageError.classList.remove('d-none');
            ageValid.classList.add('d-none');
        } else {
            ageError.classList.add('d-none');
            ageValid.classList.remove('d-none');
        }
    });

    // التحقق من المحافظة في الفورم
    document.querySelector('form').addEventListener('submit', function(e) {
        const province = document.getElementById('province');
        const provinceError = document.getElementById('provinceError');

        if (province.value === '') {
            e.preventDefault();
            provinceError.classList.remove('d-none');
        } else {
            provinceError.classList.add('d-none');
        }
    });

    // قوة كلمة المرور
    function getPasswordStrength(password) {
        if (password.length < 8) return 'Weak';
        const hasUpper = /[A-Z]/.test(password);
        const hasLower = /[a-z]/.test(password);
        const hasNumber = /[0-9]/.test(password);
        const hasSpecial = /[!@#$%^&*(),.?":{}|<>]/.test(password);

        if (hasUpper && hasLower && hasNumber && hasSpecial) return 'Strong';
        if ((hasUpper && hasLower) || (hasNumber && hasSpecial)) return 'Medium';
        return 'Weak';
    }

    // التحقق من توفر البريد الإلكتروني
    function checkEmailAvailability(email) {
        fetch(`/check-email?email=${email}`)
            .then(response => response.json())
            .then(data => {
                const emailSuccess = document.getElementById('emailSuccess');
                const emailTakenError = document.getElementById('emailTakenError');
                if (data.exists) {
                    emailSuccess.classList.add('d-none');
                    emailTakenError.classList.remove('d-none');
                } else {
                    emailSuccess.classList.remove('d-none');
                    emailTakenError.classList.add('d-none');
                }
            })
            .catch(error => console.error('Error checking email:', error));
    }

    console.log("hi");
});