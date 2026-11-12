/**
 * Carousel Controller
 * Apple Store Clone
 */

document.addEventListener('DOMContentLoaded', () => {
    initCarousels();
});

function initCarousels() {
    const controls = document.querySelectorAll('.carousel-arrow');

    controls.forEach(btn => {
        btn.addEventListener('click', () => {
            const carouselId = btn.getAttribute('data-carousel-id');
            const track = document.getElementById(carouselId);
            if (!track) return;

            // Compute card scroll distance dynamically based on first card's width + gap
            const firstCard = track.querySelector('.store-card');
            const cardWidth = firstCard ? firstCard.offsetWidth + 20 : 420;
            const direction = btn.classList.contains('next') ? 1 : -1;

            track.scrollBy({
                left: direction * cardWidth,
                behavior: 'smooth'
            });
        });
    });

    // Update arrow disabled states based on scroll position
    const tracks = document.querySelectorAll('.carousel-track');
    tracks.forEach(track => {
        const updateArrows = () => {
            const carouselId = track.id;
            const prevBtn = document.querySelector(`.carousel-arrow.prev[data-carousel-id="${carouselId}"]`);
            const nextBtn = document.querySelector(`.carousel-arrow.next[data-carousel-id="${carouselId}"]`);

            if (prevBtn) {
                prevBtn.disabled = track.scrollLeft <= 5;
            }
            if (nextBtn) {
                const maxScrollLeft = track.scrollWidth - track.clientWidth - 5;
                nextBtn.disabled = track.scrollLeft >= maxScrollLeft;
            }
        };

        track.addEventListener('scroll', updateArrows, { passive: true });
        window.addEventListener('resize', updateArrows);
        
        // Initial state check
        updateArrows();
    });
}

