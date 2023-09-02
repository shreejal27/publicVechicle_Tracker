
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
