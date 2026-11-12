<?php

$categories = $db->getCategories();
?>
<section class="store-hero-section" id="store" aria-labelledby="store-headline">
    <div class="store-hero-container">
        
        <!-- Store Display Header (Exact layout matching Apple India Store reference) -->
        <div class="store-headline-row">
            <div class="headline-primary-col">
                <h1 id="store-headline" class="store-hero-title">Store</h1>
            </div>

            <div class="headline-support-col">
                <h2 class="store-hero-subtext">The best way to buy the<br>products you love.</h2>
                <div class="store-hero-actions">
                    <a href="#specialist" class="store-hero-action-link">
                        Connect with a Specialist
                        <span class="action-arrow-diag" aria-hidden="true">&#x2197;</span>
                    </a>
                    <a href="#find-a-store" class="store-hero-action-link">
                        Find an Apple Store
                        <span class="action-arrow-diag" aria-hidden="true">&#x2197;</span>
                    </a>
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

