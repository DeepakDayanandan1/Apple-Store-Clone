<?php
/**
 * Apple Global Navigation Bar
 * Desktop bar, Mobile slide-down drawer, Search overlay, and Bag flyout
 */
?>
<header class="globalnav-header" id="globalnav" role="banner">
    <div class="globalnav-container">
        <nav class="globalnav-nav" aria-label="Global Navigation">
            
            <!-- Mobile Menu Toggle Button -->
            <button class="globalnav-menu-btn" id="mobile-menu-toggle" aria-label="Toggle navigation menu" aria-expanded="false" aria-controls="mobile-menu-drawer">
                <span class="menu-line line-1"></span>
                <span class="menu-line line-2"></span>
            </button>

            <!-- Apple Home Icon -->
            <a href="#" class="globalnav-logo" aria-label="Apple India Home">
                <img src="assets/icons/apple.svg" alt="Apple" class="nav-svg-icon logo-icon" width="16" height="44">
            </a>

            <!-- Desktop Links -->
            <ul class="globalnav-links" id="desktop-links">
                <li class="globalnav-item"><a href="#store" class="globalnav-link current">Store</a></li>
                <li class="globalnav-item"><a href="#mac" class="globalnav-link">Mac</a></li>
                <li class="globalnav-item"><a href="#ipad" class="globalnav-link">iPad</a></li>
                <li class="globalnav-item"><a href="#iphone" class="globalnav-link">iPhone</a></li>
                <li class="globalnav-item"><a href="#watch" class="globalnav-link">Watch</a></li>
                <li class="globalnav-item"><a href="#airpods" class="globalnav-link">AirPods</a></li>
                <li class="globalnav-item"><a href="#tv-home" class="globalnav-link">TV &amp; Home</a></li>
                <li class="globalnav-item"><a href="#entertainment" class="globalnav-link">Entertainment</a></li>
                <li class="globalnav-item"><a href="#accessories" class="globalnav-link">Accessories</a></li>
                <li class="globalnav-item"><a href="#support" class="globalnav-link">Support</a></li>
            </ul>

            <!-- Navigation Actions: Search & Bag -->
            <div class="globalnav-actions">
                <button class="globalnav-action-btn search-trigger" id="search-toggle" aria-label="Search apple.com">
                    <img src="assets/icons/search.svg" alt="Search" class="nav-svg-icon" width="16" height="44">
                </button>
                <button class="globalnav-action-btn bag-trigger" id="bag-toggle" aria-label="Shopping Bag">
                    <img src="assets/icons/bag.svg" alt="Bag" class="nav-svg-icon" width="16" height="44">
                    <span class="nav-bag-count" id="bag-count" style="display: none;">0</span>
                </button>
            </div>

        </nav>
    </div>

    <!-- Mobile Navigation Drawer -->
    <div class="mobile-menu-drawer" id="mobile-menu-drawer" aria-hidden="true">
        <div class="mobile-menu-inner">
            <ul class="mobile-menu-list">
                <li class="mobile-menu-item"><a href="#store" class="mobile-menu-link active">Store</a></li>
                <li class="mobile-menu-item"><a href="#mac" class="mobile-menu-link">Mac</a></li>
                <li class="mobile-menu-item"><a href="#ipad" class="mobile-menu-link">iPad</a></li>
                <li class="mobile-menu-item"><a href="#iphone" class="mobile-menu-link">iPhone</a></li>
                <li class="mobile-menu-item"><a href="#watch" class="mobile-menu-link">Watch</a></li>
                <li class="mobile-menu-item"><a href="#airpods" class="mobile-menu-link">AirPods</a></li>
                <li class="mobile-menu-item"><a href="#tv-home" class="mobile-menu-link">TV &amp; Home</a></li>
                <li class="mobile-menu-item"><a href="#entertainment" class="mobile-menu-link">Entertainment</a></li>
                <li class="mobile-menu-item"><a href="#accessories" class="mobile-menu-link">Accessories</a></li>
                <li class="mobile-menu-item"><a href="#support" class="mobile-menu-link">Support</a></li>
            </ul>
        </div>
    </div>

    <!-- Search Overlay Box -->
    <div class="search-overlay" id="search-overlay" aria-hidden="true">
        <div class="search-overlay-container">
            <div class="search-bar">
                <img src="assets/icons/search.svg" alt="" class="search-bar-icon" width="16" height="16">
                <input type="text" id="store-search-input" class="search-bar-input" placeholder="Search apple.com/in or accessories..." autocomplete="off">
                <button class="search-bar-close" id="search-close-btn" aria-label="Close search">
                    <img src="assets/icons/close.svg" alt="Close" width="16" height="16">
                </button>
            </div>
            
            <div class="search-quick-links" id="search-quick-links">
                <h4 class="quick-links-title">Quick Links</h4>
                <ul class="quick-links-list">
                    <li><a href="#buy-iphone-16-pro">iPhone 16 Pro</a></li>
                    <li><a href="#buy-iphone-16">iPhone 16</a></li>
                    <li><a href="#buy-watch-series-10">Apple Watch Series 10</a></li>
                    <li><a href="#accessories">MagSafe Cases &amp; Accessories</a></li>
                    <li><a href="#buy-airpods-4">AirPods 4</a></li>
                </ul>
            </div>

            <div class="search-results-panel" id="search-results-panel" style="display: none;"></div>
        </div>
    </div>

    <!-- Shopping Bag Flyout Modal -->
    <div class="bag-flyout" id="bag-flyout" aria-hidden="true">
        <div class="bag-flyout-container">
            <div class="bag-header">
                <h3 class="bag-title" id="bag-title-text">Your Bag is empty.</h3>
            </div>
            <div class="bag-items-list" id="bag-items-container">
                <!-- Dynamically populated if items added -->
            </div>
            <div class="bag-empty-notice" id="bag-empty-notice">
                <p class="bag-empty-text">Free delivery and free returns on all orders.</p>
                <div class="bag-quick-actions">
                    <a href="#latest" class="bag-btn-primary">Continue Shopping</a>
                </div>
            </div>
            <div class="bag-links-section">
                <h4 class="bag-links-title">My Profile</h4>
                <ul class="bag-links-list">
                    <li><a href="#orders">Orders</a></li>
                    <li><a href="#your-saves">Your Saves</a></li>
                    <li><a href="#account">Account Settings</a></li>
                    <li><a href="#signin">Sign in</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>
<div class="globalnav-backdrop" id="nav-backdrop"></div>

