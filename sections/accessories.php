<?php
/**
 * Accessories Section
 * Carousel with Lead Promo Card, Interactive Swatched Accessories, and End Card.
 */
$accessoriesData = $db->getAccessories();
$leadCard = $accessoriesData['lead_card'] ?? null;
$items = $accessoriesData['items'] ?? [];
$endCard = $accessoriesData['end_card'] ?? null;
?>
<section class="store-section accessories-showcase-section" id="accessories" aria-labelledby="accessories-headline">
    <div class="section-container">
        
        <!-- Section Header (Headline only, matching Apple Store design) -->
        <div class="section-header-row">
            <div class="section-title-wrap">
                <h2 id="accessories-headline" class="section-display-title">
                    <span class="title-primary">Accessories.</span>
                    <span class="title-secondary">Essentials that pair perfectly with your favourite devices.</span>
                </h2>
            </div>
        </div>

        <!-- Accessories Carousel Track -->
        <div class="carousel-container">
            <div class="carousel-track" id="accessories-carousel" tabindex="0" role="region" aria-label="Accessories Carousel">
                
                <!-- 1. Lead Banner Card -->
                <?php if ($leadCard): ?>
                    <article class="store-card banner-info-card card-theme-light lead-accessory-card">
                        <div class="card-text-header">
                            <h3 class="card-headline-text info-title"><?= htmlspecialchars($leadCard['title']) ?></h3>
                            <p class="card-desc-text"><?= htmlspecialchars($leadCard['subtitle']) ?></p>
                            <span class="card-inline-action">
                                Explore all accessories
                                <span class="action-chevron">&rsaquo;</span>
                            </span>
                        </div>
                        <div class="card-visual-media">
                            <img src="<?= htmlspecialchars($leadCard['image']) ?>" 
                                 alt="<?= htmlspecialchars($leadCard['title']) ?>" 
                                 class="card-showcase-img"
                                 width="400"
                                 height="500"
                                 loading="lazy">
                        </div>
                        <a href="#all-accessories" class="card-full-link" aria-label="<?= htmlspecialchars($leadCard['title']) ?>"></a>
                    </article>
                <?php endif; ?>

                <!-- 2. Accessory Product Cards -->
                <?php foreach ($items as $item): ?>
                    <?php 
                        $swatches = $item['swatches'] ?? [];
                        $hasSwatches = !empty($swatches);
                        $badge = $item['badge'] ?? '';
                    ?>
                    <article class="store-card accessory-product-card card-theme-light" 
                             data-product-id="<?= htmlspecialchars($item['id']) ?>"
                             data-product-name="<?= htmlspecialchars($item['name']) ?>"
                             data-product-price="<?= htmlspecialchars($item['price_raw'] ?? 0) ?>"
                             data-product-image="<?= htmlspecialchars($item['image']) ?>">
                        
                        <div class="accessory-card-image-wrap">
                            <img src="<?= htmlspecialchars($item['image']) ?>" 
                                 alt="<?= htmlspecialchars($item['name']) ?>" 
                                 class="accessory-product-img"
                                 width="240"
                                 height="240"
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
                            <h3 class="accessory-title"><?= htmlspecialchars($item['name']) ?></h3>
                            <p class="accessory-price"><?= htmlspecialchars($item['price_label']) ?></p>
                        </div>

                        <!-- Bottom-right Action Circle (Next > Chevron Button) -->
                        <button type="button" class="card-action-circle accessory-add-btn" aria-label="Add <?= htmlspecialchars($item['name']) ?> to bag">
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" aria-hidden="true">
                                <path d="M4.5 2.5L8 6L4.5 9.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </article>
                <?php endforeach; ?>

                <!-- 3. End Exploration Card -->
                <?php if ($endCard): ?>
                    <article class="store-card banner-info-card card-theme-light end-accessory-card">
                        <div class="card-text-header">
                            <h3 class="card-headline-text info-title"><?= htmlspecialchars($endCard['title']) ?></h3>
                            <p class="card-desc-text"><?= htmlspecialchars($endCard['subtitle']) ?></p>
                            <span class="card-inline-action">
                                Browse all
                                <span class="action-chevron">&rsaquo;</span>
                            </span>
                        </div>
                        <div class="card-visual-media">
                            <img src="<?= htmlspecialchars($endCard['image']) ?>" 
                                 alt="<?= htmlspecialchars($endCard['title']) ?>" 
                                 class="card-showcase-img"
                                 width="400"
                                 height="500"
                                 loading="lazy">
                        </div>
                        <a href="#all-accessories" class="card-full-link" aria-label="Explore all accessories"></a>
                    </article>
                <?php endif; ?>

            </div>
        </div>

        <!-- Bottom-Right Carousel Navigation Controls -->
        <div class="carousel-footer-row">
            <div class="carousel-nav-controls" aria-label="Accessories navigation">
                <button class="carousel-arrow prev" data-carousel-id="accessories-carousel" aria-label="Previous items" disabled>
                    <img src="assets/icons/chevron-left.svg" alt="" width="18" height="18">
                </button>
                <button class="carousel-arrow next" data-carousel-id="accessories-carousel" aria-label="Next items">
                    <img src="assets/icons/chevron-right.svg" alt="" width="18" height="18">
                </button>
            </div>
        </div>

    </div>
</section>

