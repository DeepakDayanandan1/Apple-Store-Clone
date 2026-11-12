/**
 * Apple Store India Clone - Master JavaScript
 * Core interactive controller
 */

document.addEventListener('DOMContentLoaded', () => {
    initColorSwatches();
    initBagButtons();
});

/**
 * Interactive Color Swatches for Accessories
 */
function initColorSwatches() {
    const swatchRows = document.querySelectorAll('.accessory-swatches-row');

    swatchRows.forEach(row => {
        const swatches = row.querySelectorAll('.swatch-dot');
        const card = row.closest('.accessory-product-card');
        const img = card ? card.querySelector('.accessory-product-img') : null;

        swatches.forEach(swatch => {
            swatch.addEventListener('click', (e) => {
                e.stopPropagation();
                swatches.forEach(s => s.classList.remove('active'));
                swatch.classList.add('active');

                // Animate image with subtle pop on color change
                if (img) {
                    img.style.transform = 'scale(0.95)';
                    setTimeout(() => {
                        img.style.transform = '';
                    }, 150);
                }
            });
        });
    });
}

/**
 * Add to Bag Button Interactive Feedback
 */
function initBagButtons() {
    const addButtons = document.querySelectorAll('.accessory-add-btn');
    const bagCount = document.getElementById('bag-count');

    addButtons.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.stopPropagation();
            e.preventDefault();

            if (bagCount) {
                let current = parseInt(bagCount.textContent, 10) || 0;
                current += 1;
                bagCount.textContent = current;
                bagCount.style.display = 'flex';

                // Subtle button animation
                btn.style.transform = 'scale(1.25)';
                setTimeout(() => {
                    btn.style.transform = '';
                }, 200);
            }
        });
    });
}
