<?php

$ribbon = $db->getRibbon();
?>
<!DOCTYPE html>
<html lang="en-IN" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Apple Store Online - Apple (IN)</title>
    <meta name="description" content="Shop the latest Apple products, accessories, and special offers. Enjoy free delivery, No Cost EMI, instant cashback, and personalized help from Apple Specialists.">
    
    <!-- Apple Favicon -->
    <link rel="icon" type="image/svg+xml" href="assets/icons/apple-title.svg">
    
    <!-- Stylesheets with Cache Busting -->
    <link rel="stylesheet" href="css/style.css?v=<?= file_exists(__DIR__ . '/../css/style.css') ? filemtime(__DIR__ . '/../css/style.css') : '2.0' ?>">
    <link rel="stylesheet" href="css/header.css?v=<?= file_exists(__DIR__ . '/../css/header.css') ? filemtime(__DIR__ . '/../css/header.css') : '2.0' ?>">
    <link rel="stylesheet" href="css/sections.css?v=<?= file_exists(__DIR__ . '/../css/sections.css') ? filemtime(__DIR__ . '/../css/sections.css') : '2.0' ?>">
    <link rel="stylesheet" href="css/responsive.css?v=<?= file_exists(__DIR__ . '/../css/responsive.css') ? filemtime(__DIR__ . '/../css/responsive.css') : '2.0' ?>">
</head>
<body class="apple-store-page">

    <!-- Global Sticky Navigation -->
    <?php include __DIR__ . '/navigation.php'; ?>

    <!-- Promotional Announcement Ribbon -->
    <?php if (!empty($ribbon)): ?>
    <aside class="ribbon-banner" aria-label="Special Offers">
        <div class="ribbon-container">
            <p class="ribbon-content">
                <span class="ribbon-title"><?= htmlspecialchars($ribbon['title'] ?? '') ?></span>
                <?php if (!empty($ribbon['highlight_text'])): ?>
                    <span class="ribbon-highlight"><?= htmlspecialchars($ribbon['highlight_text']) ?></span>
                <?php endif; ?>
                <a href="<?= htmlspecialchars($ribbon['link_url'] ?? '#latest') ?>" class="ribbon-cta">
                    <?= htmlspecialchars($ribbon['link_text'] ?? 'See offers') ?>
                    <span class="ribbon-circle-icon" aria-hidden="true">&#x2295;</span>
                </a>
            </p>
        </div>
    </aside>
    <?php endif; ?>

    <main id="main-content" class="main-content" role="main">

