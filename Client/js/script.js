// functions of responsive sidebar

function showSidebar() {
    const sidebar = document.querySelector('.sidebar');
    sidebar.style.display = 'flex';
}

function hideSidebar() {
    const sidebar = document.querySelector('.sidebar');
    sidebar.style.display = 'none';
}

// Creating an infinite logo carousel with pure CSS

let copy = document.querySelector(".logo-slide").cloneNode(true);
document.querySelector('.logoContainer').appendChild(copy);

// first image header 

document.addEventListener("DOMContentLoaded", function() {
    var image = document.querySelector(".carImage");
    image.onload = function() {
      image.classList.add("loaded");
    };
});

// scroll between popular cars button

const desc = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vel nulla ac turpis porta commodo eget sit amet sapien. Vivamus finibus nibh et sollicitudin pretium. In mollis erat non tellus.";

let cars = [
    {name: "Audi", desc: desc, speed: "220 Km/h", transmission: "Auto", turbo: "50 KM", gas: "HEV", price: "150 DT", img: "./image/audi.jpg"},
    {name: "BMW", desc: desc, speed: "200 Km/h", transmission: "Manual", turbo: "100 KM", gas: "BEV", price: "130 DT", img: "./image/bmw.jpg"},
    {name: "Hyundai", desc: desc, speed: "180 Km/h", transmission: "Manual", turbo: "150 KM", gas: "P", price: "100 DT", img: "./image/hyundai.jpg"},
    {name: "Mercedes-Benz", desc: desc, speed: "120 Km/h", transmission: "Auto", turbo: "60 KM", gas: "BEV", price: "160 DT", img: "./image/pngfind.com-car-front-png-218600.png"},
]

const nameCar = document.querySelector('.nameCar');
const descrip = document.querySelector('.desc');
const vitesseValue = document.querySelector('.vitesseValue');
const turboValue = document.querySelector('.turboValue');
const transmissionValue = document.querySelector('.transmissionValue');
const gasValue = document.querySelector('.gasValue');
const globalPriceValue = document.querySelector('.globalPriceValue');
const carImage = document.querySelector('.carImage');

let currentCar = 0;

function previousCar() {
    if(currentCar == 0) {
        currentCar = cars.length -1;
    }else {
        currentCar -= 1;
    }
    nameCar.textContent = cars[currentCar].name;
    descrip.textContent = cars[currentCar].desc;
    vitesseValue.textContent = cars[currentCar].speed;
    turboValue.textContent = cars[currentCar].transmission;
    transmissionValue.textContent = cars[currentCar].turbo;
    gasValue.textContent = cars[currentCar].gas;
    globalPriceValue.textContent = cars[currentCar].price;
    carImage.src = cars[currentCar].img;

}

function nextCar() {
    if(currentCar == cars.length -1) {
        currentCar = 0;
    }else {
        currentCar +=1;
    }
    nameCar.textContent = cars[currentCar].name;
    descrip.textContent = cars[currentCar].desc;
    vitesseValue.textContent = cars[currentCar].speed;
    turboValue.textContent = cars[currentCar].transmission;
    transmissionValue.textContent = cars[currentCar].turbo;
    gasValue.textContent = cars[currentCar].gas;
    globalPriceValue.textContent = cars[currentCar].price;
    carImage.src = cars[currentCar].img;

}