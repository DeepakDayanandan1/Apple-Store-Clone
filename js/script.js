/**
 * Apple Store India Clone - Master JavaScript
 * Vanilla ES6+ without third-party dependencies for maximum performance
 */

document.addEventListener('DOMContentLoaded', () => {
    initCarousels();
    initMobileNav();
    initSearch();
    initBag();
    initColorSwatches();
    initFooterAccordions();
    initStoreHover();
    initNavHoverDim();
});

/* ==========================================================================
   1. Carousel Controller
   ========================================================================== */
function initCarousels() {
    const controls = document.querySelectorAll('.carousel-arrow');

    controls.forEach(btn => {
        btn.addEventListener('click', () => {
            const carouselId = btn.getAttribute('data-carousel-id');
            const track = document.getElementById(carouselId);
            if (!track) return;

            // Calculate card scroll distance based on first card's width + gap
            const firstCard = track.querySelector('.store-card');
            const cardWidth = firstCard ? firstCard.offsetWidth + 20 : 420;
            const direction = btn.classList.contains('next') ? 1 : -1;

            track.scrollBy({
                left: direction * cardWidth,
                behavior: 'smooth'
            });
        });
    });

    // Update arrow states based on scroll position
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
        // Initial check
        updateArrows();
    });
}

/* ==========================================================================
   2. Mobile Navigation Drawer
   ========================================================================== */
function initMobileNav() {
    const menuToggle = document.getElementById('mobile-menu-toggle');
    const drawer = document.getElementById('mobile-menu-drawer');
    const backdrop = document.getElementById('nav-backdrop');

    if (!menuToggle || !drawer) return;

    function toggleMenu(forceClose = false) {
        const isOpen = forceClose ? true : menuToggle.classList.contains('open');

        if (isOpen) {
            menuToggle.classList.remove('open');
            menuToggle.setAttribute('aria-expanded', 'false');
            drawer.classList.remove('open');
            drawer.setAttribute('aria-hidden', 'true');
            if (backdrop) backdrop.classList.remove('active');
            document.body.style.overflow = '';
        } else {
            menuToggle.classList.add('open');
            menuToggle.setAttribute('aria-expanded', 'true');
            drawer.classList.add('open');
            drawer.setAttribute('aria-hidden', 'false');
            if (backdrop) backdrop.classList.add('active');
            document.body.style.overflow = 'hidden';

            // Close other modals
            closeSearch();
            closeBag();
        }
    }

    menuToggle.addEventListener('click', () => toggleMenu());

    if (backdrop) {
        backdrop.addEventListener('click', () => {
            toggleMenu(true);
            closeSearch();
            closeBag();
        });
    }

    // Close mobile nav when clicking a link
    const mobileLinks = drawer.querySelectorAll('.mobile-menu-link');
    mobileLinks.forEach(link => {
        link.addEventListener('click', () => toggleMenu(true));
    });
}

/* ==========================================================================
   3. Search Overlay & Client-side Filtering
   ========================================================================== */
let searchData = [];

function initSearch() {
    const searchToggle = document.getElementById('search-toggle');
    const searchOverlay = document.getElementById('search-overlay');
    const searchClose = document.getElementById('search-close-btn');
    const searchInput = document.getElementById('store-search-input');
    const quickLinks = document.getElementById('search-quick-links');
    const resultsPanel = document.getElementById('search-results-panel');
    const backdrop = document.getElementById('nav-backdrop');

    if (!searchOverlay || !searchInput) return;

    // Collect searchable items from page DOM
    const cardElements = document.querySelectorAll('.store-card');
    cardElements.forEach(card => {
        const headline = card.querySelector('.card-headline-text, .accessory-title')?.textContent?.trim();
        const eyebrow = card.querySelector('.card-eyebrow-text')?.textContent?.trim() || '';
        const price = card.querySelector('.card-price-text, .accessory-price')?.textContent?.trim() || '';
        const img = card.querySelector('img')?.getAttribute('src') || '';
        const url = card.querySelector('a')?.getAttribute('href') || '#';

        if (headline) {
            searchData.push({
                title: headline,
                eyebrow: eyebrow,
                price: price,
                image: img,
                url: url
            });
        }
    });

    document.querySelectorAll('.search-trigger').forEach(trigger => {
        trigger.addEventListener('click', (e) => {
            e.preventDefault();
            const isActive = searchOverlay.classList.contains('active');
            if (isActive) {
                closeSearch();
            } else {
                closeBag();
                searchOverlay.classList.add('active');
                searchOverlay.setAttribute('aria-hidden', 'false');
                if (backdrop) backdrop.classList.add('active');
                searchInput.focus();
            }
        });
    });

    if (searchClose) {
        searchClose.addEventListener('click', closeSearch);
    }

    searchInput.addEventListener('input', (e) => {
        const query = e.target.value.trim().toLowerCase();

        if (query.length === 0) {
            quickLinks.style.display = 'block';
            resultsPanel.style.display = 'none';
            resultsPanel.innerHTML = '';
            return;
        }

        quickLinks.style.display = 'none';
        resultsPanel.style.display = 'block';

        const filtered = searchData.filter(item => 
            item.title.toLowerCase().includes(query) || 
            item.eyebrow.toLowerCase().includes(query)
        ).slice(0, 5);

        if (filtered.length === 0) {
            resultsPanel.innerHTML = `<p style="padding: 14px 0; color: #86868b; font-size: 14px;">No products found for "${query}".</p>`;
        } else {
            resultsPanel.innerHTML = filtered.map(item => `
                <a href="${item.url}" class="search-result-row">
                    ${item.image ? `<img src="${item.image}" alt="${item.title}" class="search-result-thumb">` : ''}
                    <div class="search-result-info">
                        <h4>${item.title}</h4>
                        ${item.price ? `<p>${item.price}</p>` : ''}
                    </div>
                </a>
            `).join('');
        }
    });

    // Close on Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            closeSearch();
            closeBag();
        }
    });
}

function closeSearch() {
    const searchOverlay = document.getElementById('search-overlay');
    const backdrop = document.getElementById('nav-backdrop');
    if (searchOverlay) {
        searchOverlay.classList.remove('active');
        searchOverlay.setAttribute('aria-hidden', 'true');
    }
    if (backdrop && !document.getElementById('bag-flyout')?.classList.contains('active')) {
        backdrop.classList.remove('active');
    }
}

/* ==========================================================================
   4. Shopping Bag Drawer
   ========================================================================== */
let cartItems = [];

function initBag() {
    const bagToggle = document.getElementById('bag-toggle');
    const bagFlyout = document.getElementById('bag-flyout');
    const backdrop = document.getElementById('nav-backdrop');

    if (!bagFlyout) return;

    // Load cart from localStorage
    try {
        const stored = localStorage.getItem('apple_store_cart');
        if (stored) {
            cartItems = JSON.parse(stored);
        }
    } catch (e) {
        cartItems = [];
    }
    renderBagUI();

    document.querySelectorAll('.bag-trigger').forEach(trigger => {
        trigger.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            const isActive = bagFlyout.classList.contains('active');
            if (isActive) {
                closeBag();
            } else {
                closeSearch();
                bagFlyout.classList.add('active');
                bagFlyout.setAttribute('aria-hidden', 'false');
                if (backdrop) backdrop.classList.add('active');
            }
        });
    });

    // Handle "Add to Bag" button clicks on accessory cards
    document.querySelectorAll('.accessory-add-btn').forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.stopPropagation();
            const card = btn.closest('.accessory-product-card');
            if (!card) return;

            const name = card.getAttribute('data-product-name');
            const price = card.getAttribute('data-product-price');
            const img = card.getAttribute('data-product-image');
            const activeSwatch = card.querySelector('.swatch-dot.active');
            const color = activeSwatch ? activeSwatch.getAttribute('data-color-name') : '';

            const item = {
                id: Date.now(),
                name: name,
                price: parseFloat(price) || 0,
                color: color,
                image: img
            };

            cartItems.push(item);
            saveCart();
            renderBagUI();

            // Open bag flyout briefly to show user item was added
            bagFlyout.classList.add('active');
            bagFlyout.setAttribute('aria-hidden', 'false');
            if (backdrop) backdrop.classList.add('active');
        });
    });

    // Close bag when clicking outside
    document.addEventListener('click', (e) => {
        if (!bagFlyout.contains(e.target) && !bagToggle.contains(e.target)) {
            closeBag();
        }
    });
}

function saveCart() {
    try {
        localStorage.setItem('apple_store_cart', JSON.stringify(cartItems));
    } catch (e) {}
}

function renderBagUI() {
    const countBadge = document.getElementById('bag-count');
    const titleText = document.getElementById('bag-title-text');
    const container = document.getElementById('bag-items-container');
    const emptyNotice = document.getElementById('bag-empty-notice');

    const totalCount = cartItems.length;

    const countBadges = document.querySelectorAll('.nav-bag-count');
    countBadges.forEach(badge => {
        if (totalCount > 0) {
            badge.textContent = totalCount;
            badge.style.display = 'flex';
        } else {
            badge.style.display = 'none';
        }
    });

    if (!container || !titleText || !emptyNotice) return;

    if (totalCount === 0) {
        titleText.textContent = 'Your Bag is empty.';
        container.innerHTML = '';
        emptyNotice.style.display = 'block';
    } else {
        titleText.textContent = `Your Bag (${totalCount})`;
        emptyNotice.style.display = 'none';

        container.innerHTML = cartItems.map(item => `
            <div class="bag-cart-item">
                <img src="${item.image}" alt="${item.name}">
                <div class="bag-cart-details">
                    <h4>${item.name}</h4>
                    ${item.color ? `<p>Color: ${item.color}</p>` : ''}
                    <p>₹${item.price.toLocaleString('en-IN')}</p>
                </div>
                <button type="button" class="bag-item-remove" onclick="removeCartItem(${item.id})" aria-label="Remove item">Remove</button>
            </div>
        `).join('') + `
            <div style="margin-top: 14px;">
                <a href="#checkout" class="bag-btn-primary">Review Bag &amp; Checkout</a>
            </div>
        `;
    }
}

window.removeCartItem = function(id) {
    cartItems = cartItems.filter(item => item.id !== id);
    saveCart();
    renderBagUI();
};

function closeBag() {
    const bagFlyout = document.getElementById('bag-flyout');
    const backdrop = document.getElementById('nav-backdrop');
    if (bagFlyout) {
        bagFlyout.classList.remove('active');
        bagFlyout.setAttribute('aria-hidden', 'true');
    }
    if (backdrop && !document.getElementById('search-overlay')?.classList.contains('active')) {
        backdrop.classList.remove('active');
    }
}

/* ==========================================================================
   5. Interactive Color Swatches
   ========================================================================== */
function initColorSwatches() {
    document.querySelectorAll('.accessory-swatches-row').forEach(row => {
        const swatches = row.querySelectorAll('.swatch-dot');
        swatches.forEach(swatch => {
            swatch.addEventListener('click', (e) => {
                e.stopPropagation();
                swatches.forEach(s => s.classList.remove('active'));
                swatch.classList.add('active');
            });
        });
    });
}

/* ==========================================================================
   6. Mobile Footer Accordion
   ========================================================================== */
function initFooterAccordions() {
    const titles = document.querySelectorAll('.directory-title');
    titles.forEach(title => {
        title.addEventListener('click', () => {
            // Only toggle on smaller viewports
            if (window.innerWidth <= 834) {
                const section = title.closest('.directory-section');
                if (section) {
                    section.classList.toggle('open');
                }
            }
        });

        // Accessibility: allow Enter/Space to expand accordion
        title.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                title.click();
            }
        });
    });
}

/* ==========================================================================
   7. Store Hover Mega-Menu Flyout
   ========================================================================== */
function initStoreHover() {
    const storeItem  = document.getElementById('nav-item-store');
    const storeFlyout = document.getElementById('store-flyout');
    if (!storeItem || !storeFlyout) return;

    let hideTimer = null;

    function showFlyout() {
        clearTimeout(hideTimer);
        storeFlyout.classList.add('flyout-open');
    }

    function hideFlyout() {
        hideTimer = setTimeout(() => {
            storeFlyout.classList.remove('flyout-open');
        }, 150);
    }

    // Store nav item
    storeItem.addEventListener('mouseenter', showFlyout);
    storeItem.addEventListener('mouseleave', hideFlyout);

    // Keep flyout open when mouse moves into the panel itself
    storeFlyout.addEventListener('mouseenter', () => clearTimeout(hideTimer));
    storeFlyout.addEventListener('mouseleave', hideFlyout);

    // Also close if Escape is pressed
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            storeFlyout.classList.remove('flyout-open');
        }
    });
}

/* ==========================================================================
   8. Nav Sibling Dimming on Hover
   ========================================================================== */
function initNavHoverDim() {
    const navList  = document.querySelector('.globalnav-list');
    const navItems = document.querySelectorAll('.globalnav-list > .globalnav-item');
    if (!navList || navItems.length === 0) return;

    navItems.forEach(item => {
        item.addEventListener('mouseenter', () => {
            navList.classList.add('has-active-hover');
            item.classList.add('hovered');
        });

        item.addEventListener('mouseleave', () => {
            item.classList.remove('hovered');
            // If no other item is hovered, remove the class
            const anyHovered = navList.querySelector('.globalnav-item.hovered');
            if (!anyHovered) {
                navList.classList.remove('has-active-hover');
            }
        });
    });
}

