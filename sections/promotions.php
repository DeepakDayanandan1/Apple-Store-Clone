<?php
/**
 * Promotions & Specialty Sections
 * Includes:
 * 1. The Apple experience
 * 2. Special stores (Education, Business)
 * 3. Quick Links
 */
$experienceCards = $db->getSectionItems('experience');
$specialStores = $db->getSectionItems('special_stores');
$quickLinks = $db->getQuickLinks();
?>

<!-- 1. The Apple Experience Section -->
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

    <div class="section-container">
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

<!-- 2. Special Stores Section -->
<section class="store-section special-stores-section" id="special-stores" aria-labelledby="stores-headline">
    <div class="section-container">
        <div class="section-header-row">
            <div class="section-title-wrap">
                <h2 id="stores-headline" class="section-display-title">
                    <span class="title-primary">Special stores.</span>
                    <span class="title-secondary">Exclusive savings for education and businesses.</span>
                </h2>
            </div>
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

    <div class="section-container">
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

<!-- 3. Quick Links Section -->
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
