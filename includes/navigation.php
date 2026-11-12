<?php
/**
 * Apple Global Navigation Bar
 * Desktop bar with hover mega-menu flyouts, mobile slide-down drawer, search panel, and bag panel.
 */
?>
<header class="globalnav-header" id="globalnav" role="banner">
    <div class="globalnav-container">
        <nav class="globalnav-nav" id="globalnav-nav" aria-label="Global Navigation">
            
            <!-- Desktop Navigation: All 13 items unified, max-width 1024px, centered -->
            <ul class="globalnav-list" id="desktop-links">
                <!-- 1. Apple Logo -->
                <li class="globalnav-item globalnav-item-apple">
                    <a href="#" class="globalnav-link globalnav-link-apple" aria-label="Apple">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="44" viewBox="0 0 14 44" class="nav-svg-icon" aria-hidden="true">
                            <path fill="currentColor" d="m13.0729 17.6825a3.61 3.61 0 0 0 -1.7248 3.0365 3.5132 3.5132 0 0 0 2.1379 3.2223 8.394 8.394 0 0 1 -1.0948 2.2618c-.6816.9812-1.3943 1.9623-2.4787 1.9623s-1.3633-.63-2.613-.63c-1.2187 0-1.6525.6507-2.644.6507s-1.6834-.9089-2.4787-2.0243a9.7846 9.7846 0 0 1 -1.6628-5.2776c0-3.0984 2.014-4.7405 3.9969-4.7405 1.0535 0 1.9314.6919 2.5924.6919.63 0 1.6112-.7333 2.8092-.7333a3.7579 3.7579 0 0 1 3.1604 1.5802zm-3.7284-2.8918a3.5615 3.5615 0 0 0 .8469-2.22 1.5353 1.5353 0 0 0 -.031-.32 3.5686 3.5686 0 0 0 -2.3445 1.2084 3.4629 3.4629 0 0 0 -.8676 2.1583 1.1309 1.1309 0 0 0 .0413.2582 2.9463 2.9463 0 0 0 2.3549-1.0849z"/>
                        </svg>
                    </a>
                </li>

                <!-- 2-11. Category Text Links with Hover Flyout Triggers -->
                <li class="globalnav-item" data-nav="store">
                    <a href="#store" class="globalnav-link globalnav-link-store current">Store</a>
                </li>
                <li class="globalnav-item" data-nav="mac">
                    <a href="#mac" class="globalnav-link">Mac</a>
                </li>
                <li class="globalnav-item" data-nav="ipad">
                    <a href="#ipad" class="globalnav-link">iPad</a>
                </li>
                <li class="globalnav-item" data-nav="iphone">
                    <a href="#iphone" class="globalnav-link">iPhone</a>
                </li>
                <li class="globalnav-item" data-nav="watch">
                    <a href="#watch" class="globalnav-link">Watch</a>
                </li>
                <li class="globalnav-item" data-nav="airpods">
                    <a href="#airpods" class="globalnav-link">AirPods</a>
                </li>
                <li class="globalnav-item" data-nav="home">
                    <a href="#home" class="globalnav-link">Home</a>
                </li>
                <li class="globalnav-item" data-nav="entertainment">
                    <a href="#entertainment" class="globalnav-link">Entertainment</a>
                </li>
                <li class="globalnav-item" data-nav="accessories">
                    <a href="#accessories" class="globalnav-link">Accessories</a>
                </li>
                <li class="globalnav-item" data-nav="support">
                    <a href="#support" class="globalnav-link">Support</a>
                </li>

                <!-- 12. Search Trigger -->
                <li class="globalnav-item globalnav-item-search" data-nav="search">
                    <button class="globalnav-link globalnav-link-search search-trigger" id="search-toggle" aria-label="Search apple.com">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="44" viewBox="0 0 16 44" class="nav-svg-icon" aria-hidden="true">
                            <path fill="currentColor" d="m15.7 24.3-3.6-3.6a5.45 5.45 0 0 0 .9-3 5.7 5.7 0 1 0 -5.7 5.7 5.45 5.45 0 0 0 3-.9l3.6 3.6a.6.6 0 0 0 .9 0 .7.7 0 0 0 -.1-.8zm-8.4-2.1a4.5 4.5 0 1 1 4.5-4.5 4.5 4.5 0 0 1 -4.5 4.5z"/>
                        </svg>
                    </button>
                </li>

                <!-- 13. Shopping Bag Trigger -->
                <li class="globalnav-item globalnav-item-bag" data-nav="bag">
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

    <!-- Mega-Menu Flyout Panels Container (Full-width, Frosted Glass) -->
    <div class="globalnav-flyout-container" id="globalnav-flyouts">

        <!-- 1. Store Flyout (Matches Reference Image 1) -->
        <div class="globalnav-flyout" id="flyout-store" data-flyout="store" role="region" aria-label="Store navigation">
            <div class="globalnav-flyout-inner">
                <div class="flyout-col flyout-col-primary">
                    <span class="flyout-heading">Shop</span>
                    <ul class="flyout-primary-list">
                        <li><a href="#latest" class="flyout-primary-link">Shop the Latest</a></li>
                        <li><a href="#mac" class="flyout-primary-link">Mac</a></li>
                        <li><a href="#ipad" class="flyout-primary-link">iPad</a></li>
                        <li><a href="#iphone" class="flyout-primary-link">iPhone</a></li>
                        <li><a href="#watch" class="flyout-primary-link">Apple Watch</a></li>
                        <li><a href="#airpods" class="flyout-primary-link">AirPods</a></li>
                        <li><a href="#home" class="flyout-primary-link">Home</a></li>
                        <li><a href="#accessories" class="flyout-primary-link">Accessories</a></li>
                    </ul>
                </div>
                <div class="flyout-col flyout-col-secondary">
                    <span class="flyout-heading">Quick Links</span>
                    <ul class="flyout-secondary-list">
                        <li><a href="#find-a-store" class="flyout-secondary-link">Find a Store</a></li>
                        <li><a href="#order-status" class="flyout-secondary-link">Order Status</a></li>
                        <li><a href="#trade-in" class="flyout-secondary-link">Apple Trade In</a></li>
                        <li><a href="#ways-to-buy" class="flyout-secondary-link">Ways to Buy</a></li>
                        <li><a href="#personal-setup" class="flyout-secondary-link">Personal Setup</a></li>
                    </ul>
                </div>
                <div class="flyout-col flyout-col-tertiary">
                    <span class="flyout-heading">Shop Special Stores</span>
                    <ul class="flyout-secondary-list">
                        <li><a href="#education" class="flyout-secondary-link">Education</a></li>
                        <li><a href="#business" class="flyout-secondary-link">Business</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- 2. Mac Flyout (Matches Reference Image 2) -->
        <div class="globalnav-flyout" id="flyout-mac" data-flyout="mac" role="region" aria-label="Mac navigation">
            <div class="globalnav-flyout-inner">
                <div class="flyout-col flyout-col-primary">
                    <span class="flyout-heading">Explore Mac</span>
                    <ul class="flyout-primary-list">
                        <li><a href="#explore-mac" class="flyout-primary-link">Explore All Mac</a></li>
                        <li><a href="#macbook-neo" class="flyout-primary-link">MacBook Neo</a></li>
                        <li><a href="#macbook-air" class="flyout-primary-link">MacBook Air</a></li>
                        <li><a href="#macbook-pro" class="flyout-primary-link">MacBook Pro</a></li>
                        <li><a href="#imac" class="flyout-primary-link">iMac</a></li>
                        <li><a href="#mac-mini" class="flyout-primary-link">Mac mini</a></li>
                        <li><a href="#mac-studio" class="flyout-primary-link">Mac Studio</a></li>
                        <li><a href="#displays" class="flyout-primary-link">Displays</a></li>
                    </ul>
                    <div class="flyout-sub-links">
                        <a href="#compare-mac" class="flyout-secondary-link">Compare Mac</a>
                        <a href="#switch-to-mac" class="flyout-secondary-link">Switch from PC to Mac</a>
                    </div>
                </div>
                <div class="flyout-col flyout-col-secondary">
                    <span class="flyout-heading">Shop Mac</span>
                    <ul class="flyout-secondary-list">
                        <li><a href="#shop-mac" class="flyout-secondary-link">Shop Mac</a></li>
                        <li><a href="#mac-accessories" class="flyout-secondary-link">Mac Accessories</a></li>
                        <li><a href="#ways-to-buy-mac" class="flyout-secondary-link">Ways to Buy</a></li>
                        <li><a href="#personal-setup-mac" class="flyout-secondary-link">Personal Setup</a></li>
                    </ul>
                </div>
                <div class="flyout-col flyout-col-tertiary">
                    <span class="flyout-heading">More from Mac</span>
                    <ul class="flyout-secondary-list">
                        <li><a href="#mac-support" class="flyout-secondary-link">Mac Support</a></li>
                        <li><a href="#applecare-mac" class="flyout-secondary-link">AppleCare</a></li>
                        <li><a href="#macos-27" class="flyout-secondary-link">macOS 27</a></li>
                        <li><a href="#apple-intelligence-mac" class="flyout-secondary-link">Apple Intelligence and Siri</a></li>
                        <li><a href="#apps-by-apple-mac" class="flyout-secondary-link">Apps by Apple</a></li>
                        <li><a href="#creator-studio" class="flyout-secondary-link">Apple Creator Studio</a></li>
                        <li><a href="#better-with-iphone" class="flyout-secondary-link">Better with iPhone</a></li>
                        <li><a href="#icloud-mac" class="flyout-secondary-link">iCloud+</a></li>
                        <li><a href="#mac-business" class="flyout-secondary-link">Mac for Business</a></li>
                        <li><a href="#education-mac" class="flyout-secondary-link">Education</a></li>
                        <li><a href="#apple-at-work-mac" class="flyout-secondary-link">Apple at Work</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- 3. iPad Flyout -->
        <div class="globalnav-flyout" id="flyout-ipad" data-flyout="ipad" role="region" aria-label="iPad navigation">
            <div class="globalnav-flyout-inner">
                <div class="flyout-col flyout-col-primary">
                    <span class="flyout-heading">Explore iPad</span>
                    <ul class="flyout-primary-list">
                        <li><a href="#explore-ipad" class="flyout-primary-link">Explore All iPad</a></li>
                        <li><a href="#ipad-pro" class="flyout-primary-link">iPad Pro</a></li>
                        <li><a href="#ipad-air" class="flyout-primary-link">iPad Air</a></li>
                        <li><a href="#ipad-standard" class="flyout-primary-link">iPad</a></li>
                        <li><a href="#ipad-mini" class="flyout-primary-link">iPad mini</a></li>
                        <li><a href="#apple-pencil" class="flyout-primary-link">Apple Pencil</a></li>
                        <li><a href="#keyboards" class="flyout-primary-link">Keyboards</a></li>
                    </ul>
                    <div class="flyout-sub-links">
                        <a href="#compare-ipad" class="flyout-secondary-link">Compare iPad</a>
                        <a href="#why-ipad" class="flyout-secondary-link">Why iPad</a>
                    </div>
                </div>
                <div class="flyout-col flyout-col-secondary">
                    <span class="flyout-heading">Shop iPad</span>
                    <ul class="flyout-secondary-list">
                        <li><a href="#shop-ipad" class="flyout-secondary-link">Shop iPad</a></li>
                        <li><a href="#ipad-accessories" class="flyout-secondary-link">iPad Accessories</a></li>
                        <li><a href="#trade-in" class="flyout-secondary-link">Apple Trade In</a></li>
                        <li><a href="#ways-to-buy-ipad" class="flyout-secondary-link">Ways to Buy</a></li>
                    </ul>
                </div>
                <div class="flyout-col flyout-col-tertiary">
                    <span class="flyout-heading">More from iPad</span>
                    <ul class="flyout-secondary-list">
                        <li><a href="#ipad-support" class="flyout-secondary-link">iPad Support</a></li>
                        <li><a href="#applecare-ipad" class="flyout-secondary-link">AppleCare</a></li>
                        <li><a href="#ipados-18" class="flyout-secondary-link">iPadOS 18</a></li>
                        <li><a href="#apple-intelligence-ipad" class="flyout-secondary-link">Apple Intelligence</a></li>
                        <li><a href="#apps-ipad" class="flyout-secondary-link">Apps by Apple</a></li>
                        <li><a href="#icloud-ipad" class="flyout-secondary-link">iCloud+</a></li>
                        <li><a href="#education-ipad" class="flyout-secondary-link">Education</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- 4. iPhone Flyout (Matches Reference Image 3) -->
        <div class="globalnav-flyout" id="flyout-iphone" data-flyout="iphone" role="region" aria-label="iPhone navigation">
            <div class="globalnav-flyout-inner">
                <div class="flyout-col flyout-col-primary">
                    <span class="flyout-heading">Explore iPhone</span>
                    <ul class="flyout-primary-list">
                        <li><a href="#explore-iphone" class="flyout-primary-link">Explore All iPhone</a></li>
                        <li><a href="#iphone-duo" class="flyout-primary-link">iPhone Duo</a></li>
                        <li><a href="#iphone-18-pro" class="flyout-primary-link">iPhone 18 Pro</a></li>
                        <li><a href="#iphone-air" class="flyout-primary-link">iPhone Air</a></li>
                        <li><a href="#iphone-17" class="flyout-primary-link">iPhone 17</a></li>
                        <li><a href="#iphone-17e" class="flyout-primary-link">iPhone 17e</a></li>
                        <li><a href="#iphone-16" class="flyout-primary-link">iPhone 16</a></li>
                    </ul>
                    <div class="flyout-sub-links">
                        <a href="#compare-iphone" class="flyout-secondary-link">Compare iPhone</a>
                        <a href="#switch-from-android" class="flyout-secondary-link">Switch from Android</a>
                    </div>
                </div>
                <div class="flyout-col flyout-col-secondary">
                    <span class="flyout-heading">Shop iPhone</span>
                    <ul class="flyout-secondary-list">
                        <li><a href="#shop-iphone" class="flyout-secondary-link">Shop iPhone</a></li>
                        <li><a href="#iphone-accessories" class="flyout-secondary-link">iPhone Accessories</a></li>
                        <li><a href="#trade-in" class="flyout-secondary-link">Apple Trade In</a></li>
                        <li><a href="#ways-to-buy-iphone" class="flyout-secondary-link">Ways to Buy</a></li>
                        <li><a href="#personal-setup-iphone" class="flyout-secondary-link">Personal Setup</a></li>
                    </ul>
                </div>
                <div class="flyout-col flyout-col-tertiary">
                    <span class="flyout-heading">More from iPhone</span>
                    <ul class="flyout-secondary-list">
                        <li><a href="#iphone-support" class="flyout-secondary-link">iPhone Support</a></li>
                        <li><a href="#applecare-iphone" class="flyout-secondary-link">AppleCare</a></li>
                        <li><a href="#ios-27" class="flyout-secondary-link">iOS 27</a></li>
                        <li><a href="#apple-intelligence-iphone" class="flyout-secondary-link">Apple Intelligence and Siri</a></li>
                        <li><a href="#apps-by-apple-iphone" class="flyout-secondary-link">Apps by Apple</a></li>
                        <li><a href="#iphone-privacy" class="flyout-secondary-link">iPhone Privacy</a></li>
                        <li><a href="#better-with-mac" class="flyout-secondary-link">Better with Mac</a></li>
                        <li><a href="#icloud-iphone" class="flyout-secondary-link">iCloud+</a></li>
                        <li><a href="#wallet-pay" class="flyout-secondary-link">Wallet, Pay</a></li>
                        <li><a href="#apple-at-work-iphone" class="flyout-secondary-link">Apple at Work</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- 5. Watch Flyout -->
        <div class="globalnav-flyout" id="flyout-watch" data-flyout="watch" role="region" aria-label="Watch navigation">
            <div class="globalnav-flyout-inner">
                <div class="flyout-col flyout-col-primary">
                    <span class="flyout-heading">Explore Watch</span>
                    <ul class="flyout-primary-list">
                        <li><a href="#explore-watch" class="flyout-primary-link">Explore All Apple Watch</a></li>
                        <li><a href="#watch-series-10" class="flyout-primary-link">Apple Watch Series 10</a></li>
                        <li><a href="#watch-ultra-2" class="flyout-primary-link">Apple Watch Ultra 2</a></li>
                        <li><a href="#watch-se" class="flyout-primary-link">Apple Watch SE</a></li>
                        <li><a href="#watch-nike" class="flyout-primary-link">Apple Watch Nike</a></li>
                    </ul>
                    <div class="flyout-sub-links">
                        <a href="#compare-watch" class="flyout-secondary-link">Compare Watch</a>
                        <a href="#why-watch" class="flyout-secondary-link">Why Apple Watch</a>
                    </div>
                </div>
                <div class="flyout-col flyout-col-secondary">
                    <span class="flyout-heading">Shop Watch</span>
                    <ul class="flyout-secondary-list">
                        <li><a href="#shop-watch" class="flyout-secondary-link">Shop Apple Watch</a></li>
                        <li><a href="#watch-straps" class="flyout-secondary-link">Apple Watch Straps</a></li>
                        <li><a href="#watch-accessories" class="flyout-secondary-link">Apple Watch Accessories</a></li>
                        <li><a href="#trade-in" class="flyout-secondary-link">Apple Trade In</a></li>
                        <li><a href="#ways-to-buy-watch" class="flyout-secondary-link">Ways to Buy</a></li>
                    </ul>
                </div>
                <div class="flyout-col flyout-col-tertiary">
                    <span class="flyout-heading">More from Watch</span>
                    <ul class="flyout-secondary-list">
                        <li><a href="#watch-support" class="flyout-secondary-link">Apple Watch Support</a></li>
                        <li><a href="#applecare-watch" class="flyout-secondary-link">AppleCare</a></li>
                        <li><a href="#watchos-11" class="flyout-secondary-link">watchOS 11</a></li>
                        <li><a href="#fitness-plus" class="flyout-secondary-link">Apple Fitness+</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- 6. AirPods Flyout -->
        <div class="globalnav-flyout" id="flyout-airpods" data-flyout="airpods" role="region" aria-label="AirPods navigation">
            <div class="globalnav-flyout-inner">
                <div class="flyout-col flyout-col-primary">
                    <span class="flyout-heading">Explore AirPods</span>
                    <ul class="flyout-primary-list">
                        <li><a href="#explore-airpods" class="flyout-primary-link">Explore All AirPods</a></li>
                        <li><a href="#airpods-4" class="flyout-primary-link">AirPods 4</a></li>
                        <li><a href="#airpods-pro-2" class="flyout-primary-link">AirPods Pro 2</a></li>
                        <li><a href="#airpods-max" class="flyout-primary-link">AirPods Max</a></li>
                    </ul>
                    <div class="flyout-sub-links">
                        <a href="#compare-airpods" class="flyout-secondary-link">Compare AirPods</a>
                    </div>
                </div>
                <div class="flyout-col flyout-col-secondary">
                    <span class="flyout-heading">Shop AirPods</span>
                    <ul class="flyout-secondary-list">
                        <li><a href="#shop-airpods" class="flyout-secondary-link">Shop AirPods</a></li>
                        <li><a href="#airpods-accessories" class="flyout-secondary-link">AirPods Accessories</a></li>
                    </ul>
                </div>
                <div class="flyout-col flyout-col-tertiary">
                    <span class="flyout-heading">More from AirPods</span>
                    <ul class="flyout-secondary-list">
                        <li><a href="#airpods-support" class="flyout-secondary-link">AirPods Support</a></li>
                        <li><a href="#applecare-audio" class="flyout-secondary-link">AppleCare</a></li>
                        <li><a href="#apple-music" class="flyout-secondary-link">Apple Music</a></li>
                        <li><a href="#hearing-health" class="flyout-secondary-link">Hearing Health</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- 7. Home Flyout -->
        <div class="globalnav-flyout" id="flyout-home" data-flyout="home" role="region" aria-label="Home navigation">
            <div class="globalnav-flyout-inner">
                <div class="flyout-col flyout-col-primary">
                    <span class="flyout-heading">Explore Home</span>
                    <ul class="flyout-primary-list">
                        <li><a href="#explore-home" class="flyout-primary-link">Explore All Home</a></li>
                        <li><a href="#homepod" class="flyout-primary-link">HomePod</a></li>
                        <li><a href="#homepod-mini" class="flyout-primary-link">HomePod mini</a></li>
                        <li><a href="#apple-tv-4k" class="flyout-primary-link">Apple TV 4K</a></li>
                        <li><a href="#home-app" class="flyout-primary-link">Home App</a></li>
                    </ul>
                </div>
                <div class="flyout-col flyout-col-secondary">
                    <span class="flyout-heading">Shop Home</span>
                    <ul class="flyout-secondary-list">
                        <li><a href="#shop-homepod" class="flyout-secondary-link">Shop HomePod</a></li>
                        <li><a href="#shop-homepod-mini" class="flyout-secondary-link">Shop HomePod mini</a></li>
                        <li><a href="#shop-apple-tv" class="flyout-secondary-link">Shop Apple TV 4K</a></li>
                        <li><a href="#home-accessories" class="flyout-secondary-link">Home Accessories</a></li>
                    </ul>
                </div>
                <div class="flyout-col flyout-col-tertiary">
                    <span class="flyout-heading">More from Home</span>
                    <ul class="flyout-secondary-list">
                        <li><a href="#homepod-support" class="flyout-secondary-link">HomePod Support</a></li>
                        <li><a href="#apple-tv-support" class="flyout-secondary-link">Apple TV Support</a></li>
                        <li><a href="#applecare-home" class="flyout-secondary-link">AppleCare</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- 8. Entertainment Flyout -->
        <div class="globalnav-flyout" id="flyout-entertainment" data-flyout="entertainment" role="region" aria-label="Entertainment navigation">
            <div class="globalnav-flyout-inner">
                <div class="flyout-col flyout-col-primary">
                    <span class="flyout-heading">Explore Entertainment</span>
                    <ul class="flyout-primary-list">
                        <li><a href="#entertainment" class="flyout-primary-link">Explore Entertainment</a></li>
                        <li><a href="#apple-one" class="flyout-primary-link">Apple One</a></li>
                        <li><a href="#apple-tv" class="flyout-primary-link">Apple TV+</a></li>
                        <li><a href="#apple-music" class="flyout-primary-link">Apple Music</a></li>
                        <li><a href="#arcade" class="flyout-primary-link">Apple Arcade</a></li>
                        <li><a href="#podcasts" class="flyout-primary-link">Apple Podcasts</a></li>
                        <li><a href="#books" class="flyout-primary-link">Apple Books</a></li>
                        <li><a href="#app-store" class="flyout-primary-link">App Store</a></li>
                    </ul>
                </div>
                <div class="flyout-col flyout-col-secondary">
                    <span class="flyout-heading">Support</span>
                    <ul class="flyout-secondary-list">
                        <li><a href="#apple-tv-support" class="flyout-secondary-link">Apple TV+ Support</a></li>
                        <li><a href="#apple-music-support" class="flyout-secondary-link">Apple Music Support</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- 9. Accessories Flyout -->
        <div class="globalnav-flyout" id="flyout-accessories" data-flyout="accessories" role="region" aria-label="Accessories navigation">
            <div class="globalnav-flyout-inner">
                <div class="flyout-col flyout-col-primary">
                    <span class="flyout-heading">Explore Accessories</span>
                    <ul class="flyout-primary-list">
                        <li><a href="#accessories" class="flyout-primary-link">Explore All Accessories</a></li>
                        <li><a href="#mac" class="flyout-primary-link">Mac</a></li>
                        <li><a href="#ipad" class="flyout-primary-link">iPad</a></li>
                        <li><a href="#iphone" class="flyout-primary-link">iPhone</a></li>
                        <li><a href="#watch" class="flyout-primary-link">Apple Watch</a></li>
                        <li><a href="#airpods" class="flyout-primary-link">AirPods</a></li>
                        <li><a href="#home" class="flyout-primary-link">TV &amp; Home</a></li>
                    </ul>
                </div>
                <div class="flyout-col flyout-col-secondary">
                    <span class="flyout-heading">Shop Accessories</span>
                    <ul class="flyout-secondary-list">
                        <li><a href="#all-accessories" class="flyout-secondary-link">Shop All Accessories</a></li>
                        <li><a href="#made-by-apple" class="flyout-secondary-link">Made by Apple</a></li>
                        <li><a href="#beats" class="flyout-secondary-link">Beats by Dr. Dre</a></li>
                        <li><a href="#airtag" class="flyout-secondary-link">AirTag</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- 10. Support Flyout -->
        <div class="globalnav-flyout" id="flyout-support" data-flyout="support" role="region" aria-label="Support navigation">
            <div class="globalnav-flyout-inner">
                <div class="flyout-col flyout-col-primary">
                    <span class="flyout-heading">Explore Support</span>
                    <ul class="flyout-primary-list">
                        <li><a href="#iphone" class="flyout-primary-link">iPhone</a></li>
                        <li><a href="#mac" class="flyout-primary-link">Mac</a></li>
                        <li><a href="#ipad" class="flyout-primary-link">iPad</a></li>
                        <li><a href="#watch" class="flyout-primary-link">Watch</a></li>
                        <li><a href="#airpods" class="flyout-primary-link">AirPods</a></li>
                        <li><a href="#music" class="flyout-primary-link">Music</a></li>
                        <li><a href="#tv" class="flyout-primary-link">TV</a></li>
                    </ul>
                </div>
                <div class="flyout-col flyout-col-secondary">
                    <span class="flyout-heading">Get Help</span>
                    <ul class="flyout-secondary-list">
                        <li><a href="#community" class="flyout-secondary-link">Community</a></li>
                        <li><a href="#check-coverage" class="flyout-secondary-link">Check Coverage</a></li>
                        <li><a href="#repair" class="flyout-secondary-link">Repair</a></li>
                        <li><a href="#contact" class="flyout-secondary-link">Contact Us</a></li>
                    </ul>
                </div>
                <div class="flyout-col flyout-col-tertiary">
                    <span class="flyout-heading">Helpful Topics</span>
                    <ul class="flyout-secondary-list">
                        <li><a href="#apple-account" class="flyout-secondary-link">Get Apple Account</a></li>
                        <li><a href="#billing" class="flyout-secondary-link">Billing &amp; Subscriptions</a></li>
                        <li><a href="#find-my" class="flyout-secondary-link">Find My</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- 11. Search Flyout Panel (Matches Reference Image 4) -->
        <div class="globalnav-flyout flyout-search-panel" id="flyout-search" data-flyout="search" role="region" aria-label="Search">
            <div class="search-flyout-inner">
                <div class="search-input-wrap">
                    <svg class="search-input-icon" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 16 16" fill="none">
                        <path d="M15.7 14.3L12.1 10.7C13 9.6 13.5 8.1 13.5 6.5C13.5 2.6 10.4 -0.5 6.5 -0.5C2.6 -0.5 -0.5 2.6 -0.5 6.5C-0.5 10.4 2.6 13.5 6.5 13.5C8.1 13.5 9.6 13 10.7 12.1L14.3 15.7C14.5 15.9 14.7 16 15 16C15.3 16 15.5 15.9 15.7 15.7C16.1 15.3 16.1 14.7 15.7 14.3ZM1.5 6.5C1.5 3.7 3.7 1.5 6.5 1.5C9.3 1.5 11.5 3.7 11.5 6.5C11.5 9.3 9.3 11.5 6.5 11.5C3.7 11.5 1.5 9.3 1.5 6.5Z" fill="#86868b"/>
                    </svg>
                    <input type="text" id="store-search-input" class="search-flyout-input" placeholder="Search apple.com" autocomplete="off">
                    <button type="button" class="search-bar-close" id="search-close-btn" aria-label="Close search">
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none">
                            <path d="M2 2L12 12M12 2L2 12" stroke="#86868b" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </button>
                </div>
                
                <div class="search-quick-links">
                    <h4 class="search-quick-links-title">Quick Links</h4>
                    <ul class="search-quick-links-list">
                        <li class="search-quick-link-item"><a href="#find-a-store"><span class="link-arrow">&rarr;</span> Find a Store</a></li>
                        <li class="search-quick-link-item"><a href="#accessories"><span class="link-arrow">&rarr;</span> Accessories</a></li>
                        <li class="search-quick-link-item"><a href="#airpods"><span class="link-arrow">&rarr;</span> AirPods</a></li>
                        <li class="search-quick-link-item"><a href="#apple-intelligence"><span class="link-arrow">&rarr;</span> Apple Intelligence</a></li>
                        <li class="search-quick-link-item"><a href="#trade-in"><span class="link-arrow">&rarr;</span> Apple Trade In</a></li>
                    </ul>
                </div>

                <div class="search-results-panel" id="search-results-panel" style="display: none;"></div>
            </div>
        </div>

        <!-- 12. Bag Flyout Panel (Matches Reference Image 5) -->
        <div class="globalnav-flyout flyout-bag-panel" id="flyout-bag" data-flyout="bag" role="region" aria-label="Shopping Bag">
            <div class="bag-flyout-inner">
                <div class="bag-header">
                    <h3 class="bag-flyout-title" id="bag-title-text">Your Bag is empty.</h3>
                    <p class="bag-flyout-subtitle">
                        <a href="#signin" class="bag-signin-link">Sign in</a> to see if you have any saved items
                    </p>
                </div>

                <div class="bag-items-list" id="bag-items-container">
                    <!-- Dynamically populated if products added -->
                </div>

                <div class="bag-profile-section">
                    <h4 class="bag-profile-heading">My Profile</h4>
                    <ul class="bag-profile-list">
                        <li>
                            <a href="#orders" class="bag-profile-link">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" class="profile-icon">
                                    <path d="M2 5L8 2L14 5L8 8L2 5Z" stroke="currentColor" stroke-width="1.3" stroke-linejoin="round"/>
                                    <path d="M2 5V11L8 14V8M14 5V11L8 14" stroke="currentColor" stroke-width="1.3" stroke-linejoin="round"/>
                                </svg>
                                Orders
                            </a>
                        </li>
                        <li>
                            <a href="#your-saves" class="bag-profile-link">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" class="profile-icon">
                                    <path d="M4 2H12V14L8 11.5L4 14V2Z" stroke="currentColor" stroke-width="1.3" stroke-linejoin="round"/>
                                </svg>
                                Your Saves
                            </a>
                        </li>
                        <li>
                            <a href="#account" class="bag-profile-link">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" class="profile-icon">
                                    <circle cx="8" cy="8" r="6" stroke="currentColor" stroke-width="1.3"/>
                                    <circle cx="8" cy="8" r="2.2" stroke="currentColor" stroke-width="1.3"/>
                                </svg>
                                Account
                            </a>
                        </li>
                        <li>
                            <a href="#signin" class="bag-profile-link">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" class="profile-icon">
                                    <circle cx="8" cy="5.5" r="3" stroke="currentColor" stroke-width="1.3"/>
                                    <path d="M2.5 14C3.2 11 5.2 9.5 8 9.5C10.8 9.5 12.8 11 13.5 14" stroke="currentColor" stroke-width="1.3" stroke-linecap="round"/>
                                </svg>
                                Sign in
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>

    <!-- Mobile Navigation Drawer -->
    <div class="mobile-menu-drawer" id="mobile-menu-drawer" aria-hidden="true">
        <button class="mobile-menu-close" id="mobile-menu-close" aria-label="Close navigation menu">
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" aria-hidden="true">
                <path d="M2 2L16 16M16 2L2 16" stroke="#1d1d1f" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </button>
        <div class="mobile-menu-inner">
            <ul class="mobile-menu-list">
                <li class="mobile-menu-item"><a href="#store" class="mobile-menu-link">Store</a></li>
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
</header>
<div class="globalnav-backdrop" id="nav-backdrop"></div>
