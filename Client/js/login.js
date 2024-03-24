function registerHandler() {
    var registerForm = document.getElementById('register');
    var loginForm = document.getElementById('login');
    var registerCont = document.querySelector('.registerCont');
    var loginCont = document.querySelector('.loginCont');

    // Remove 'active' class from loginDiv
    loginForm.classList.remove('activeLogin');
    // Add 'active' class to registerDiv
    registerForm.classList.add('activeRegister');

    // Hide login content
    loginCont.style.display = 'none';
    // Show register content
    registerCont.style.display = 'block';
}

function loginHandler() {
    var registerForm = document.getElementById('register');
    var loginForm = document.getElementById('login');
    var registerCont = document.querySelector('.registerCont');
    var loginCont = document.querySelector('.loginCont');

    // Remove 'active' class from loginDiv
    registerForm.classList.remove('activeRegister');
    // Add 'active' class to registerDiv
    loginForm.classList.add('activeLogin');

    // Hide login content
    registerCont.style.display = 'none';
    // Show register content
    loginCont.style.display = 'block';
}