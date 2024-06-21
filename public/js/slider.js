let currentSlide = 0;
const slidesToShow = 3; // Number of slides to show at a time

function moveLeft() {
    const sliderWrapper = document.getElementById('slider-wrapper');
    if (currentSlide > 0) {
        currentSlide--;
    } else {
        currentSlide = Math.max(sliderWrapper.children.length - slidesToShow, 0);
    }
    updateSliderPosition();
}

function moveRight() {
    const sliderWrapper = document.getElementById('slider-wrapper');
    if (currentSlide < sliderWrapper.children.length - slidesToShow) {
        currentSlide++;
    } else {
        currentSlide = 0;
    }
    updateSliderPosition();
}

function updateSliderPosition() {
    const sliderWrapper = document.getElementById('slider-wrapper');
    const slideWidth = sliderWrapper.children[0].offsetWidth;
    sliderWrapper.style.transform = `translateX(-${currentSlide * slideWidth}px)`;
}
function showServiceDetails(serviceId) {
    // Hide all service details
    document.querySelectorAll('.service-detail').forEach(function (element) {
        element.style.display = 'none';
    });

    // Show the clicked service detail
    document.getElementById('service-' + serviceId).style.display = 'flex';
}

// Initially show all services
window.onload = function () {
    document.querySelectorAll('.service-detail').forEach(function (element) {
        element.style.display = 'flex';
    });
}
function showQuantity(serviceId) {
    document.getElementById('quantity-' + serviceId).classList.remove('d-none');
    document.getElementById('addBtn-' + serviceId).classList.add('d-none');
}

function updateQuantity(serviceId, delta) {
    var quantityElement = document.getElementById('quantity-value-' + serviceId);
    var currentQuantity = parseInt(quantityElement.textContent);
    var newQuantity = currentQuantity + delta;
    if (newQuantity > 0) {
        quantityElement.textContent = newQuantity;
    }
    if (newQuantity == 0) {
        document.getElementById('quantity-' + serviceId).classList.add('d-none');
        document.getElementById('addBtn-' + serviceId).classList.remove('d-none');
    }
}