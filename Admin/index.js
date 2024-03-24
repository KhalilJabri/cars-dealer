var tabLogin = document.getElementById('tab-login');
var tabRegistre = document.getElementById('tab-registre');
function switchTabs() {
    var form = document.getElementsByTagName('form');
    if (tabLogin.classList.contains("active")) {
        tabLogin.classList.remove("active");
        tabRegistre.classList.add("active");
        form[0].classList.add("hidden");
        form[1].classList.remove("hidden");
    }
    else if (tabRegistre.classList.contains("active")) {
        tabRegistre.classList.remove("active");
        tabLogin.classList.add("active");
        form[0].classList.remove("hidden");
        form[1].classList.add("hidden");
    }

}

tabLogin.addEventListener('click', switchTabs);
tabRegistre.addEventListener('click', switchTabs);