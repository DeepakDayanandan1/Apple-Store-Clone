/**
 * Navigation & Interactive Modals
 * Apple Store Clone
 */

document.addEventListener('DOMContentLoaded', () => {
    initNavigation();
    initStoreHover();
    initNavHoverDim();
    initSearch();
    initBag();
    initFooterAccordions();
});

/**
 * Mobile Navigation Drawer
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
            closeStoreFlyout();
        });
    }

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            toggleMenu(true);
            closeSearch();
            closeBag();
            closeStoreFlyout();
        }
    });
}

/**
 * Store Mega-Menu Flyout Hover Controller
 */
let storeHoverTimer = null;

function initStoreHover() {
    const storeItem = document.getElementById('nav-item-store');
    const storeFlyout = document.getElementById('store-flyout');
    const backdrop = document.getElementById('nav-backdrop');

    if (!storeItem || !storeFlyout) return;

    function openFlyout() {
        clearTimeout(storeHoverTimer);
        if (window.innerWidth <= 834) return;

        storeFlyout.classList.add('is-open');
        if (backdrop) backdrop.classList.add('active');
        closeSearch();
        closeBag();
    }

    function closeFlyoutWithDelay() {
        clearTimeout(storeHoverTimer);
        storeHoverTimer = setTimeout(() => {
            storeFlyout.classList.remove('is-open');
            if (backdrop && !isSearchOpen() && !isBagOpen()) {
                backdrop.classList.remove('active');
            }
        }, 180);
    }

    storeItem.addEventListener('mouseenter', openFlyout);
    storeItem.addEventListener('mouseleave', closeFlyoutWithDelay);

    storeFlyout.addEventListener('mouseenter', () => clearTimeout(storeHoverTimer));
    storeFlyout.addEventListener('mouseleave', closeFlyoutWithDelay);
}

function closeStoreFlyout() {
    const storeFlyout = document.getElementById('store-flyout');
    if (storeFlyout) storeFlyout.classList.remove('is-open');
}

/**
 * Desktop Nav Sibling Dimming
 */
function initNavHoverDim() {
    const nav = document.getElementById('globalnav-nav') || document.querySelector('.globalnav-nav');
    const navItems = document.querySelectorAll('.globalnav-item, .globalnav-actions');

    if (!nav || navItems.length === 0) return;

    navItems.forEach(item => {
        item.addEventListener('mouseenter', () => {
            if (window.innerWidth <= 834) return;
            nav.classList.add('has-hover');
            item.classList.add('is-hovered');
        });

        item.addEventListener('mouseleave', () => {
            nav.classList.remove('has-hover');
            item.classList.remove('is-hovered');
        });
    });
}

/**
 * Search Modal Controller
 */
function initSearch() {
    const searchTriggers = document.querySelectorAll('.search-trigger');
    const searchOverlay = document.getElementById('search-overlay');
    const searchClose = document.getElementById('search-close-btn') || document.getElementById('search-close');
    const searchInput = document.getElementById('store-search-input') || document.getElementById('search-input');
    const backdrop = document.getElementById('nav-backdrop');
    const quickLinks = document.getElementById('search-quick-links');
    const resultsPanel = document.getElementById('search-results-panel') || document.getElementById('search-results');

    if (!searchOverlay) return;

    searchTriggers.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.stopPropagation();
            const isOpen = searchOverlay.classList.contains('active');
            if (isOpen) {
                closeSearch();
            } else {
                closeBag();
                closeStoreFlyout();
                searchOverlay.classList.add('active');
                if (backdrop) backdrop.classList.add('active');
                if (searchInput) {
                    setTimeout(() => searchInput.focus(), 100);
                }
            }
        });
    });

    if (searchClose) {
        searchClose.addEventListener('click', closeSearch);
    }

    if (searchInput && resultsPanel && quickLinks) {
        searchInput.addEventListener('input', (e) => {
            const query = e.target.value.trim().toLowerCase();
            if (query.length > 0) {
                quickLinks.style.display = 'none';
                resultsPanel.style.display = 'block';

                const rows = resultsPanel.querySelectorAll('.search-result-row');
                let hasResults = false;
                rows.forEach(row => {
                    const text = row.textContent.toLowerCase();
                    if (text.includes(query)) {
                        row.style.display = 'flex';
                        hasResults = true;
                    } else {
                        row.style.display = 'none';
                    }
                });

                let noResultsMsg = document.getElementById('no-search-results');
                if (!hasResults && rows.length > 0) {
                    if (!noResultsMsg) {
                        noResultsMsg = document.createElement('p');
                        noResultsMsg.id = 'no-search-results';
                        noResultsMsg.style.padding = '12px 0';
                        noResultsMsg.style.color = '#86868b';
                        noResultsMsg.textContent = 'No matching products found.';
                        resultsPanel.appendChild(noResultsMsg);
                    }
                } else if (noResultsMsg) {
                    noResultsMsg.remove();
                }
            } else {
                quickLinks.style.display = 'block';
                resultsPanel.style.display = 'none';
            }
        });
    }
}

function closeSearch() {
    const searchOverlay = document.getElementById('search-overlay');
    const backdrop = document.getElementById('nav-backdrop');
    const searchInput = document.getElementById('store-search-input') || document.getElementById('search-input');

    if (searchOverlay) {
        searchOverlay.classList.remove('active');
    }
    if (searchInput) {
        searchInput.value = '';
    }
    if (backdrop && !isBagOpen() && !isStoreFlyoutOpen()) {
        backdrop.classList.remove('active');
    }
}

function isSearchOpen() {
    const el = document.getElementById('search-overlay');
    return el && el.classList.contains('active');
}

/**
 * Shopping Bag Flyout Controller
 */
function initBag() {
    const bagTriggers = document.querySelectorAll('.bag-trigger');
    const bagFlyout = document.getElementById('bag-flyout');
    const backdrop = document.getElementById('nav-backdrop');

    if (!bagFlyout) return;

    bagTriggers.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.stopPropagation();
            const isOpen = bagFlyout.classList.contains('active');
            if (isOpen) {
                closeBag();
            } else {
                closeSearch();
                closeStoreFlyout();
                bagFlyout.classList.add('active');
                if (backdrop) backdrop.classList.add('active');
            }
        });
    });

    document.addEventListener('click', (e) => {
        let isClickInsideTrigger = false;
        bagTriggers.forEach(t => {
            if (t.contains(e.target)) isClickInsideTrigger = true;
        });

        if (!bagFlyout.contains(e.target) && !isClickInsideTrigger) {
            closeBag();
        }
    });
}

function closeBag() {
    const bagFlyout = document.getElementById('bag-flyout');
    const backdrop = document.getElementById('nav-backdrop');
    if (bagFlyout) bagFlyout.classList.remove('active');
    if (backdrop && !isSearchOpen() && !isStoreFlyoutOpen()) {
        backdrop.classList.remove('active');
    }
}

function isBagOpen() {
    const el = document.getElementById('bag-flyout');
    return el && el.classList.contains('active');
}

function isStoreFlyoutOpen() {
    const el = document.getElementById('store-flyout');
    return el && el.classList.contains('is-open');
}

/**
 * Footer Directory Accordion
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
