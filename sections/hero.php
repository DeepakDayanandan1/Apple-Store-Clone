<?php
/**
 * Hero Section
 * Store Header & Category Navigation Shelf
 */
$categories = $db->getCategories();
?>
<section class="store-hero-section" id="store" aria-labelledby="store-headline">
    <div class="store-hero-container">
        
        <!-- Store Display Header -->
        <div class="store-headline-row">
            <div class="headline-primary-col">
                <h1 id="store-headline" class="store-hero-headline">
                    <span class="headline-brand">Store.</span>
                    <span class="headline-subtext">The best way to buy the products you love.</span>
                </h1>
            </div>

            <div class="headline-support-col">
                <!-- Ask a Specialist -->
                <div class="support-item">
                    <div class="support-avatar">
                        <img src="https://store.storeimages.cdn-apple.com/4668/as-images.apple.com/is/store-chat-specialist-icon-202309_GEO_IN?wid=70&hei=70&fmt=jpeg&qlt=90" 
                             alt="Specialist"
                             class="support-avatar-img"
                             onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                        <img src="assets/icons/specialist.svg" alt="Specialist" class="support-avatar-svg" style="display: none;" width="36" height="36">
                    </div>
                    <div class="support-info">
                        <span class="support-label">Need shopping help?</span>
                        <a href="#specialist" class="support-link">
                            Ask a Specialist
                            <span class="support-link-arrow">&rsaquo;</span>
                        </a>
                    </div>
                </div>

                <!-- Visit Apple Store -->
                <div class="support-item">
                    <div class="support-avatar">
                        <div class="store-icon-badge">
                            <img src="assets/icons/store.svg" alt="Retail Store" width="36" height="36">
                        </div>
                    </div>
                    <div class="support-info">
                        <span class="support-label">Visit an Apple Store</span>
                        <a href="#find-a-store" class="support-link">
                            Find one near you
                            <span class="support-link-arrow">&rsaquo;</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Category Horizontal Navigation Shelf -->
        <nav class="category-shelf-nav" aria-label="Product Categories">
            <ul class="category-shelf-list" role="list">
                <?php foreach ($categories as $cat): ?>
                    <li class="category-shelf-item" role="listitem">
                        <a href="<?= htmlspecialchars($cat['url'] ?? '#' . $cat['slug']) ?>" class="category-shelf-link">
                            <div class="category-thumb-wrapper">
                                <img src="<?= htmlspecialchars($cat['image']) ?>" 
                                     alt="<?= htmlspecialchars($cat['name']) ?>" 
                                     class="category-thumb-img"
                                     width="120"
                                     height="78"
                                     loading="eager">
                            </div>
                            <span class="category-thumb-title"><?= htmlspecialchars($cat['name']) ?></span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>

    </div>
</section>

