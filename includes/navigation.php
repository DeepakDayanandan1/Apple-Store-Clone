<?php
/**
 * Apple Global Navigation Bar
 * Desktop bar, Mobile slide-down drawer, Search overlay, and Bag flyout
 */
?>
<header class="globalnav-header" id="globalnav" role="banner">
    <div class="globalnav-container">
        <nav class="globalnav-nav" aria-label="Global Navigation">
            
            <!-- Desktop Navigation: All 13 items unified, max-width 660px, centered -->
            <ul class="globalnav-list" id="desktop-links">
                <!-- 1. Apple Logo -->
                <li class="globalnav-item globalnav-item-apple">
                    <a href="#" class="globalnav-link globalnav-link-apple" aria-label="Apple">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="44" viewBox="0 0 14 44" class="nav-svg-icon" aria-hidden="true">
                            <path fill="currentColor" d="m13.0729 17.6825a3.61 3.61 0 0 0 -1.7248 3.0365 3.5132 3.5132 0 0 0 2.1379 3.2223 8.394 8.394 0 0 1 -1.0948 2.2618c-.6816.9812-1.3943 1.9623-2.4787 1.9623s-1.3633-.63-2.613-.63c-1.2187 0-1.6525.6507-2.644.6507s-1.6834-.9089-2.4787-2.0243a9.7846 9.7846 0 0 1 -1.6628-5.2776c0-3.0984 2.014-4.7405 3.9969-4.7405 1.0535 0 1.9314.6919 2.5924.6919.63 0 1.6112-.7333 2.8092-.7333a3.7579 3.7579 0 0 1 3.1604 1.5802zm-3.7284-2.8918a3.5615 3.5615 0 0 0 .8469-2.22 1.5353 1.5353 0 0 0 -.031-.32 3.5686 3.5686 0 0 0 -2.3445 1.2084 3.4629 3.4629 0 0 0 -.8676 2.1583 1.1309 1.1309 0 0 0 .0413.2582 2.9463 2.9463 0 0 0 2.3549-1.0849z"/>
                        </svg>
                    </a>
                </li>

                <!-- 2-11. Category Text Links -->
                <li class="globalnav-item globalnav-item-store has-flyout" id="nav-item-store">
                    <a href="#store" class="globalnav-link globalnav-link-store current">Store</a>
                    <!-- Store Mega-Menu Flyout -->
                    <div class="store-flyout" id="store-flyout" role="region" aria-label="Store navigation">
                        <div class="store-flyout-inner">
                            <!-- Col 1: Shop -->
                            <div class="flyout-col flyout-col-shop">
                                <span class="flyout-col-label">Shop</span>
                                <ul class="flyout-nav-list">
                                    <li><a href="#latest" class="flyout-nav-link flyout-link-primary">Shop the Latest</a></li>
                                    <li><a href="#mac" class="flyout-nav-link">Mac</a></li>
                                    <li><a href="#ipad" class="flyout-nav-link">iPad</a></li>
                                    <li><a href="#iphone" class="flyout-nav-link">iPhone</a></li>
                                    <li><a href="#watch" class="flyout-nav-link">Apple Watch</a></li>
                                    <li><a href="#airpods" class="flyout-nav-link">AirPods</a></li>
                                    <li><a href="#home" class="flyout-nav-link">Home</a></li>
                                    <li><a href="#accessories" class="flyout-nav-link">Accessories</a></li>
                                </ul>
                            </div>
                            <!-- Col 2: Quick Links -->
                            <div class="flyout-col flyout-col-quicklinks">
                                <span class="flyout-col-label">Quick Links</span>
                                <ul class="flyout-nav-list">
                                    <li><a href="#find-store" class="flyout-nav-link">Find a Store</a></li>
                                    <li><a href="#order-status" class="flyout-nav-link">Order Status</a></li>
                                    <li><a href="#trade-in" class="flyout-nav-link">Apple Trade In</a></li>
                                    <li><a href="#ways-to-buy" class="flyout-nav-link">Ways to Buy</a></li>
                                    <li><a href="#personal-setup" class="flyout-nav-link">Personal Setup</a></li>
                                </ul>
                            </div>
                            <!-- Col 3: Shop Special Stores -->
                            <div class="flyout-col flyout-col-special">
                                <span class="flyout-col-label">Shop Special Stores</span>
                                <ul class="flyout-nav-list">
                                    <li><a href="#education" class="flyout-nav-link flyout-link-blue">Education</a></li>
                                    <li><a href="#business" class="flyout-nav-link flyout-link-blue">Business</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="globalnav-item"><a href="#mac" class="globalnav-link">Mac</a></li>
                <li class="globalnav-item"><a href="#ipad" class="globalnav-link">iPad</a></li>
                <li class="globalnav-item"><a href="#iphone" class="globalnav-link">iPhone</a></li>
                <li class="globalnav-item"><a href="#watch" class="globalnav-link">Watch</a></li>
                <li class="globalnav-item"><a href="#airpods" class="globalnav-link">AirPods</a></li>
                <li class="globalnav-item"><a href="#home" class="globalnav-link">Home</a></li>
                <li class="globalnav-item"><a href="#entertainment" class="globalnav-link">Entertainment</a></li>
                <li class="globalnav-item"><a href="#accessories" class="globalnav-link">Accessories</a></li>
                <li class="globalnav-item"><a href="#support" class="globalnav-link">Support</a></li>

                <!-- 12. Search Trigger -->
                <li class="globalnav-item globalnav-item-search">
                    <button class="globalnav-link globalnav-link-search search-trigger" id="search-toggle" aria-label="Search apple.com">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="44" viewBox="0 0 16 44" class="nav-svg-icon" aria-hidden="true">
                            <path fill="currentColor" d="m15.7 24.3-3.6-3.6a5.45 5.45 0 0 0 .9-3 5.7 5.7 0 1 0 -5.7 5.7 5.45 5.45 0 0 0 3-.9l3.6 3.6a.6.6 0 0 0 .9 0 .7.7 0 0 0 -.1-.8zm-8.4-2.1a4.5 4.5 0 1 1 4.5-4.5 4.5 4.5 0 0 1 -4.5 4.5z"/>
                        </svg>
                    </button>
                </li>

                <!-- 13. Shopping Bag Trigger -->
                <li class="globalnav-item globalnav-item-bag">
                    <button class="globalnav-link globalnav-link-bag bag-trigger" id="bag-toggle" aria-label="Shopping Bag">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="44" viewBox="0 0 14 44" class="nav-svg-icon" aria-hidden="true">
                            <path fill="currentColor" d="m11.3535 16.0283h-1.0205a3.4229 3.4229 0 0 0 -6.666 0h-1.0205a2.6464 2.6464 0 0 0 -2.6465 2.6455v8.5284a2.6464 2.6464 0 0 0 2.6465 2.6455h8.707a2.6464 2.6464 0 0 0 2.6465-2.6455v-8.5284a2.6464 2.6464 0 0 0 -2.6465-2.6455zm-4.3535-2.3281a2.33 2.33 0 0 1 2.3223 2.3281h-4.6446a2.33 2.33 0 0 1 2.3223-2.3281zm5.9 13.502a1.5478 1.5478 0 0 1 -1.5465 1.5455h-8.707a1.5478 1.5478 0 0 1 -1.5465-1.5455v-8.5284a1.5478 1.5478 0 0 1 1.5465-1.5455h8.707a1.5478 1.5478 0 0 1 1.5465 1.5455z"/>
                        </svg>
                        <span class="nav-bag-count" id="bag-count" style="display: none;">0</span>
                    </button>
                </li>
            </ul>

            <!-- Mobile Bar for Tablet/Phone (<= 834px) -->
            <div class="mobile-nav-bar" id="mobile-nav-bar">
                <a href="#" class="mobile-logo-link" aria-label="Apple">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="44" viewBox="0 0 14 44" class="nav-svg-icon" aria-hidden="true">
                        <path fill="currentColor" d="m13.0729 17.6825a3.61 3.61 0 0 0 -1.7248 3.0365 3.5132 3.5132 0 0 0 2.1379 3.2223 8.394 8.394 0 0 1 -1.0948 2.2618c-.6816.9812-1.3943 1.9623-2.4787 1.9623s-1.3633-.63-2.613-.63c-1.2187 0-1.6525.6507-2.644.6507s-1.6834-.9089-2.4787-2.0243a9.7846 9.7846 0 0 1 -1.6628-5.2776c0-3.0984 2.014-4.7405 3.9969-4.7405 1.0535 0 1.9314.6919 2.5924.6919.63 0 1.6112-.7333 2.8092-.7333a3.7579 3.7579 0 0 1 3.1604 1.5802zm-3.7284-2.8918a3.5615 3.5615 0 0 0 .8469-2.22 1.5353 1.5353 0 0 0 -.031-.32 3.5686 3.5686 0 0 0 -2.3445 1.2084 3.4629 3.4629 0 0 0 -.8676 2.1583 1.1309 1.1309 0 0 0 .0413.2582 2.9463 2.9463 0 0 0 2.3549-1.0849z"/>
                    </svg>
                </a>
                <div class="mobile-nav-actions">
                    <button class="mobile-action-btn search-trigger" aria-label="Search apple.com">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="44" viewBox="0 0 16 44" class="nav-svg-icon" aria-hidden="true">
                            <path fill="currentColor" d="m15.7 24.3-3.6-3.6a5.45 5.45 0 0 0 .9-3 5.7 5.7 0 1 0 -5.7 5.7 5.45 5.45 0 0 0 3-.9l3.6 3.6a.6.6 0 0 0 .9 0 .7.7 0 0 0 -.1-.8zm-8.4-2.1a4.5 4.5 0 1 1 4.5-4.5 4.5 4.5 0 0 1 -4.5 4.5z"/>
                        </svg>
                    </button>
                    <button class="mobile-action-btn bag-trigger" aria-label="Shopping Bag">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="44" viewBox="0 0 14 44" class="nav-svg-icon" aria-hidden="true">
                            <path fill="currentColor" d="m11.3535 16.0283h-1.0205a3.4229 3.4229 0 0 0 -6.666 0h-1.0205a2.6464 2.6464 0 0 0 -2.6465 2.6455v8.5284a2.6464 2.6464 0 0 0 2.6465 2.6455h8.707a2.6464 2.6464 0 0 0 2.6465-2.6455v-8.5284a2.6464 2.6464 0 0 0 -2.6465-2.6455zm-4.3535-2.3281a2.33 2.33 0 0 1 2.3223 2.3281h-4.6446a2.33 2.33 0 0 1 2.3223-2.3281zm5.9 13.502a1.5478 1.5478 0 0 1 -1.5465 1.5455h-8.707a1.5478 1.5478 0 0 1 -1.5465-1.5455v-8.5284a1.5478 1.5478 0 0 1 1.5465-1.5455h8.707a1.5478 1.5478 0 0 1 1.5465 1.5455z"/>
                        </svg>
                        <span class="nav-bag-count mobile-bag-count" style="display: none;">0</span>
                    </button>
                    <button class="globalnav-menu-btn" id="mobile-menu-toggle" aria-label="Toggle navigation menu" aria-expanded="false" aria-controls="mobile-menu-drawer">
                        <span class="menu-line line-1"></span>
                        <span class="menu-line line-2"></span>
                    </button>
                </div>
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
                <li class="mobile-menu-item"><a href="#home" class="mobile-menu-link">Home</a></li>
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

