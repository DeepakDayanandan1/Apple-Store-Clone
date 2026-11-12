<?php
/**
 * Audio Products Section - Loud and Clear
 * Showcasing AirPods, HomePod, and Beats audio hardware
 */
$audioCards = $db->getSectionItems('audio');
?>
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

    <div class="section-container">
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
