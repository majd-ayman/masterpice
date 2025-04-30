window.onload = function() {
    const storedEmail = localStorage.getItem('email');
    if (storedEmail) {
        document.getElementById('email').value = storedEmail;
        document.getElementById('remember').checked = true;
    }
};

const rememberMeCheckbox = document.getElementById('remember');
const emailField = document.getElementById('email');

rememberMeCheckbox.addEventListener('change', function() {
    if (this.checked) {
        localStorage.setItem('email', emailField.value);
    } else {
        localStorage.removeItem('email');
    }
});