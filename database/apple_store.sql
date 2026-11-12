-- ========================================================
-- Apple India Store Clone - Database Schema & Seed Data
-- Database Engine: MySQL / MariaDB (InnoDB)
-- Character Set: utf8mb4 / Collation: utf8mb4_unicode_ci
-- Reference: https://www.apple.com/in/store
-- ========================================================

CREATE DATABASE IF NOT EXISTS `apple_store` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `apple_store`;

-- --------------------------------------------------------
-- Table structure for table `ribbons`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `ribbons`;
CREATE TABLE `ribbons` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(255) NOT NULL,
  `highlight_text` VARCHAR(255) DEFAULT NULL,
  `link_text` VARCHAR(100) DEFAULT 'Shop',
  `link_url` VARCHAR(255) DEFAULT '#latest',
  `is_active` TINYINT(1) DEFAULT 1,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for table `categories`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(100) NOT NULL,
  `slug` VARCHAR(100) NOT NULL UNIQUE,
  `image_url` VARCHAR(255) NOT NULL,
  `link_url` VARCHAR(255) NOT NULL,
  `sort_order` INT DEFAULT 0,
  `is_active` TINYINT(1) DEFAULT 1,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for table `products`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `section_key` VARCHAR(50) NOT NULL,
  `part_number` VARCHAR(50) DEFAULT NULL,
  `eyebrow` VARCHAR(100) DEFAULT NULL,
  `title` VARCHAR(255) NOT NULL,
  `description` TEXT DEFAULT NULL,
  `price_label` VARCHAR(100) DEFAULT NULL,
  `price_raw` DECIMAL(10,2) DEFAULT 0.00,
  `image_url` VARCHAR(255) DEFAULT '',
  `alt_text` VARCHAR(255) DEFAULT NULL,
  `theme` ENUM('light', 'dark') DEFAULT 'light',
  `badge` VARCHAR(50) DEFAULT NULL,
  `link_url` VARCHAR(255) DEFAULT '#',
  `sort_order` INT DEFAULT 0,
  `is_active` TINYINT(1) DEFAULT 1,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  INDEX `idx_section` (`section_key`),
  INDEX `idx_active` (`is_active`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for table `accessory_swatches`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `accessory_swatches`;
CREATE TABLE `accessory_swatches` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `product_id` INT NOT NULL,
  `color_name` VARCHAR(100) NOT NULL,
  `color_hex` VARCHAR(20) NOT NULL,
  `sort_order` INT DEFAULT 0,
  FOREIGN KEY (`product_id`) REFERENCES `products`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for table `quick_links`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `quick_links`;
CREATE TABLE `quick_links` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `label` VARCHAR(100) NOT NULL,
  `url` VARCHAR(255) NOT NULL,
  `sort_order` INT DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for table `cart_items`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `cart_items`;
CREATE TABLE `cart_items` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `session_id` VARCHAR(128) NOT NULL,
  `product_id` INT NOT NULL,
  `quantity` INT DEFAULT 1,
  `selected_color` VARCHAR(100) DEFAULT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  INDEX `idx_session` (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Seed Data: ribbons
-- --------------------------------------------------------
INSERT INTO `ribbons` (`id`, `title`, `highlight_text`, `link_text`, `link_url`, `is_active`) VALUES
(1, 'Get up to ₹10000 instant cashback with eligible cards.', 'Plus up to 12 months of No Cost EMI.‡', 'Shop', '#latest', 1);

-- --------------------------------------------------------
-- Seed Data: categories
-- --------------------------------------------------------
INSERT INTO `categories` (`id`, `name`, `slug`, `image_url`, `link_url`, `sort_order`, `is_active`) VALUES
(1, 'Mac', 'mac', 'assets/images/NavImg/store-card-13-mac-nav-202610 1.png', '#mac', 1, 1),
(2, 'iPhone', 'iphone', 'assets/images/NavImg/store-card-13-iphone-nav-202609 1.png', '#iphone', 2, 1),
(3, 'iPad', 'ipad', 'assets/images/NavImg/store-card-13-ipad-nav-202405 1.png', '#ipad', 3, 1),
(4, 'Apple Watch', 'watch', 'assets/images/NavImg/store-card-13-watch-nav-202609_GEO_IN 1.png', '#watch', 4, 1),
(5, 'AirPods', 'airpods', 'assets/images/NavImg/store-card-13-airpods-nav-202509 1.png', '#airpods', 5, 1),
(6, 'AirTag', 'airtag', 'assets/images/NavImg/store-card-13-airtags-nav-202601_GEO_IN 1.png', '#airtag', 6, 1),
(7, 'HomePod', 'homepod', 'assets/images/NavImg/store-card-13-home-nav-202610 1.png', '#homepod', 7, 1),
(8, 'Accessories', 'accessories', 'assets/images/NavImg/store-card-13-accessories-nav-202609 1.png', '#accessories', 8, 1);

-- --------------------------------------------------------
-- Seed Data: products (The Latest Section)
-- --------------------------------------------------------
INSERT INTO `products` (`id`, `section_key`, `part_number`, `eyebrow`, `title`, `description`, `price_label`, `price_raw`, `image_url`, `alt_text`, `theme`, `badge`, `link_url`, `sort_order`, `is_active`) VALUES
(101, 'latest', NULL, 'IPHONE 16 PRO', 'Built for Apple Intelligence.', NULL, 'From ₹119900.00‡', 119900.00, 'assets/images/LatestImg/store-card-40-iphone-18-pro-202609 1.png', 'iPhone 16 Pro in Desert Titanium', 'dark', 'NEW', '#buy-iphone-16-pro', 1, 1),
(102, 'latest', NULL, 'IPHONE 16', 'Hello, Apple Intelligence.', NULL, 'From ₹79900.00‡', 79900.00, 'assets/images/LatestImg/store-card-40-iphone-duo-202609 1.png', 'iPhone 16 in vibrant Ultramarine and Teal', 'light', 'NEW', '#buy-iphone-16', 2, 1),
(103, 'latest', NULL, 'APPLE WATCH SERIES 10', 'Thinscredible.', NULL, 'From ₹46900.00‡', 46900.00, 'assets/images/LatestImg/store-card-40-watch-series-12-202609_GEO_IN 1.png', 'Apple Watch Series 10 in Jet Black aluminum', 'light', 'NEW', '#buy-watch-series-10', 3, 1),
(104, 'latest', NULL, 'MACBOOK PRO', 'A work of smart.', NULL, 'From ₹169900.00‡', 169900.00, 'assets/images/LatestImg/store-card-40-macbook-pro-202610 1.png', 'MacBook Pro with M4 family chip', 'dark', 'NEW', '#buy-macbook-pro', 4, 1),
(105, 'latest', NULL, 'IPAD AIR', 'Fresh Air.', NULL, 'From ₹59900.00‡', 59900.00, 'assets/images/LatestImg/store-card-40-ipad-air-202603 1.png', 'iPad Air with powerful M2 chip', 'light', NULL, '#buy-ipad-air', 5, 1),
(106, 'latest', NULL, 'IPAD MINI', 'Built for Apple Intelligence.', NULL, 'From ₹49900.00‡', 49900.00, 'assets/images/LatestImg/store-card-40-ipad-mini-202610 1.png', 'iPad mini featuring A17 Pro chip', 'light', 'NEW', '#buy-ipad-mini', 6, 1),
(107, 'latest', NULL, 'APPLE WATCH ULTRA 2', 'New finish. Never quit.', NULL, 'From ₹89900.00‡', 89900.00, 'assets/images/LatestImg/store-card-40-watch-ultra-4-202609_GEO_IN 1.png', 'Apple Watch Ultra 2 in Black Titanium', 'dark', 'NEW FINISH', '#buy-watch-ultra-2', 7, 1),
(108, 'latest', NULL, 'AIRPODS 4', 'Iconic. Now sonic.', NULL, 'From ₹12900.00‡', 12900.00, 'assets/images/LatestImg/store-card-40-airpods-5-202609 1.png', 'AirPods 4 with Active Noise Cancellation option', 'light', 'NEW', '#buy-airpods-4', 8, 1),
(109, 'latest', NULL, 'MAC MINI', 'Size down. Power up.', NULL, 'From ₹59900.00‡', 59900.00, 'assets/images/LatestImg/store-card-40-mac-mini-202609 1.png', 'All-new smaller Mac mini with M4', 'light', 'NEW', '#buy-mac-mini', 9, 1),
(110, 'latest', NULL, 'IMAC', 'Brilliant from edge to edge.', NULL, 'From ₹134900.00‡', 134900.00, 'assets/images/LatestImg/store-card-40-imac-202610 1.png', '24-inch iMac with M4 chip in striking colours', 'light', 'NEW', '#buy-imac', 10, 1),
(111, 'latest', NULL, 'MACBOOK AIR', 'Lean. Mean. M3 machine.', NULL, 'From ₹99900.00‡', 99900.00, 'assets/images/LatestImg/store-card-40-macbook-air-202603 1.png', 'MacBook Air 13-inch and 15-inch with M3', 'light', NULL, '#buy-macbook-air', 11, 1),
(112, 'latest', NULL, 'BEATS PILL', 'Sound bigger than ever.', NULL, 'MRP ₹16900.00‡', 16900.00, 'assets/images/LatestImg/store-card-40-beats-360-202610 1.png', 'Beats Pill portable speaker', 'dark', 'NEW', '#buy-beats-pill', 12, 1),
(113, 'latest', NULL, 'HOMEPOD', 'Pro sound at home.', NULL, '₹32900.00‡', 32900.00, 'assets/images/LatestImg/store-card-40-home-view-202610_GEO_IN 1.png', 'Apple HomePod smart speaker', 'light', NULL, '#buy-homepod', 13, 1),
(114, 'latest', NULL, 'ACCESSORIES', 'Explore new cases, bands and more.', NULL, 'Shop now', 0.00, 'assets/images/LatestImg/store-card-40-latest-accessories-202609 1.png', 'Apple accessories lineup', 'light', 'NEW', '#accessories', 14, 1);

-- --------------------------------------------------------
-- Seed Data: products (Accessories Section)
-- --------------------------------------------------------
INSERT INTO `products` (`id`, `section_key`, `part_number`, `eyebrow`, `title`, `description`, `price_label`, `price_raw`, `image_url`, `alt_text`, `theme`, `badge`, `link_url`, `sort_order`, `is_active`) VALUES
(201, 'accessories', 'MKD14', 'CASE', 'iPhone 16 Silicone Case with MagSafe', NULL, 'MRP ₹4900.00 (Incl. of all taxes)', 4900.00, 'assets/images/AccessoriesImg/MKD14 1.png', 'iPhone 16 Silicone Case with MagSafe', 'light', 'New', '#accessory-mkd14', 1, 1),
(202, 'accessories', 'MKR64', 'CASE', 'iPhone 16 Clear Case with MagSafe', NULL, 'MRP ₹4900.00 (Incl. of all taxes)', 4900.00, 'assets/images/AccessoriesImg/MKR64 1.png', 'iPhone 16 Clear Case with MagSafe', 'light', 'New', '#accessory-mkr64', 2, 1),
(203, 'accessories', 'MK854', 'STRAP', '46mm Lake Green Sport Loop', NULL, 'MRP ₹4500.00 (Incl. of all taxes)', 4500.00, 'assets/images/AccessoriesImg/MK854 1.png', '46mm Lake Green Sport Loop', 'light', 'New', '#accessory-mk854', 3, 1),
(204, 'accessories', 'MGYY4', 'HEADPHONES', 'AirPods Max - USB-C', NULL, 'MRP ₹59900.00 (Incl. of all taxes)', 59900.00, 'assets/images/AccessoriesImg/MGYY4 1.png', 'AirPods Max - USB-C', 'light', 'New Colours', '#accessory-mgyy4', 4, 1),
(205, 'accessories', 'MUVR3', 'PENCIL', 'Apple Pencil Pro', NULL, 'MRP ₹11900.00 (Incl. of all taxes)', 11900.00, 'assets/images/AccessoriesImg/MUVR3 1.png', 'Apple Pencil Pro', 'light', '', '#accessory-muvr3', 5, 1),
(206, 'accessories', 'MGD74', 'CHARGING', 'MagSafe Charger (1 m)', NULL, 'MRP ₹4500.00 (Incl. of all taxes)', 4500.00, 'assets/images/AccessoriesImg/MGD74 1.png', 'MagSafe Charger (1 m)', 'light', 'Faster Charging', '#accessory-mgd74', 6, 1),
(207, 'accessories', 'MKR94', 'CASE', 'Beats iPhone 16 Case with MagSafe', NULL, 'MRP ₹4900.00 (Incl. of all taxes)', 4900.00, 'assets/images/AccessoriesImg/MKR94 1.png', 'Beats iPhone 16 Case with MagSafe', 'light', 'New', '#accessory-mkr94', 7, 1),
(208, 'accessories', 'MH044', 'POWER', '20W USB-C Power Adapter', NULL, 'MRP ₹1900.00 (Incl. of all taxes)', 1900.00, 'assets/images/AccessoriesImg/MH044 1.png', '20W USB-C Power Adapter', 'light', '', '#accessory-mh044', 8, 1),
(209, 'accessories', 'MJU94ref', 'KEYBOARD', 'Magic Keyboard for iPad Pro 13‑inch', NULL, 'MRP ₹29900.00 (Incl. of all taxes)', 29900.00, 'assets/images/AccessoriesImg/MJU94ref 1.png', 'Magic Keyboard for iPad Pro 13‑inch', 'light', '', '#accessory-mju94', 9, 1),
(210, 'accessories', 'MK944', 'STRAP', '46mm Plum Sport Loop', NULL, 'MRP ₹4500.00 (Incl. of all taxes)', 4500.00, 'assets/images/AccessoriesImg/MK944 1.png', '46mm Plum Sport Loop', 'light', 'New', '#accessory-mk944', 10, 1),
(211, 'accessories', 'MUWA3', 'CABLE', '60W USB-C Woven Charge Cable (1 m)', NULL, 'MRP ₹1900.00 (Incl. of all taxes)', 1900.00, 'assets/images/AccessoriesImg/MUWA3 1.png', '60W USB-C Woven Charge Cable (1 m)', 'light', '', '#accessory-muwa3', 11, 1);

-- --------------------------------------------------------
-- Seed Data: accessory_swatches
-- --------------------------------------------------------
INSERT INTO `accessory_swatches` (`product_id`, `color_name`, `color_hex`, `sort_order`) VALUES
(201, 'Star Fruit', '#e6db5d', 1),
(201, 'Ultramarine', '#4268a8', 2),
(201, 'Lake Green', '#3a6663', 3),
(201, 'Fuchsia', '#9e3460', 4),
(201, 'Stone Gray', '#7a7a7a', 5),
(201, 'Black', '#1d1d1f', 6),
(202, 'Clear', '#f0f3f6', 1),
(203, 'Lake Green', '#4a7c6f', 1),
(203, 'Blue Cloud', '#658ca6', 2),
(203, 'Ink', '#2b303a', 3),
(203, 'Plum', '#6b3252', 4),
(204, 'Midnight', '#1f242c', 1),
(204, 'Starlight', '#e5ded1', 2),
(204, 'Blue', '#9ab3c9', 3),
(204, 'Purple', '#b8b2cb', 4),
(204, 'Orange', '#dc6c4a', 5),
(205, 'White', '#f2f2f2', 1),
(206, 'Silver', '#e1e1e3', 1),
(207, 'Midnight Black', '#1c1c1e', 1),
(207, 'Summit Stone', '#a79c8d', 2),
(207, 'Riptide Blue', '#327ba8', 3),
(207, 'Sunset Purple', '#834c7c', 4),
(208, 'White', '#ffffff', 1),
(209, 'Black', '#212123', 1),
(209, 'White', '#efefef', 2),
(210, 'Plum', '#5e2e48', 1),
(211, 'White', '#f2f2f2', 1);

-- --------------------------------------------------------
-- Seed Data: products (Help, Difference, Audio, Experience, Special Stores)
-- Blank image_url allows user to drop images later as requested
-- --------------------------------------------------------
INSERT INTO `products` (`id`, `section_key`, `part_number`, `eyebrow`, `title`, `description`, `price_label`, `price_raw`, `image_url`, `alt_text`, `theme`, `badge`, `link_url`, `sort_order`, `is_active`) VALUES
(301, 'help', NULL, 'APPLE SPECIALIST', 'Shop one on one with a Specialist. Online or in a store.', NULL, 'Shop with a Specialist', 0.00, '', 'Specialist banner', 'light', NULL, '#specialist', 1, 1),
(302, 'help', NULL, 'BUSINESS', 'From enterprise to small business, we’ll work with you.', NULL, 'Learn more', 0.00, '', 'Business banner', 'light', NULL, '#business', 2, 1),
(303, 'help', NULL, 'TODAY AT APPLE', 'Watch and learn. Join free sessions to do more with your Apple devices.', NULL, 'Explore sessions', 0.00, '', 'Today at Apple banner', 'light', NULL, '#today-at-apple', 3, 1),
(304, 'help', NULL, 'GET HELP BUYING', 'Have a question? Call a Specialist or chat online.', NULL, 'Call 000800 040 1966', 0.00, '', 'Get help buying banner', 'light', NULL, 'tel:0008000401966', 4, 1),

(401, 'difference', NULL, 'APPLE TRADE IN', 'Exchange your smartphone. Get ₹4000.00 – ₹67500.00 in credit.*', 'Upgrade and save with Apple Trade In.', 'Trade In', 0.00, '', 'Trade in', 'light', NULL, '#trade-in', 1, 1),
(402, 'difference', NULL, 'FLEXIBLE PAYMENT', 'Save with instant cashback and No Cost EMI.‡', 'Get up to ₹10000 instant cashback with eligible card payment.', 'Explore EMI', 0.00, '', 'EMI and Cashback', 'light', NULL, '#financing', 2, 1),
(403, 'difference', NULL, 'CUSTOMISE YOUR MAC', 'Build the Mac that is perfect for you.', 'Choose your memory, storage, graphics and even keyboard language.', 'Customise', 0.00, '', 'Customise Mac', 'light', NULL, '#customise-mac', 3, 1),
(404, 'difference', NULL, 'FREE ENGRAVING', 'Make them yours. Engrave a mix of emoji, names and numbers for free.', 'Personalise your AirPods, AirTag, Apple Pencil Pro or iPad.', 'Engrave free', 0.00, '', 'Free engraving', 'light', NULL, '#engraving', 4, 1),
(405, 'difference', NULL, 'DELIVERY AND PICKUP', 'Enjoy free delivery, or easy pickup from an Apple Store.', 'Contactless free delivery directly to your home.', 'Learn more', 0.00, '', 'Free delivery', 'light', NULL, '#delivery', 5, 1),

(501, 'audio', NULL, 'AIRPODS PRO 2', 'Pro sound. Pro hearing health.', NULL, 'MRP ₹24900.00‡', 24900.00, '', 'AirPods Pro 2', 'light', NULL, '#airpods-pro-2', 1, 1),
(502, 'audio', NULL, 'AIRPODS MAX', 'Five fresh finishes. Bold sound.', NULL, 'MRP ₹59900.00‡', 59900.00, '', 'AirPods Max', 'light', NULL, '#airpods-max', 2, 1),
(503, 'audio', NULL, 'HOMEPOD MINI', 'Surprising sound for its size.', NULL, 'MRP ₹10900.00‡', 10900.00, '', 'HomePod mini', 'light', NULL, '#homepod-mini', 3, 1),

(601, 'experience', NULL, 'APPLE SERVICES', 'Six Apple services. One easy subscription.', 'Apple One bundles Apple Music, Apple TV+, Apple Arcade, and iCloud+.', 'Try Apple One free', 0.00, '', 'Apple One', 'light', NULL, '#apple-one', 1, 1),
(602, 'experience', NULL, 'APPLE MUSIC', 'Over 100 million songs. Spatial Audio with Dolby Atmos.', 'Get 3 months free when you buy an eligible Apple device.⁺', 'Try it free', 0.00, '', 'Apple Music', 'light', NULL, '#apple-music', 2, 1),
(603, 'experience', NULL, 'APPLE TV+', 'Watch award-winning Apple Originals every month.', 'Get 3 months free when you purchase an Apple device.⁺', 'Watch now', 0.00, '', 'Apple TV+', 'dark', NULL, '#apple-tv', 3, 1),

(701, 'special_stores', NULL, 'EDUCATION', 'Save on Mac or iPad with education pricing.', 'Available to current and newly accepted university students, parents buying for them, and teachers and staff at all levels.', 'Shop Education', 0.00, '', 'Education', 'light', NULL, '#education', 1, 1),
(702, 'special_stores', NULL, 'BUSINESS', 'From enterprise to small business, we’ll work with you.', 'Specialized pricing, flexible financing options, and expert deployment support.', 'Shop Business', 0.00, '', 'Business Store', 'light', NULL, '#business-store', 2, 1);

-- --------------------------------------------------------
-- Seed Data: quick_links
-- --------------------------------------------------------
INSERT INTO `quick_links` (`id`, `label`, `url`, `sort_order`) VALUES
(1, 'Order Status', '#order-status', 1),
(2, 'Shopping Help', '#shopping-help', 2),
(3, 'Returns', '#returns', 3),
(4, 'Your Saves', '#your-saves', 4);
