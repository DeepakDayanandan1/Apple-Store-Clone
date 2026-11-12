<?php

error_reporting(E_ALL);
ini_set('display_errors', '0');

require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/includes/functions.php';

$db = Database::getInstance();

include __DIR__ . '/includes/header.php';
include __DIR__ . '/sections/hero.php';
include __DIR__ . '/sections/product-highlights.php';
include __DIR__ . '/sections/accessories.php';
include __DIR__ . '/sections/shopping-benefits.php';
include __DIR__ . '/sections/products.php';
include __DIR__ . '/sections/promotions.php';
include __DIR__ . '/includes/footer.php';
