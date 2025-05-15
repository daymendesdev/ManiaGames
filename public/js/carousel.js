document.addEventListener('DOMContentLoaded', function() {
    const track = document.querySelector('.carousel-track');
    const slides = document.querySelectorAll('.carousel-slide');
    const prevButton = document.querySelector('.carousel-button.prev');
    const nextButton = document.querySelector('.carousel-button.next');
    
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
        const gap = 20; // gap entre os slides
        const offset = currentIndex * (slideWidth + gap);
        track.style.transform = `translateX(-${offset}px)`;
        
        // Atualiza estado dos botões
        prevButton.disabled = currentIndex === 0;
        nextButton.disabled = currentIndex >= totalSlides - slidesPerView;
        
        // Adiciona/remove classe de desabilitado
        prevButton.style.opacity = prevButton.disabled ? '0.5' : '1';
        nextButton.style.opacity = nextButton.disabled ? '0.5' : '1';
        prevButton.style.pointerEvents = prevButton.disabled ? 'none' : 'auto';
        nextButton.style.pointerEvents = nextButton.disabled ? 'none' : 'auto';
    }
    
    prevButton.addEventListener('click', () => {
        if (currentIndex > 0) {
            currentIndex--;
            updateCarousel();
        }
    });
    
    nextButton.addEventListener('click', () => {
        if (currentIndex < totalSlides - slidesPerView) {
            currentIndex++;
            updateCarousel();
        }
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
            if (diff > 0 && currentIndex < totalSlides - slidesPerView) {
                // Swipe left
                currentIndex++;
            } else if (diff < 0 && currentIndex > 0) {
                // Swipe right
                currentIndex--;
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