document.addEventListener('DOMContentLoaded', function () {
    const menuToggle = document.querySelector('.menu-toggle');
    const navList = document.querySelector('.nav-list');
    const dropdownItems = document.querySelectorAll('.nav-item.dropdown');

    if (menuToggle && navList) {
        // Menu mobile toggle
        menuToggle.addEventListener('click', function () {
            navList.classList.toggle('active');
            menuToggle.classList.toggle('active');
        });
    }

    // Dropdown toggle
    dropdownItems.forEach(item => {
        const link = item.querySelector('.nav-link');
        const dropdownMenu = item.querySelector('.dropdown-menu');

        link.addEventListener('click', function (e) {
            e.preventDefault();

            // Fecha outros dropdowns abertos
            dropdownItems.forEach(otherItem => {
                if (otherItem !== item) {
                    const otherDropdown = otherItem.querySelector('.dropdown-menu');
                    otherDropdown.classList.remove('active');
                }
            });

            // Toggle do dropdown atual
            dropdownMenu.classList.toggle('active');
        });
    });

    // Fechar dropdowns e menu ao clicar fora
    document.addEventListener('click', function (e) {
        if (!e.target.closest('.nav-item.dropdown')) {
            dropdownItems.forEach(item => {
                const dropdownMenu = item.querySelector('.dropdown-menu');
                dropdownMenu.classList.remove('active');
            });
        }

        if (!e.target.closest('.navbar')) {
            if (menuToggle && navList) {
                navList.classList.remove('active');
                menuToggle.classList.remove('active');
            }
        }
    });

    // Fechar o menu e dropdowns ao redimensionar para desktop
    window.addEventListener('resize', function () {
        if (window.innerWidth > 768 && navList.classList.contains('active')) {
            navList.classList.remove('active');
            menuToggle.classList.remove('active');

            dropdownItems.forEach(item => {
                const dropdownMenu = item.querySelector('.dropdown-menu');
                dropdownMenu.classList.remove('active');
            });
        }
    });
});
