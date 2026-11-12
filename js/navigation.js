/**
 * Navigation & Interactive Modals
 * Apple Store Clone
 */

document.addEventListener('DOMContentLoaded', () => {
    initNavigation();
    initMegaMenuHover();
    initSearchLogic();
    initFooterAccordions();
});

/**
 * Mobile Navigation Drawer (<= 834px)
 */
function initNavigation() {
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
        }
    }

    menuToggle.addEventListener('click', () => toggleMenu());

    if (backdrop) {
        backdrop.addEventListener('click', () => {
            toggleMenu(true);
        });
    }

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            toggleMenu(true);
        }
    });
}

/**
 * Unified Desktop Mega-Menu Hover & Flyout Controller
 * Supports: Store, Mac, iPad, iPhone, Watch, AirPods, Home, Entertainment, Accessories, Support, Search, and Bag
 */
function initMegaMenuHover() {
    const nav = document.getElementById('globalnav-nav') || document.querySelector('.globalnav-nav');
    const navItems = document.querySelectorAll('.globalnav-item[data-nav]');
    const flyouts = document.querySelectorAll('.globalnav-flyout[data-flyout]');
    const backdrop = document.getElementById('nav-backdrop');

    if (!navItems.length || !flyouts.length) return;

    let hoverTimer = null;
    let activeNavKey = null;

    function openFlyout(key) {
        if (window.innerWidth <= 834) return;
        clearTimeout(hoverTimer);

        activeNavKey = key;
        if (nav) nav.classList.add('has-hover');

        // Highlight active nav item and dim siblings
        navItems.forEach(item => {
            if (item.getAttribute('data-nav') === key) {
                item.classList.add('is-hovered');
            } else {
                item.classList.remove('is-hovered');
            }
        });

        // Activate corresponding flyout
        let hasActiveFlyout = false;
        flyouts.forEach(flyout => {
            if (flyout.getAttribute('data-flyout') === key) {
                flyout.classList.add('is-active');
                hasActiveFlyout = true;
            } else {
                flyout.classList.remove('is-active');
            }
        });

        // Activate frosted backdrop
        if (backdrop && hasActiveFlyout) {
            backdrop.classList.add('active');
        }

        // Auto-focus search input if search panel opened
        if (key === 'search') {
            const searchInput = document.getElementById('store-search-input');
            if (searchInput) {
                setTimeout(() => searchInput.focus(), 60);
            }
        }
    }

    function scheduleClose() {
        clearTimeout(hoverTimer);
        hoverTimer = setTimeout(() => {
            closeAllFlyouts();
        }, 180);
    }

    function closeAllFlyouts() {
        clearTimeout(hoverTimer);
        activeNavKey = null;

        if (nav) nav.classList.remove('has-hover');
        navItems.forEach(item => item.classList.remove('is-hovered'));
        flyouts.forEach(flyout => flyout.classList.remove('is-active'));

        if (backdrop) backdrop.classList.remove('active');
    }

    // Attach mouseenter & mouseleave to each nav item
    navItems.forEach(item => {
        const key = item.getAttribute('data-nav');
        if (!key) return;

        item.addEventListener('mouseenter', () => openFlyout(key));
        item.addEventListener('mouseleave', scheduleClose);

        // Click / toggle behavior
        item.addEventListener('click', (e) => {
            if (window.innerWidth > 834) {
                if (key === 'search' || key === 'bag') {
                    e.preventDefault();
                    if (activeNavKey === key) {
                        closeAllFlyouts();
                    } else {
                        openFlyout(key);
                    }
                }
            }
        });
    });

    // Keep active when cursor hovers over the flyout panel itself
    flyouts.forEach(flyout => {
        flyout.addEventListener('mouseenter', () => clearTimeout(hoverTimer));
        flyout.addEventListener('mouseleave', scheduleClose);
    });

    // Backdrop click closes all flyouts
    if (backdrop) {
        backdrop.addEventListener('click', () => closeAllFlyouts());
    }

    // Escape key closes all flyouts
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeAllFlyouts();
    });

    // Close button inside search panel
    const searchCloseBtn = document.getElementById('search-close-btn');
    if (searchCloseBtn) {
        searchCloseBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            closeAllFlyouts();
        });
    }

    // Close flyouts on window resize to mobile
    window.addEventListener('resize', () => {
        if (window.innerWidth <= 834) {
            closeAllFlyouts();
        }
    });
}

/**
 * Search Panel Live Search Logic
 */
function initSearchLogic() {
    const searchInput = document.getElementById('store-search-input');
    const quickLinks = document.querySelector('.search-quick-links');
    const resultsPanel = document.getElementById('search-results-panel');

    if (!searchInput || !resultsPanel) return;

    searchInput.addEventListener('input', (e) => {
        const query = e.target.value.trim().toLowerCase();
        if (query.length > 0) {
            if (quickLinks) quickLinks.style.display = 'none';
            resultsPanel.style.display = 'block';

            // Filter any spotlight or catalog products
            const allProducts = document.querySelectorAll('.product-showcase-card, .accessory-product-card');
            let resultsHTML = '';
            let matchCount = 0;

            allProducts.forEach(card => {
                const name = card.getAttribute('data-product-name') || card.querySelector('.card-headline-text, .accessory-title')?.textContent || '';
                const price = card.querySelector('.card-price-text, .accessory-price')?.textContent || '';
                const img = card.querySelector('img')?.getAttribute('src') || '';

                if (name.toLowerCase().includes(query) && matchCount < 6) {
                    matchCount++;
                    resultsHTML += `
                        <div class="search-result-row">
                            <img src="${img}" alt="${name}" class="search-result-thumb">
                            <div class="search-result-info">
                                <h4>${name}</h4>
                                <p>${price}</p>
                            </div>
                        </div>
                    `;
                }
            });

            if (matchCount > 0) {
                resultsPanel.innerHTML = resultsHTML;
            } else {
                resultsPanel.innerHTML = `<p style="padding: 12px 0; color: #86868b; font-size: 14px;">No matching products found for "${query}".</p>`;
            }
        } else {
            if (quickLinks) quickLinks.style.display = 'block';
            resultsPanel.style.display = 'none';
            resultsPanel.innerHTML = '';
        }
    });
}

/**
 * Footer Directory Accordion (Tablet & Mobile <= 834px)
 */
function initFooterAccordions() {
    const sections = document.querySelectorAll('.directory-section');

    sections.forEach(section => {
        const title = section.querySelector('.directory-title');
        if (!title) return;

        title.addEventListener('click', () => {
            if (window.innerWidth > 834) return;
            const isOpen = section.classList.contains('open');

            sections.forEach(s => {
                if (s !== section) s.classList.remove('open');
            });

            if (isOpen) {
                section.classList.remove('open');
            } else {
                section.classList.add('open');
            }
        });
    });
}
