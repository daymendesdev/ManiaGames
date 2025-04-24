document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.querySelector('.menu-toggle');
    const navList = document.querySelector('.nav-list');
    const dropdownItems = document.querySelectorAll('.nav-item.dropdown');

    // Menu mobile toggle
    menuToggle.addEventListener('click', function() {
        navList.classList.toggle('active');
        menuToggle.classList.toggle('active');
    });

    // Dropdown toggle
    dropdownItems.forEach(item => {
        const link = item.querySelector('.nav-link');
        
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Fecha outros dropdowns abertos
            dropdownItems.forEach(otherItem => {
                if (otherItem !== item) {
                    otherItem.classList.remove('active');
                    otherItem.querySelector('.dropdown-menu').classList.remove('active');
                }
            });

            // Toggle do dropdown atual
            item.classList.toggle('active');
            const dropdownMenu = item.querySelector('.dropdown-menu');
            dropdownMenu.classList.toggle('active');
        });
    });

    // Fechar o menu quando clicar em um link
    const navLinks = document.querySelectorAll('.nav-link:not(.dropdown > .nav-link)');
    navLinks.forEach(link => {
        link.addEventListener('click', function() {
            navList.classList.remove('active');
            menuToggle.classList.remove('active');
        });
    });
}); 