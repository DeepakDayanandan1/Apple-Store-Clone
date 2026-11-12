<?php
/**
 * Apple India Store Clone
 * Entry Point
 * 
 * Technology: Core PHP + MySQL + HTML5 + CSS3 + Vanilla JavaScript
 * Reference: https://www.apple.com/in/store
 */

// Error reporting settings
error_reporting(E_ALL);
ini_set('display_errors', '0');

// Include Database Configuration and Connection
require_once __DIR__ . '/config/database.php';

// Initialize Database Instance
$db = Database::getInstance();

// Include Global Header (Includes DOCTYPE, CSS, Sticky Nav, Ribbon)
include __DIR__ . '/includes/header.php';

// 1. Hero Section (Store Display Title & Category Shelf Nav)
include __DIR__ . '/sections/hero.php';

// 2. The Latest Section (Spotlight Product Carousel)
include __DIR__ . '/sections/products.php';

// 3. Accessories Section (Interactive Swatches, Lead Card, Add to Bag)
include __DIR__ . '/sections/accessories.php';

// 4. Promotions & Specialty Section (Apple Difference, Help, Audio, Experience, Special Stores, Quick Links)
include __DIR__ . '/sections/promotions.php';

// 5. Global Footer (Footnotes, Directory Columns, Legal)
include __DIR__ . '/includes/footer.php';

