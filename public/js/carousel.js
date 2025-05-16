document.addEventListener('DOMContentLoaded', function() {
    const tracks = document.querySelectorAll('.carousel-track');
    const prevButtons = document.querySelectorAll('.carousel-button.prev');
    const nextButtons = document.querySelectorAll('.carousel-button.next');
    
    tracks.forEach((track, index) => {
        const slides = track.querySelectorAll('.carousel-slide');
        const prevButton = prevButtons[index];
        const nextButton = nextButtons[index];
        
        let currentIndex = 0;
        let slidesPerView = getSlidesPerView();
        let totalSlides = slides.length;
        
        function getSlidesPerView() {
            if (window.innerWidth <= 576) return 1;
            if (window.innerWidth <= 992) return 2;
            if (window.innerWidth <= 1200) return 3;
            return 4;
        }
        
        function updateCarousel() {
            slidesPerView = getSlidesPerView();
            const slideWidth = slides[0].offsetWidth;
            const gap = 20;
            const offset = currentIndex * (slideWidth + gap);
            track.style.transform = `translateX(-${offset}px)`;
        }
        
        prevButton.addEventListener('click', () => {
            if (currentIndex > 0) {
                currentIndex--;
            } else {
                currentIndex = totalSlides - slidesPerView;
            }
            updateCarousel();
        });
        
        nextButton.addEventListener('click', () => {
            if (currentIndex < totalSlides - slidesPerView) {
                currentIndex++;
            } else {
                currentIndex = 0;
            }
            updateCarousel();
        });
        
        // Adiciona suporte para touch/swipe
        let touchStartX = 0;
        let touchEndX = 0;
        
        track.addEventListener('touchstart', e => {
            touchStartX = e.changedTouches[0].screenX;
        });
        
        track.addEventListener('touchend', e => {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
        });
        
        function handleSwipe() {
            const swipeThreshold = 50;
            const diff = touchStartX - touchEndX;
            
            if (Math.abs(diff) > swipeThreshold) {
                if (diff > 0) {
                    if (currentIndex < totalSlides - slidesPerView) {
                        currentIndex++;
                    } else {
                        currentIndex = 0;
                    }
                } else {
                    if (currentIndex > 0) {
                        currentIndex--;
                    } else {
                        currentIndex = totalSlides - slidesPerView;
                    }
                }
                updateCarousel();
            }
        }
        
        // Inicializa o carrossel
        updateCarousel();
        
        // Atualiza em caso de redimensionamento da janela
        let resizeTimer;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(() => {
                currentIndex = Math.min(currentIndex, totalSlides - getSlidesPerView());
                updateCarousel();
            }, 250);
        });
    });
}); 