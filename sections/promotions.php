<?php
/**
 * Promotions & Specialty Sections
 * Order matching Apple India Store:
 * 1. The Apple Store difference
 * 2. Help is here
 * 3. Loud and clear
 * 4. The Apple experience
 * 5. Special stores
 * 6. Quick Links
 */
$diffCards = $db->getSectionItems('promotions');
$helpCards = $db->getSectionItems('help');
$audioCards = $db->getSectionItems('audio');
$experienceCards = $db->getSectionItems('experience');
$specialStores = $db->getSectionItems('special_stores');
$quickLinks = $db->getQuickLinks();
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
                                <!-- Trade In Green Circular Arrows -->
                                <svg width="36" height="36" viewBox="0 0 40 40" fill="none">
                                    <circle cx="20" cy="20" r="18" fill="#e8f5e9"/>
                                    <path d="M12 20a8 8 0 0 1 13.6-5.7L27 13v6h-6l2.7-2.7A6 6 0 0 0 14 20h-2zm16 0a8 8 0 0 1-13.6 5.7L13 27v-6h6l-2.7 2.7A6 6 0 0 0 26 20h2z" fill="#008000"/>
                                </svg>
                            <?php elseif (($diff['icon'] ?? '') === 'payment'): ?>
                                <!-- Payment Blue Card -->
                                <svg width="36" height="36" viewBox="0 0 40 40" fill="none">
                                    <circle cx="20" cy="20" r="18" fill="#e8f2fc"/>
                                    <rect x="10" y="13" width="20" height="14" rx="3" stroke="#0071e3" stroke-width="2"/>
                                    <line x1="10" y1="18" x2="30" y2="18" stroke="#0071e3" stroke-width="2"/>
                                    <rect x="14" y="21" width="4" height="3" rx="0.5" fill="#0071e3"/>
                                </svg>
                            <?php elseif (($diff['icon'] ?? '') === 'mac'): ?>
                                <!-- Mac Red Customization Display -->
                                <svg width="36" height="36" viewBox="0 0 40 40" fill="none">
                                    <circle cx="20" cy="20" r="18" fill="#fdebee"/>
                                    <rect x="10" y="12" width="20" height="13" rx="2" stroke="#e30000" stroke-width="2"/>
                                    <path d="M17 25l-2 4h10l-2-4" stroke="#e30000" stroke-width="1.8" stroke-linecap="round"/>
                                    <circle cx="20" cy="18.5" r="2.5" stroke="#e30000" stroke-width="1.8"/>
                                </svg>
                            <?php elseif (($diff['icon'] ?? '') === 'engraving'): ?>
                                <!-- Engraving Purple Emoji / Mix -->
                                <svg width="36" height="36" viewBox="0 0 40 40" fill="none">
                                    <circle cx="20" cy="20" r="18" fill="#f4ebfc"/>
                                    <circle cx="20" cy="20" r="8" stroke="#b33bf6" stroke-width="2"/>
                                    <circle cx="17.5" cy="18.5" r="1" fill="#b33bf6"/>
                                    <circle cx="22.5" cy="18.5" r="1" fill="#b33bf6"/>
                                    <path d="M16.5 22.5c.8 1.5 2.2 2 3.5 2s2.7-.5 3.5-2" stroke="#b33bf6" stroke-width="1.8" stroke-linecap="round"/>
                                </svg>
                            <?php else: ?>
                                <!-- Delivery Teal Truck -->
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

<!-- 3. Loud and Clear Audio Section -->
<section class="store-section audio-showcase-section" id="audio" aria-labelledby="audio-headline">
    <div class="section-container">
        
        <div class="section-header-row">
            <div class="section-title-wrap">
                <h2 id="audio-headline" class="section-display-title">
                    <span class="title-primary">Loud and clear.</span>
                    <span class="title-secondary">Unmatched sound for high-quality music.</span>
                </h2>
            </div>
        </div>

        <div class="carousel-container">
            <div class="carousel-track" id="audio-carousel" tabindex="0" role="region" aria-label="Audio Products Carousel">
                <?php foreach ($audioCards as $audio): ?>
                    <?php if (!empty($audio['is_lead'])): ?>
                        <!-- Lead Banner Card (Apple Music) -->
                        <article class="store-card banner-info-card card-theme-light lead-audio-card">
                            <div class="card-text-header">
                                <span class="card-eyebrow-text"><?= htmlspecialchars($audio['eyebrow']) ?></span>
                                <h3 class="card-headline-text info-title"><?= htmlspecialchars($audio['title']) ?></h3>
                                <p class="card-desc-text"><?= htmlspecialchars($audio['description']) ?></p>
                                <span class="card-inline-action">
                                    <?= htmlspecialchars($audio['price_label']) ?>
                                    <span class="action-chevron">&rsaquo;</span>
                                </span>
                            </div>
                            <div class="card-visual-media">
                                <img src="<?= htmlspecialchars($audio['image']) ?>" alt="<?= htmlspecialchars($audio['title']) ?>" class="card-showcase-img" loading="lazy">
                            </div>
                            <a href="<?= htmlspecialchars($audio['url'] ?? '#') ?>" class="card-full-link" aria-label="<?= htmlspecialchars($audio['title']) ?>"></a>
                        </article>
                    <?php else: ?>
                        <!-- Audio Product Card -->
                        <?php 
                            $swatches = $audio['swatches'] ?? [];
                            $hasSwatches = !empty($swatches);
                            $badge = $audio['badge'] ?? '';
                        ?>
                        <article class="store-card accessory-product-card audio-product-card card-theme-light"
                                 data-product-id="<?= htmlspecialchars($audio['id']) ?>"
                                 data-product-name="<?= htmlspecialchars($audio['title']) ?>"
                                 data-product-price="<?= htmlspecialchars($audio['price_raw'] ?? 0) ?>"
                                 data-product-image="<?= htmlspecialchars($audio['image']) ?>">
                            
                            <div class="accessory-card-image-wrap">
                                <img src="<?= htmlspecialchars($audio['image']) ?>" 
                                     alt="<?= htmlspecialchars($audio['title']) ?>" 
                                     class="accessory-product-img"
                                     width="220"
                                     height="220"
                                     loading="lazy">
                            </div>

                            <!-- Color Swatches Row -->
                            <div class="accessory-swatches-row" aria-label="Color options">
                                <?php if ($hasSwatches && count($swatches) > 1): ?>
                                    <?php foreach ($swatches as $sIdx => $swatch): ?>
                                        <button type="button" 
                                                class="swatch-dot <?= $sIdx === 0 ? 'active' : '' ?>" 
                                                style="background-color: <?= htmlspecialchars($swatch['hex']) ?>;"
                                                title="<?= htmlspecialchars($swatch['color']) ?>"
                                                aria-label="<?= htmlspecialchars($swatch['color']) ?>"
                                                data-color-name="<?= htmlspecialchars($swatch['color']) ?>">
                                        </button>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <span class="swatch-spacer" aria-hidden="true">&nbsp;</span>
                                <?php endif; ?>
                            </div>

                            <div class="accessory-card-content">
                                <?php if (!empty($badge)): ?>
                                    <span class="accessory-badge"><?= htmlspecialchars($badge) ?></span>
                                <?php else: ?>
                                    <span class="accessory-badge-spacer" aria-hidden="true">&nbsp;</span>
                                <?php endif; ?>
                                <h3 class="accessory-title"><?= htmlspecialchars($audio['title']) ?></h3>
                                <p class="accessory-price"><?= htmlspecialchars($audio['price_label']) ?></p>
                            </div>

                            <!-- Bottom-right Action Circle (Next > Chevron Button) -->
                            <button type="button" class="card-action-circle accessory-add-btn" aria-label="Add <?= htmlspecialchars($audio['title']) ?> to bag">
                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" aria-hidden="true">
                                    <path d="M4.5 2.5L8 6L4.5 9.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                        </article>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="carousel-footer-row">
            <div class="carousel-nav-controls" aria-label="Audio navigation">
                <button class="carousel-arrow prev" data-carousel-id="audio-carousel" aria-label="Previous items" disabled>
                    <img src="assets/icons/chevron-left.svg" alt="" width="18" height="18">
                </button>
                <button class="carousel-arrow next" data-carousel-id="audio-carousel" aria-label="Next items">
                    <img src="assets/icons/chevron-right.svg" alt="" width="18" height="18">
                </button>
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
                    <span class="title-primary">The Apple experience.</span>
                    <span class="title-secondary">Do even more with Apple products and services.</span>
                </h2>
            </div>
        </div>

        <div class="carousel-container">
            <div class="carousel-track" id="exp-carousel" tabindex="0" role="region" aria-label="Apple Experience Carousel">
                <?php foreach ($experienceCards as $exp): ?>
                    <?php $isDark = ($exp['theme'] ?? 'light') === 'dark'; ?>
                    <article class="store-card experience-card <?= $isDark ? 'card-theme-dark' : 'card-theme-light' ?>">
                        <div class="card-text-header">
                            <span class="card-eyebrow-text"><?= htmlspecialchars($exp['eyebrow']) ?></span>
                            <h3 class="card-headline-text info-title"><?= htmlspecialchars($exp['title']) ?></h3>
                            <?php if (!empty($exp['subtitle'])): ?>
                                <p class="card-desc-text"><?= htmlspecialchars($exp['subtitle']) ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="card-visual-media">
                            <?php if (!empty($exp['image'])): ?>
                                <img src="<?= htmlspecialchars($exp['image']) ?>" alt="<?= htmlspecialchars($exp['title']) ?>" class="card-showcase-img" loading="lazy">
                            <?php else: ?>
                                <div class="blank-slot-placeholder" aria-hidden="true"></div>
                            <?php endif; ?>
                        </div>

                        <!-- Circular Next Chevron Button -->
                        <button type="button" class="card-action-circle" aria-label="Explore <?= htmlspecialchars($exp['eyebrow']) ?>">
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" aria-hidden="true">
                                <path d="M4.5 2.5L8 6L4.5 9.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>

                        <a href="<?= htmlspecialchars($exp['url'] ?? '#') ?>" class="card-full-link" aria-label="<?= htmlspecialchars($exp['eyebrow'] . ' - ' . $exp['title']) ?>"></a>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="carousel-footer-row">
            <div class="carousel-nav-controls" aria-label="Experience navigation">
                <button class="carousel-arrow prev" data-carousel-id="exp-carousel" aria-label="Previous items" disabled>
                    <img src="assets/icons/chevron-left.svg" alt="" width="18" height="18">
                </button>
                <button class="carousel-arrow next" data-carousel-id="exp-carousel" aria-label="Next items">
                    <img src="assets/icons/chevron-right.svg" alt="" width="18" height="18">
                </button>
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
                    <span class="title-secondary">Exclusive savings for education.</span>
                </h2>
            </div>
        </div>

        <div class="carousel-container">
            <div class="carousel-track" id="stores-carousel" tabindex="0" role="region" aria-label="Special Stores Carousel">
                <?php foreach ($specialStores as $store): ?>
                    <article class="store-card special-store-card card-theme-light">
                        <div class="card-text-header">
                            <span class="card-eyebrow-text"><?= htmlspecialchars($store['eyebrow']) ?></span>
                            <h3 class="card-headline-text info-title"><?= htmlspecialchars($store['title']) ?></h3>
                            <p class="card-desc-text"><?= htmlspecialchars($store['subtitle']) ?></p>
                            <?php if (!empty($store['link_text'])): ?>
                                <span class="card-inline-action">
                                    <?= htmlspecialchars($store['link_text']) ?>
                                    <span class="action-chevron">&rsaquo;</span>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="card-visual-media">
                            <?php if (!empty($store['image'])): ?>
                                <img src="<?= htmlspecialchars($store['image']) ?>" alt="<?= htmlspecialchars($store['title']) ?>" class="card-showcase-img" loading="lazy">
                            <?php else: ?>
                                <div class="blank-slot-placeholder" aria-hidden="true"></div>
                            <?php endif; ?>
                        </div>

                        <!-- Circular Next Chevron Button -->
                        <button type="button" class="card-action-circle" aria-label="Explore <?= htmlspecialchars($store['eyebrow']) ?>">
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" aria-hidden="true">
                                <path d="M4.5 2.5L8 6L4.5 9.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>

                        <a href="<?= htmlspecialchars($store['url'] ?? '#') ?>" class="card-full-link" aria-label="<?= htmlspecialchars($store['eyebrow'] . ' - ' . $store['title']) ?>"></a>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="carousel-footer-row">
            <div class="carousel-nav-controls" aria-label="Special stores navigation">
                <button class="carousel-arrow prev" data-carousel-id="stores-carousel" aria-label="Previous items" disabled>
                    <img src="assets/icons/chevron-left.svg" alt="" width="18" height="18">
                </button>
                <button class="carousel-arrow next" data-carousel-id="stores-carousel" aria-label="Next items">
                    <img src="assets/icons/chevron-right.svg" alt="" width="18" height="18">
                </button>
            </div>
        </div>

    </div>
</section>

<!-- 6. Quick Links Section (At the end right above the footer) -->
<?php if (!empty($quickLinks)): ?>
<section class="store-section quick-links-section" id="quick-links" aria-labelledby="quicklinks-headline">
    <div class="section-container">
        <div class="quick-links-shelf">
            <h3 id="quicklinks-headline" class="quick-links-headline">Quick Links</h3>
            <div class="quick-links-pills">
                <?php foreach ($quickLinks as $ql): ?>
                    <a href="<?= htmlspecialchars($ql['url']) ?>" class="quick-link-pill">
                        <?= htmlspecialchars($ql['label']) ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
