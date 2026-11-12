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
                        <?php if (($diff['icon'] ?? '') === 'trade-in'): ?>
                            <svg width="36" height="36" viewBox="0 0 40 40" fill="none">
                                <circle cx="20" cy="20" r="18" fill="#e8f5e9"/>
                                <path d="M12 20a8 8 0 0 1 13.6-5.7L27 13v6h-6l2.7-2.7A6 6 0 0 0 14 20h-2zm16 0a8 8 0 0 1-13.6 5.7L13 27v-6h6l-2.7 2.7A6 6 0 0 0 26 20h2z" fill="#008000"/>
                            </svg>
                        <?php elseif (($diff['icon'] ?? '') === 'payment'): ?>
                            <svg width="36" height="36" viewBox="0 0 40 40" fill="none">
                                <circle cx="20" cy="20" r="18" fill="#e8f2fc"/>
                                <rect x="10" y="13" width="20" height="14" rx="3" stroke="#0071e3" stroke-width="2"/>
                                <line x1="10" y1="18" x2="30" y2="18" stroke="#0071e3" stroke-width="2"/>
                                <rect x="14" y="21" width="4" height="3" rx="0.5" fill="#0071e3"/>
                            </svg>
                        <?php elseif (($diff['icon'] ?? '') === 'mac'): ?>
                            <svg width="36" height="36" viewBox="0 0 40 40" fill="none">
                                <circle cx="20" cy="20" r="18" fill="#fdebee"/>
                                <rect x="10" y="12" width="20" height="13" rx="2" stroke="#e30000" stroke-width="2"/>
                                <path d="M17 25l-2 4h10l-2-4" stroke="#e30000" stroke-width="1.8" stroke-linecap="round"/>
                                <circle cx="20" cy="18.5" r="2.5" stroke="#e30000" stroke-width="1.8"/>
                            </svg>
                        <?php elseif (($diff['icon'] ?? '') === 'engraving'): ?>
                            <svg width="36" height="36" viewBox="0 0 40 40" fill="none">
                                <circle cx="20" cy="20" r="18" fill="#f4ebfc"/>
                                <circle cx="20" cy="20" r="8" stroke="#b33bf6" stroke-width="2"/>
                                <circle cx="17.5" cy="18.5" r="1" fill="#b33bf6"/>
                                <circle cx="22.5" cy="18.5" r="1" fill="#b33bf6"/>
                                <path d="M16.5 22.5c.8 1.5 2.2 2 3.5 2s2.7-.5 3.5-2" stroke="#b33bf6" stroke-width="1.8" stroke-linecap="round"/>
                            </svg>
                        <?php else: ?>
                            <svg width="36" height="36" viewBox="0 0 40 40" fill="none">
                                <circle cx="20" cy="20" r="18" fill="#e6f7f6"/>
                                <path d="M10 15h13v9H10zm13 3h4l3 3v3h-7zm-7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm11 0a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" stroke="#009688" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        <?php endif; ?>
                    </div>

                    <div class="diff-card-body">
                        <h3 class="diff-card-headline">
                            <span class="diff-lead-highlight" style="color: <?= htmlspecialchars($accentColor) ?>;"><?= htmlspecialchars($leadText) ?></span>
                            <span class="diff-body-text"><?= htmlspecialchars($bodyText) ?></span>
                        </h3>
                    </div>

                    <!-- Circular Next Chevron Button -->
                    <button type="button" class="card-action-circle diff-action-circle" aria-label="Learn more about <?= htmlspecialchars($leadText) ?>">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" aria-hidden="true">
                            <path d="M4.5 2.5L8 6L4.5 9.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
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
