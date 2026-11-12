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

// Include Hero Section (Store Display Title & Category Shelf Nav)
include __DIR__ . '/sections/hero.php';

// Include Products Section (The Latest Carousel)
include __DIR__ . '/sections/products.php';

// Include Promotions Section (Help is here, Apple difference, Audio, Experience, Special stores)
include __DIR__ . '/sections/promotions.php';

// Include Accessories Section (Interactive Swatches, Lead Card, Quick Links)
include __DIR__ . '/sections/accessories.php';

// Include Global Footer (Footnotes, Directory Columns with Mobile Accordion, Legal Links)
include __DIR__ . '/includes/footer.php';

