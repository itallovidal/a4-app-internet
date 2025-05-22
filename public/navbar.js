window.onload = function () {
    console.log("Hello World");

    const navbarToggle = document.querySelector('#navbar-button-toggle');
    const closeNavbarToggle = document.querySelector('.close-mobile-nav');

    closeNavbarToggle.addEventListener('click', function () {
        const navbar = document.querySelector('#navbar-wrapper');
        navbar.classList.toggle('toggled');
    })

    navbarToggle.addEventListener('click', function () {
        const navbar = document.querySelector('#navbar-wrapper');
        navbar.classList.toggle('toggled');
    })

}