
document.addEventListener('DOMContentLoaded', function() {

    //for login form 
    var passwordInput = document.getElementById('password');
    var togglePassword = document.getElementById('toggle-password');

    if(passwordInput != null && togglePassword != null){

    togglePassword.addEventListener('click', function() {
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            togglePassword.classList.remove('fa-eye-slash');
            togglePassword.classList.add('fa-eye');
        } else {
            passwordInput.type = 'password';
            togglePassword.classList.remove('fa-eye');
            togglePassword.classList.add('fa-eye-slash');
        }

    });
    }

    //for update credentials form 
    var CpasswordInput = document.getElementById('Cpassword');
    var CtogglePassword = document.getElementById('Ctoggle-password');
    
    if(CpasswordInput != null && CtogglePassword != null){

    CtogglePassword.addEventListener('click', function() {
        if (CpasswordInput.type === 'password') {
            CpasswordInput.type = 'text';
            CtogglePassword.classList.remove('fa-eye-slash');
            CtogglePassword.classList.add('fa-eye');
        } else {
            CpasswordInput.type = 'password';
            CtogglePassword.classList.remove('fa-eye');
            CtogglePassword.classList.add('fa-eye-slash');
        }
    });

    }
    
    var NpasswordInput = document.getElementById('Npassword');
    var NtogglePassword = document.getElementById('Ntoggle-password');

    NtogglePassword.addEventListener('click', function() {
        if (NpasswordInput.type === 'password') {
            NpasswordInput.type = 'text';
            NtogglePassword.classList.remove('fa-eye-slash');
            NtogglePassword.classList.add('fa-eye');
        } else {
            NpasswordInput.type = 'password';
            NtogglePassword.classList.remove('fa-eye');
            NtogglePassword.classList.add('fa-eye-slash');
        }

    });

    var RpasswordInput = document.getElementById('Rpassword');
    var RtogglePassword = document.getElementById('Rtoggle-password');

    RtogglePassword.addEventListener('click', function() {
        if (RpasswordInput.type === 'password') {
            RpasswordInput.type = 'text';
            RtogglePassword.classList.remove('fa-eye-slash');
            RtogglePassword.classList.add('fa-eye');
        } else {
            RpasswordInput.type = 'password';
            RtogglePassword.classList.remove('fa-eye');
            RtogglePassword.classList.add('fa-eye-slash');
        }

    });
});

var driverPasswordInput = document.getElementById('driverPassword');
var driverTogglePassword = document.getElementById('driverTogglePassword');

if (driverPasswordInput != null && driverTogglePassword != null) {
    driverTogglePassword.addEventListener('click', function () {
        if (driverPasswordInput.type === 'password') {
            driverPasswordInput.type = 'text';
            driverTogglePassword.classList.remove('fa-eye-slash');
            driverTogglePassword.classList.add('fa-eye');
        } else {
            driverPasswordInput.type = 'password';
            driverTogglePassword.classList.remove('fa-eye');
            driverTogglePassword.classList.add('fa-eye-slash');
        }
    });
}

var driverCPassword = document.getElementById('driverCPassword');
var driverCtogglePassword = document.getElementById('driverCtogglePassword');

if (driverCPassword != null && driverCtogglePassword != null) {
    driverCtogglePassword.addEventListener('click', function () {
        if (driverCPassword.type === 'password') {
            driverCPassword.type = 'text';
            driverCtogglePassword.classList.remove('fa-eye-slash');
            driverCtogglePassword.classList.add('fa-eye');
        } else {
            driverCPassword.type = 'password';
            driverCtogglePassword.classList.remove('fa-eye');
            driverCtogglePassword.classList.add('fa-eye-slash');
        }
    });
}

var signUpUserPassword = document.getElementById('Cpassword');
var signUpUserTogglePassword = document.getElementById('signUp-Ctoggle-password');

if (signUpUserPassword != null && signUpUserTogglePassword != null) {
    signUpUserTogglePassword.addEventListener('click', function () {
        if (signUpUserPassword.type === 'password') {
            signUpUserPassword.type = 'text';
            signUpUserTogglePassword.classList.remove('fa-eye-slash');
            signUpUserTogglePassword.classList.add('fa-eye');
        } else {
            signUpUserPassword.type = 'password';
            signUpUserTogglePassword.classList.remove('fa-eye');
            signUpUserTogglePassword.classList.add('fa-eye-slash');
        }
    });
}

