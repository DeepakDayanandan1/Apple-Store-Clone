<?php
/**
 * Shopping Benefits Section
 * Includes:
 * 1. The Apple Store difference
 * 2. Help is here
 */
$diffCards = $db->getSectionItems('promotions');
$helpCards = $db->getSectionItems('help');
?>

<!-- 1. The Apple Store Difference Section -->
<section class="store-section difference-showcase-section" id="difference" aria-labelledby="diff-headline">
    <div class="section-container">
        <div class="section-header-row">
            <div class="section-title-wrap">
                <h2 id="diff-headline" class="section-display-title">
                    <span class="title-primary">The Apple Store difference.</span>
                    <span class="title-secondary">Even more reasons to shop with us.</span>
                </h2>
            </div>
        </div>
    </div>

    <div class="carousel-container">
        <div class="carousel-track" id="diff-carousel" tabindex="0" role="region" aria-label="Apple Difference Carousel">
            <?php foreach ($diffCards as $diff): ?>
                <?php 
                    $accentColor = $diff['accent_color'] ?? '#0071e3';
                    $leadText = $diff['lead_text'] ?? $diff['title'];
                    $bodyText = $diff['body_text'] ?? '';
                ?>
                <article class="store-card difference-feature-card card-theme-light">
                    <div class="diff-icon-wrapper">
                        <?php if (($diff['icon'] ?? '') === 'payment'): ?>
                            <!-- Green Credit Card Outline -->
                            <svg width="44" height="44" viewBox="0 0 44 44" fill="none">
                                <rect x="4" y="10" width="36" height="24" rx="4" stroke="#008000" stroke-width="2.6"/>
                                <line x1="4" y1="18" x2="40" y2="18" stroke="#008000" stroke-width="2.6"/>
                                <rect x="9" y="25" width="8" height="4" rx="1" fill="#008000"/>
                            </svg>
                        <?php elseif (($diff['icon'] ?? '') === 'trade-in'): ?>
                            <!-- Blue Smartphone with Swap Device Outline -->
                            <svg width="44" height="44" viewBox="0 0 44 44" fill="none">
                                <rect x="12" y="8" width="20" height="28" rx="4" stroke="#0071e3" stroke-width="2.6"/>
                                <rect x="15" y="12" width="14" height="18" rx="2" stroke="#0071e3" stroke-width="1.8"/>
                                <circle cx="22" cy="33" r="1.2" fill="#0071e3"/>
                                <path d="M8 18l-3 3 3 3" stroke="#0071e3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M36 26l3-3-3-3" stroke="#0071e3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        <?php elseif (($diff['icon'] ?? '') === 'mac'): ?>
                            <!-- Rainbow Gradient Apple Logo -->
                            <svg width="44" height="44" viewBox="0 0 44 44" fill="none">
                                <defs>
                                    <linearGradient id="apple-rainbow-grad" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" stop-color="#ff6b00"/>
                                        <stop offset="35%" stop-color="#e30000"/>
                                        <stop offset="70%" stop-color="#b33bf6"/>
                                        <stop offset="100%" stop-color="#0071e3"/>
                                    </linearGradient>
                                </defs>
                                <path fill="url(#apple-rainbow-grad)" d="M28 20.8c-.1-3.6 2.9-5.3 3-5.4-1.7-2.5-4.3-2.8-5.2-2.9-2.2-.2-4.4 1.3-5.5 1.3-1.1 0-2.9-1.3-4.8-1.3-2.4 0-4.7 1.4-6 3.6-2.5 4.3-.6 10.7 1.8 14.2 1.2 1.7 2.6 3.6 4.5 3.5 1.8-.1 2.5-1.1 4.7-1.1 2.1 0 2.8 1.1 4.7 1.1 1.9 0 3.2-1.7 4.4-3.5 1.4-2 2-4 2-4.1-.1 0-3.9-1.5-3.9-5.9zm-4.3-9.5c1-1.2 1.7-2.8 1.5-4.5-1.5.1-3.2 1-4.2 2.2-.9 1-1.7 2.7-1.5 4.3 1.6.1 3.2-.8 4.2-2z"/>
                            </svg>
                        <?php elseif (($diff['icon'] ?? '') === 'engraving'): ?>
                            <!-- Purple Smiley Face Outline -->
                            <svg width="44" height="44" viewBox="0 0 44 44" fill="none">
                                <circle cx="22" cy="22" r="18" stroke="#b33bf6" stroke-width="2.6"/>
                                <circle cx="16" cy="18" r="2.2" fill="#b33bf6"/>
                                <circle cx="28" cy="18" r="2.2" fill="#b33bf6"/>
                                <path d="M14 26c2.5 5 13.5 5 16 0" stroke="#b33bf6" stroke-width="2.6" stroke-linecap="round"/>
                            </svg>
                        <?php else: ?>
                            <!-- Green Delivery Truck Outline -->
                            <svg width="44" height="44" viewBox="0 0 44 44" fill="none">
                                <path d="M6 14h20v15H6z" stroke="#008000" stroke-width="2.6" stroke-linejoin="round"/>
                                <path d="M26 19h8l4 5v5h-12z" stroke="#008000" stroke-width="2.6" stroke-linejoin="round"/>
                                <circle cx="13" cy="32" r="3.5" stroke="#008000" stroke-width="2.6"/>
                                <circle cx="33" cy="32" r="3.5" stroke="#008000" stroke-width="2.6"/>
                            </svg>
                        <?php endif; ?>
                    </div>

                    <div class="diff-card-body">
                        <h3 class="diff-card-headline">
                            <?php if (($diff['icon'] ?? '') === 'mac'): ?>
                                <span class="diff-mac-rainbow">Customise</span> your Mac.
                            <?php elseif (($diff['icon'] ?? '') === 'engraving'): ?>
                                <span style="color: #1d1d1f;">Make them yours.</span>
                                <span style="color: #b33bf6;">Engrave a mix of emoji, names and numbers for free.</span>
                            <?php elseif (($diff['icon'] ?? '') === 'trade-in'): ?>
                                <span style="color: #0071e3;">Exchange your smartphone,</span>
                                <span style="color: #1d1d1f;">get ₹4000.00-₹92000.00 in credit towards a new one.‡</span>
                            <?php else: ?>
                                <span class="diff-lead-highlight" style="color: <?= htmlspecialchars($accentColor) ?>;"><?= htmlspecialchars($leadText) ?></span>
                                <span class="diff-body-text"><?= htmlspecialchars($bodyText) ?></span>
                            <?php endif; ?>
                        </h3>
                    </div>

                    <!-- Circular Next (+) Plus Button matching reference Image 3 -->
                    <button type="button" class="card-action-circle diff-action-circle" aria-label="Learn more about <?= htmlspecialchars($leadText) ?>">
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" aria-hidden="true">
                            <path d="M7 2v10M2 7h10" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </button>

                    <a href="<?= htmlspecialchars($diff['url'] ?? '#') ?>" class="card-full-link" aria-label="<?= htmlspecialchars($diff['eyebrow'] ?? $leadText) ?>"></a>
                </article>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="section-container">
        <div class="carousel-footer-row">
            <div class="carousel-nav-controls" aria-label="The Apple difference navigation">
                <button class="carousel-arrow prev" data-carousel-id="diff-carousel" aria-label="Previous items" disabled>
                    <img src="assets/icons/chevron-left.svg" alt="" width="18" height="18">
                </button>
                <button class="carousel-arrow next" data-carousel-id="diff-carousel" aria-label="Next items">
                    <img src="assets/icons/chevron-right.svg" alt="" width="18" height="18">
                </button>
            </div>
        </div>
    </div>
</section>

<!-- 2. Help is Here Section -->
<section class="store-section help-showcase-section" id="help" aria-labelledby="help-headline">
    <div class="section-container">
        <div class="section-header-row">
            <div class="section-title-wrap">
                <h2 id="help-headline" class="section-display-title">
                    <span class="title-primary">Help is here.</span>
                    <span class="title-secondary">Whenever and however you need it.</span>
                </h2>
            </div>
        </div>
    </div>

    <div class="carousel-container">
        <div class="carousel-track" id="help-carousel" tabindex="0" role="region" aria-label="Help Carousel">
            <?php foreach ($helpCards as $card): ?>
                <article class="store-card banner-info-card experience-card card-theme-light">
                    <div class="card-text-header">
                        <span class="card-eyebrow-text"><?= htmlspecialchars($card['eyebrow']) ?></span>
                        <h3 class="card-headline-text info-title"><?= htmlspecialchars($card['title']) ?></h3>
                        <?php if (!empty($card['subtitle'])): ?>
                            <p class="card-desc-text"><?= htmlspecialchars($card['subtitle']) ?></p>
                        <?php endif; ?>
                        <?php if (!empty($card['link_text'])): ?>
                            <span class="card-inline-action">
                                <?= htmlspecialchars($card['link_text']) ?>
                                <span class="action-chevron">&rsaquo;</span>
                            </span>
                        <?php endif; ?>
                    </div>

                    <div class="card-visual-media">
                        <?php if (!empty($card['image'])): ?>
                            <img src="<?= htmlspecialchars($card['image']) ?>" alt="<?= htmlspecialchars($card['title']) ?>" class="card-showcase-img" loading="lazy">
                        <?php else: ?>
                            <div class="blank-slot-placeholder" aria-hidden="true"></div>
                        <?php endif; ?>
                    </div>

                    <!-- Circular Next Chevron Button -->
                    <button type="button" class="card-action-circle" aria-label="More details about <?= htmlspecialchars($card['title']) ?>">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" aria-hidden="true">
                            <path d="M4.5 2.5L8 6L4.5 9.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>

                    <a href="<?= htmlspecialchars($card['url'] ?? '#') ?>" class="card-full-link" aria-label="<?= htmlspecialchars($card['eyebrow'] . ' ' . $card['title']) ?>"></a>
                </article>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="section-container">
        <div class="carousel-footer-row">
            <div class="carousel-nav-controls" aria-label="Help options navigation">
                <button class="carousel-arrow prev" data-carousel-id="help-carousel" aria-label="Previous items" disabled>
                    <img src="assets/icons/chevron-left.svg" alt="" width="18" height="18">
                </button>
                <button class="carousel-arrow next" data-carousel-id="help-carousel" aria-label="Next items">
                    <img src="assets/icons/chevron-right.svg" alt="" width="18" height="18">
                </button>
            </div>
        </div>
    </div>
</section>

