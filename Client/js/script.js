// functions of responsive sidebar

function showSidebar() {
    const sidebar = document.querySelector('.sidebar');
    sidebar.style.display = 'flex';
}

function hideSidebar() {
    const sidebar = document.querySelector('.sidebar');
    sidebar.style.display = 'none';
}

// first image header 

document.addEventListener("DOMContentLoaded", function() {
    var image = document.querySelector(".carImage");
    image.onload = function() {
      image.classList.add("loaded");
    };
});

let cars = [
    {name: "", desc: "", speed: "", transmission: "", turbo: "", gas: ""},
    {name: "", desc: "", speed: "", transmission: "", turbo: "", gas: ""},
    {name: "", desc: "", speed: "", transmission: "", turbo: "", gas: ""},
    {name: "", desc: "", speed: "", transmission: "", turbo: "", gas: ""},
]