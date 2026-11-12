<?php

$latestProducts = $db->getLatestProducts();
?>
<section class="store-section latest-products-section" id="latest" aria-labelledby="latest-headline">
    <div class="section-container">
        <div class="section-header-row">
            <div class="section-title-wrap">
                <h2 id="latest-headline" class="section-display-title">
                    <span class="title-primary">The latest.</span>
                    <span class="title-secondary">Take a look at what’s new.</span>
                </h2>
            </div>
        </div>
    </div>

    <!-- Carousel Track -->
    <div class="carousel-container">
        <div class="carousel-track" id="latest-carousel" tabindex="0" role="region" aria-label="Latest Products Carousel">
            <?php foreach ($latestProducts as $index => $product): ?>
                <?php 
                    $themeClass = ($product['theme'] ?? 'light') === 'dark' ? 'card-theme-dark' : 'card-theme-light';
                    $hasBadge = !empty($product['badge']);
                ?>
                <article class="store-card product-showcase-card <?= $themeClass ?>" data-product-id="<?= htmlspecialchars($product['id']) ?>">
                    <div class="card-text-header">
                        <?php if ($hasBadge): ?>
                            <span class="card-pill-badge"><?= htmlspecialchars($product['badge']) ?></span>
                        <?php endif; ?>
                        <span class="card-eyebrow-text"><?= htmlspecialchars($product['eyebrow']) ?></span>
                        <h3 class="card-headline-text"><?= htmlspecialchars($product['title']) ?></h3>
                        <?php if (!empty($product['price_label'])): ?>
                            <p class="card-price-text"><?= htmlspecialchars($product['price_label']) ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="card-visual-media">
                        <img src="<?= htmlspecialchars($product['image']) ?>" 
                             alt="<?= htmlspecialchars($product['alt_text'] ?? $product['title']) ?>" 
                             class="card-showcase-img"
                             width="400"
                             height="500"
                             loading="<?= $index < 3 ? 'eager' : 'lazy' ?>">
                    </div>

                    <!-- Card Action Circle (Next > Chevron Button) -->
                    <button type="button" class="card-action-circle" aria-label="Explore <?= htmlspecialchars($product['eyebrow']) ?>">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" aria-hidden="true">
                            <path d="M4.5 2.5L8 6L4.5 9.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>

                    <!-- Card Click Overlay and Link -->
                    <a href="<?= htmlspecialchars($product['url'] ?? '#') ?>" 
                       class="card-full-link" 
                       aria-label="<?= htmlspecialchars($product['eyebrow'] . ' - ' . $product['title']) ?>"></a>
                </article>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="section-container">
        <!-- Bottom-Right Carousel Navigation Controls -->
        <div class="carousel-footer-row">
            <div class="carousel-nav-controls" aria-label="Latest products navigation">
                <button class="carousel-arrow prev" data-carousel-id="latest-carousel" aria-label="Previous items" disabled>
                    <img src="assets/icons/chevron-left.svg" alt="" width="18" height="18">
                </button>
                <button class="carousel-arrow next" data-carousel-id="latest-carousel" aria-label="Next items">
                    <img src="assets/icons/chevron-right.svg" alt="" width="18" height="18">
                </button>
            </div>
        </div>
    </div>
</section>

