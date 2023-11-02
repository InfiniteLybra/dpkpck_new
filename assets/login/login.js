// Validation TEXT INPUT & CAPTCHA 
function validateForm() {
    var namaLengkap = document.getElementById('nama').value;
    var username = document.getElementById('username').value;
    var nomorHP = document.getElementById('nomor').value;
    var password = document.getElementById('pw').value;
    var ulangpassword = document.getElementById('ulangpw').value;
    var errorNamaLengkap = document.getElementById('error-nama-lengkap');
    var errorUsername = document.getElementById('error-username');
    var errorNomorHP = document.getElementById('error-nomor-hp');
    var errorPassword = document.getElementById('error-password');
    var errorUlangPassword = document.getElementById('error-ulang-password');

    errorNamaLengkap.textContent = '';
    errorUsername.textContent = '';
    errorNomorHP.textContent = '';
    errorPassword.textContent = '';
    errorUlangPassword.textContent = '';

    if (namaLengkap.trim() === '') {
        errorNamaLengkap.textContent = 'Nama harus diisi!';
    }

    if (username.trim() === '') {
        errorUsername.textContent = 'Username harus diisi!';
    }

    if (nomorHP.trim() === '') {
        errorNomorHP.textContent = 'Nomor HP harus diisi!';
    }

    if (password.trim() === '') {
        errorPassword.textContent = 'Password harus diisi!';
    }
    if (password.trim() === '') {
        errorUlangPassword.textContent = 'Ulang Password harus diisi!';
    }
    
    // Add reCAPTCHA verification here
    var response = grecaptcha.getResponse();
    if (response.length == 0) {
        // reCaptcha not verified
        alert("Please verify that you are human!");
    } else {
        // captcha verified, continue with form submission
        // You can add code here to submit the form to the server
    }
}


// SHOW PASSWORD
const passwordField = document.getElementById("pw");
const togglePasswordButton = document.getElementById("togglePassword");

togglePasswordButton.addEventListener("click", function () {
    const type = passwordField.getAttribute("type") === "password" ? "text" : "password";
    passwordField.setAttribute("type", type);
    this.classList.toggle("fa-eye");
    this.classList.toggle("fa-eye-slash");
});

const passwordField1 = document.getElementById("ulangpw");
const togglePasswordButton1 = document.getElementById("togglePassword1");

togglePasswordButton1.addEventListener("click", function () {
    const type = passwordField1.getAttribute("type") === "password" ? "text" : "password";
    passwordField1.setAttribute("type", type);
    this.classList.toggle("fa-eye");
    this.classList.toggle("fa-eye-slash");
});



$('.js-tilt').tilt({
    scale: 1.1
})