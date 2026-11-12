<?php
/**
 * Products Section - The Latest
 * Horizontal Product Spotlight Carousel
 */
$latestProducts = $db->getLatestProducts();
?>
<section class="store-section latest-products-section" id="latest" aria-labelledby="latest-headline">
    <div class="section-container">
        
        <!-- Section Header with Title and Carousel Arrows -->
        <div class="section-header-row">
            <div class="section-title-wrap">
                <h2 id="latest-headline" class="section-display-title">
                    <span class="title-primary">The latest.</span>
                    <span class="title-secondary">Take a look at what’s new right now.</span>
                </h2>
            </div>
            <div class="carousel-nav-controls" aria-label="Latest products navigation">
                <button class="carousel-arrow prev" data-carousel-id="latest-carousel" aria-label="Previous items" disabled>
                    <img src="assets/icons/chevron-left.svg" alt="" width="18" height="18">
                </button>
                <button class="carousel-arrow next" data-carousel-id="latest-carousel" aria-label="Next items">
                    <img src="assets/icons/chevron-right.svg" alt="" width="18" height="18">
                </button>
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

                        <!-- Card Click Overlay and Buy Button -->
                        <a href="<?= htmlspecialchars($product['url'] ?? '#') ?>" 
                           class="card-full-link" 
                           aria-label="<?= htmlspecialchars($product['eyebrow'] . ' - ' . $product['title']) ?>"></a>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
</section>

