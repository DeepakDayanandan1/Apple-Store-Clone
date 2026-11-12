<?php
/**
 * Promotions Section
 * Includes "Help is here", "The Apple difference", "Loud and clear", 
 * "The Apple Experience", and "Special stores"
 * With blank image containers prepared for images as requested.
 */
$helpCards = $db->getSectionItems('help');
$diffCards = $db->getSectionItems('promotions');
$audioCards = $db->getSectionItems('audio');
$experienceCards = $db->getSectionItems('experience');
$specialStores = $db->getSectionItems('special_stores');
?>

<!-- 1. Help is Here Section -->
<section class="store-section help-showcase-section" id="help" aria-labelledby="help-headline">
    <div class="section-container">
        
        <div class="section-header-row">
            <div class="section-title-wrap">
                <h2 id="help-headline" class="section-display-title">
                    <span class="title-primary">Help is here.</span>
                    <span class="title-secondary">Whenever and however you need it.</span>
                </h2>
            </div>
            <div class="carousel-nav-controls" aria-label="Help options navigation">
                <button class="carousel-arrow prev" data-carousel-id="help-carousel" aria-label="Previous items" disabled>
                    <img src="assets/icons/chevron-left.svg" alt="" width="18" height="18">
                </button>
                <button class="carousel-arrow next" data-carousel-id="help-carousel" aria-label="Next items">
                    <img src="assets/icons/chevron-right.svg" alt="" width="18" height="18">
                </button>
            </div>
        </div>

        <div class="carousel-container">
            <div class="carousel-track" id="help-carousel" tabindex="0" role="region" aria-label="Help Carousel">
                <?php foreach ($helpCards as $card): ?>
                    <article class="store-card banner-info-card card-theme-light">
                        <div class="card-text-header">
                            <span class="card-eyebrow-text"><?= htmlspecialchars($card['eyebrow']) ?></span>
                            <h3 class="card-headline-text info-title"><?= htmlspecialchars($card['title']) ?></h3>
                            <?php if (!empty($card['link_text'])): ?>
                                <span class="card-inline-action">
                                    <?= htmlspecialchars($card['link_text']) ?>
                                    <span class="action-chevron">&rsaquo;</span>
                                </span>
                            <?php endif; ?>
                        </div>

                        <!-- Blank container for user provided images -->
                        <div class="card-visual-media blank-media-container">
                            <?php if (!empty($card['image'])): ?>
                                <img src="<?= htmlspecialchars($card['image']) ?>" alt="<?= htmlspecialchars($card['title']) ?>" class="card-showcase-img" loading="lazy">
                            <?php else: ?>
                                <div class="blank-slot-placeholder" aria-hidden="true"></div>
                            <?php endif; ?>
                        </div>

                        <a href="<?= htmlspecialchars($card['url'] ?? '#') ?>" class="card-full-link" aria-label="<?= htmlspecialchars($card['eyebrow'] . ' ' . $card['title']) ?>"></a>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
</section>

<!-- 2. The Apple Difference Section -->
<section class="store-section difference-showcase-section" id="difference" aria-labelledby="diff-headline">
    <div class="section-container">
        
        <div class="section-header-row">
            <div class="section-title-wrap">
                <h2 id="diff-headline" class="section-display-title">
                    <span class="title-primary">The Apple difference.</span>
                    <span class="title-secondary">Even more reasons to shop with us.</span>
                </h2>
            </div>
            <div class="carousel-nav-controls" aria-label="The Apple difference navigation">
                <button class="carousel-arrow prev" data-carousel-id="diff-carousel" aria-label="Previous items" disabled>
                    <img src="assets/icons/chevron-left.svg" alt="" width="18" height="18">
                </button>
                <button class="carousel-arrow next" data-carousel-id="diff-carousel" aria-label="Next items">
                    <img src="assets/icons/chevron-right.svg" alt="" width="18" height="18">
                </button>
            </div>
        </div>

        <div class="carousel-container">
            <div class="carousel-track" id="diff-carousel" tabindex="0" role="region" aria-label="Apple Difference Carousel">
                <?php foreach ($diffCards as $diff): ?>
                    <article class="store-card difference-feature-card card-theme-light">
                        <div class="diff-icon-wrapper">
                            <?php if (($diff['icon'] ?? '') === 'trade-in'): ?>
                                <svg width="40" height="40" viewBox="0 0 48 48" fill="none"><circle cx="24" cy="24" r="22" fill="#f5f5f7"/><path d="M16 26l8-8 8 8M24 18v14" stroke="#0071e3" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            <?php elseif (($diff['icon'] ?? '') === 'payment'): ?>
                                <svg width="40" height="40" viewBox="0 0 48 48" fill="none"><circle cx="24" cy="24" r="22" fill="#f5f5f7"/><rect x="14" y="17" width="20" height="14" rx="2" stroke="#0071e3" stroke-width="2.5"/><line x1="14" y1="22" x2="34" y2="22" stroke="#0071e3" stroke-width="2.5"/></svg>
                            <?php elseif (($diff['icon'] ?? '') === 'mac'): ?>
                                <svg width="40" height="40" viewBox="0 0 48 48" fill="none"><circle cx="24" cy="24" r="22" fill="#f5f5f7"/><rect x="15" y="16" width="18" height="12" rx="1.5" stroke="#0071e3" stroke-width="2.5"/><path d="M12 31h24" stroke="#0071e3" stroke-width="2.5" stroke-linecap="round"/></svg>
                            <?php elseif (($diff['icon'] ?? '') === 'engraving'): ?>
                                <svg width="40" height="40" viewBox="0 0 48 48" fill="none"><circle cx="24" cy="24" r="22" fill="#f5f5f7"/><path d="M17 31l10-14 4 4-10 14-4-4z" stroke="#0071e3" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            <?php else: ?>
                                <svg width="40" height="40" viewBox="0 0 48 48" fill="none"><circle cx="24" cy="24" r="22" fill="#f5f5f7"/><path d="M14 19h14v10H14zm14 3h4l2 3v4h-6zm-8 8a2 2 0 100-4 2 2 0 000 4zm10 0a2 2 0 100-4 2 2 0 000 4z" stroke="#0071e3" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            <?php endif; ?>
                        </div>

                        <div class="card-text-header">
                            <span class="card-eyebrow-text"><?= htmlspecialchars($diff['eyebrow']) ?></span>
                            <h3 class="card-headline-text diff-headline"><?= htmlspecialchars($diff['title']) ?></h3>
                            <?php if (!empty($diff['subtitle'])): ?>
                                <p class="card-desc-text"><?= htmlspecialchars($diff['subtitle']) ?></p>
                            <?php endif; ?>
                        </div>

                        <a href="<?= htmlspecialchars($diff['url'] ?? '#') ?>" class="card-full-link" aria-label="<?= htmlspecialchars($diff['eyebrow']) ?>"></a>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
</section>

<!-- 3. Loud and Clear Audio Section -->
<section class="store-section audio-showcase-section" id="audio" aria-labelledby="audio-headline">
    <div class="section-container">
        
        <div class="section-header-row">
            <div class="section-title-wrap">
                <h2 id="audio-headline" class="section-display-title">
                    <span class="title-primary">Loud and clear.</span>
                    <span class="title-secondary">Unmatched sound and seamless listening.</span>
                </h2>
            </div>
            <div class="carousel-nav-controls" aria-label="Audio navigation">
                <button class="carousel-arrow prev" data-carousel-id="audio-carousel" aria-label="Previous items" disabled>
                    <img src="assets/icons/chevron-left.svg" alt="" width="18" height="18">
                </button>
                <button class="carousel-arrow next" data-carousel-id="audio-carousel" aria-label="Next items">
                    <img src="assets/icons/chevron-right.svg" alt="" width="18" height="18">
                </button>
            </div>
        </div>

        <div class="carousel-container">
            <div class="carousel-track" id="audio-carousel" tabindex="0" role="region" aria-label="Audio Products Carousel">
                <?php foreach ($audioCards as $audio): ?>
                    <article class="store-card product-showcase-card card-theme-light">
                        <div class="card-text-header">
                            <span class="card-eyebrow-text"><?= htmlspecialchars($audio['eyebrow']) ?></span>
                            <h3 class="card-headline-text"><?= htmlspecialchars($audio['title']) ?></h3>
                            <p class="card-price-text"><?= htmlspecialchars($audio['price_label']) ?></p>
                        </div>
                        <div class="card-visual-media blank-media-container">
                            <?php if (!empty($audio['image'])): ?>
                                <img src="<?= htmlspecialchars($audio['image']) ?>" alt="<?= htmlspecialchars($audio['title']) ?>" class="card-showcase-img" loading="lazy">
                            <?php else: ?>
                                <div class="blank-slot-placeholder" aria-hidden="true"></div>
                            <?php endif; ?>
                        </div>
                        <a href="<?= htmlspecialchars($audio['url'] ?? '#') ?>" class="card-full-link" aria-label="<?= htmlspecialchars($audio['eyebrow']) ?>"></a>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
</section>

<!-- 4. The Apple Experience Section -->
<section class="store-section experience-showcase-section" id="experience" aria-labelledby="exp-headline">
    <div class="section-container">
        
        <div class="section-header-row">
            <div class="section-title-wrap">
                <h2 id="exp-headline" class="section-display-title">
                    <span class="title-primary">The Apple Experience.</span>
                    <span class="title-secondary">Do even more with Apple products and services.</span>
                </h2>
            </div>
            <div class="carousel-nav-controls" aria-label="Experience navigation">
                <button class="carousel-arrow prev" data-carousel-id="exp-carousel" aria-label="Previous items" disabled>
                    <img src="assets/icons/chevron-left.svg" alt="" width="18" height="18">
                </button>
                <button class="carousel-arrow next" data-carousel-id="exp-carousel" aria-label="Next items">
                    <img src="assets/icons/chevron-right.svg" alt="" width="18" height="18">
                </button>
            </div>
        </div>

        <div class="carousel-container">
            <div class="carousel-track" id="exp-carousel" tabindex="0" role="region" aria-label="Apple Experience Carousel">
                <?php foreach ($experienceCards as $exp): ?>
                    <?php $isDark = ($exp['theme'] ?? 'light') === 'dark'; ?>
                    <article class="store-card banner-info-card <?= $isDark ? 'card-theme-dark' : 'card-theme-light' ?>">
                        <div class="card-text-header">
                            <span class="card-eyebrow-text"><?= htmlspecialchars($exp['eyebrow']) ?></span>
                            <h3 class="card-headline-text info-title"><?= htmlspecialchars($exp['title']) ?></h3>
                            <?php if (!empty($exp['subtitle'])): ?>
                                <p class="card-desc-text"><?= htmlspecialchars($exp['subtitle']) ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="card-visual-media blank-media-container">
                            <?php if (!empty($exp['image'])): ?>
                                <img src="<?= htmlspecialchars($exp['image']) ?>" alt="<?= htmlspecialchars($exp['title']) ?>" class="card-showcase-img" loading="lazy">
                            <?php else: ?>
                                <div class="blank-slot-placeholder" aria-hidden="true"></div>
                            <?php endif; ?>
                        </div>
                        <a href="<?= htmlspecialchars($exp['url'] ?? '#') ?>" class="card-full-link" aria-label="<?= htmlspecialchars($exp['eyebrow']) ?>"></a>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
</section>

<!-- 5. Special Stores Section -->
<section class="store-section special-stores-section" id="special-stores" aria-labelledby="stores-headline">
    <div class="section-container">
        
        <div class="section-header-row">
            <div class="section-title-wrap">
                <h2 id="stores-headline" class="section-display-title">
                    <span class="title-primary">Special stores.</span>
                    <span class="title-secondary">Exclusive savings for students and educators.</span>
                </h2>
            </div>
            <div class="carousel-nav-controls" aria-label="Special stores navigation">
                <button class="carousel-arrow prev" data-carousel-id="stores-carousel" aria-label="Previous items" disabled>
                    <img src="assets/icons/chevron-left.svg" alt="" width="18" height="18">
                </button>
                <button class="carousel-arrow next" data-carousel-id="stores-carousel" aria-label="Next items">
                    <img src="assets/icons/chevron-right.svg" alt="" width="18" height="18">
                </button>
            </div>
        </div>

        <div class="carousel-container">
            <div class="carousel-track" id="stores-carousel" tabindex="0" role="region" aria-label="Special Stores Carousel">
                <?php foreach ($specialStores as $store): ?>
                    <article class="store-card banner-info-card card-theme-light">
                        <div class="card-text-header">
                            <span class="card-eyebrow-text"><?= htmlspecialchars($store['eyebrow']) ?></span>
                            <h3 class="card-headline-text info-title"><?= htmlspecialchars($store['title']) ?></h3>
                            <p class="card-desc-text"><?= htmlspecialchars($store['subtitle']) ?></p>
                        </div>
                        <div class="card-visual-media blank-media-container">
                            <?php if (!empty($store['image'])): ?>
                                <img src="<?= htmlspecialchars($store['image']) ?>" alt="<?= htmlspecialchars($store['title']) ?>" class="card-showcase-img" loading="lazy">
                            <?php else: ?>
                                <div class="blank-slot-placeholder" aria-hidden="true"></div>
                            <?php endif; ?>
                        </div>
                        <a href="<?= htmlspecialchars($store['url'] ?? '#') ?>" class="card-full-link" aria-label="<?= htmlspecialchars($store['eyebrow']) ?>"></a>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
</section>
