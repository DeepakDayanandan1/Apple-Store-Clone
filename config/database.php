<?php
/**
 * Database Configuration & Connection
 * Apple Store Clone
 * 
 * Supports MySQL / MariaDB via PDO.
 * Includes automatic graceful fallback to seeded master dataset
 * to ensure 100% out-of-the-box local execution.
 */

class Database {
    private static ?Database $instance = null;
    private ?PDO $pdo = null;
    private bool $usingFallback = false;
    private array $dataset = [];

    // MySQL connection settings
    private string $host = '127.0.0.1';
    private string $port = '3306';
    private string $dbname = 'apple_store';
    private string $username = 'root';
    private string $password = '';
    private string $charset = 'utf8mb4';

    private function __construct() {
        // Read environment variables if provided
        $this->host = getenv('DB_HOST') ?: $this->host;
        $this->port = getenv('DB_PORT') ?: $this->port;
        $this->dbname = getenv('DB_NAME') ?: $this->dbname;
        $this->username = getenv('DB_USER') ?: $this->username;
        $this->password = getenv('DB_PASS') !== false ? getenv('DB_PASS') : $this->password;

        $this->initDataset();
        $this->connect();
    }

    public static function getInstance(): Database {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    private function connect(): void {
        if (!extension_loaded('pdo_mysql')) {
            $this->usingFallback = true;
            return;
        }

        $dsn = "mysql:host={$this->host};port={$this->port};dbname={$this->dbname};charset={$this->charset}";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_SILENT,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
            PDO::ATTR_TIMEOUT            => 2,
        ];

        try {
            $this->pdo = new PDO($dsn, $this->username, $this->password, $options);
            $this->usingFallback = false;
        } catch (\Throwable $e) {
            // MySQL server not yet configured or offline; fall back to embedded store dataset
            $this->usingFallback = true;
            $this->pdo = null;
        }
    }

    public function isFallback(): bool {
        return $this->usingFallback;
    }

    public function getConnection(): ?PDO {
        return $this->pdo;
    }

    /**
     * Query data helper
     */
    public function getRibbon(): array {
        if (!$this->usingFallback && $this->pdo) {
            $stmt = $this->pdo->query("SELECT * FROM ribbons WHERE is_active = 1 ORDER BY id DESC LIMIT 1");
            if ($stmt && ($row = $stmt->fetch())) {
                return $row;
            }
        }
        return $this->dataset['ribbon'] ?? [];
    }

    public function getCategories(): array {
        if (!$this->usingFallback && $this->pdo) {
            $stmt = $this->pdo->query("SELECT * FROM categories WHERE is_active = 1 ORDER BY sort_order ASC");
            if ($stmt && ($rows = $stmt->fetchAll())) {
                return $rows;
            }
        }
        return $this->dataset['categories'] ?? [];
    }

    public function getLatestProducts(): array {
        if (!$this->usingFallback && $this->pdo) {
            $stmt = $this->pdo->prepare("SELECT * FROM products WHERE section_key = 'latest' AND is_active = 1 ORDER BY sort_order ASC");
            $stmt->execute();
            if ($rows = $stmt->fetchAll()) {
                return $rows;
            }
        }
        return $this->dataset['latest_products'] ?? [];
    }

    public function getAccessories(): array {
        if (!$this->usingFallback && $this->pdo) {
            $stmt = $this->pdo->prepare("SELECT * FROM products WHERE section_key = 'accessories' AND is_active = 1 ORDER BY sort_order ASC");
            $stmt->execute();
            $items = $stmt->fetchAll();
            if ($items) {
                foreach ($items as &$item) {
                    $swatchStmt = $this->pdo->prepare("SELECT color_name as color, color_hex as hex FROM accessory_swatches WHERE product_id = :id ORDER BY sort_order ASC");
                    $swatchStmt->execute(['id' => $item['id']]);
                    $item['swatches'] = $swatchStmt->fetchAll() ?: [];
                    $item['image'] = $item['image_url'];
                    $item['name'] = $item['title'];
                }
                return [
                    'lead_card' => $this->dataset['accessories']['lead_card'],
                    'items' => $items,
                    'end_card' => $this->dataset['accessories']['end_card']
                ];
            }
        }
        return $this->dataset['accessories'] ?? [];
    }

    public function getSectionItems(string $sectionKey): array {
        if (!$this->usingFallback && $this->pdo) {
            $stmt = $this->pdo->prepare("SELECT * FROM products WHERE section_key = :sec AND is_active = 1 ORDER BY sort_order ASC");
            $stmt->execute(['sec' => $sectionKey]);
            if ($rows = $stmt->fetchAll()) {
                return $rows;
            }
        }
        return $this->dataset[$sectionKey . '_cards'] ?? [];
    }

    public function getQuickLinks(): array {
        if (!$this->usingFallback && $this->pdo) {
            $stmt = $this->pdo->query("SELECT * FROM quick_links ORDER BY sort_order ASC");
            if ($stmt && ($rows = $stmt->fetchAll())) {
                return $rows;
            }
        }
        return $this->dataset['quick_links'] ?? [];
    }

    /**
     * Master dataset definition
     */
    private function initDataset(): void {
        $this->dataset = [
            'ribbon' => [
                'id' => 1,
                'title' => 'Get up to ₹10000 instant cashback with eligible cards.',
                'highlight_text' => 'Plus up to 12 months of No Cost EMI.‡',
                'link_text' => 'Shop',
                'link_url' => '#latest'
            ],
            'categories' => [
                ['id' => 1, 'name' => 'Mac', 'slug' => 'mac', 'image' => 'assets/images/NavImg/store-card-13-mac-nav-202610 1.png', 'url' => '#mac'],
                ['id' => 2, 'name' => 'iPhone', 'slug' => 'iphone', 'image' => 'assets/images/NavImg/store-card-13-iphone-nav-202609 1.png', 'url' => '#iphone'],
                ['id' => 3, 'name' => 'iPad', 'slug' => 'ipad', 'image' => 'assets/images/NavImg/store-card-13-ipad-nav-202405 1.png', 'url' => '#ipad'],
                ['id' => 4, 'name' => 'Apple Watch', 'slug' => 'watch', 'image' => 'assets/images/NavImg/store-card-13-watch-nav-202609_GEO_IN 1.png', 'url' => '#watch'],
                ['id' => 5, 'name' => 'AirPods', 'slug' => 'airpods', 'image' => 'assets/images/NavImg/store-card-13-airpods-nav-202509 1.png', 'url' => '#airpods'],
                ['id' => 6, 'name' => 'AirTag', 'slug' => 'airtag', 'image' => 'assets/images/NavImg/store-card-13-airtags-nav-202601_GEO_IN 1.png', 'url' => '#airtag'],
                ['id' => 7, 'name' => 'HomePod', 'slug' => 'homepod', 'image' => 'assets/images/NavImg/store-card-13-home-nav-202610 1.png', 'url' => '#homepod'],
                ['id' => 8, 'name' => 'Accessories', 'slug' => 'accessories', 'image' => 'assets/images/NavImg/store-card-13-accessories-nav-202609 1.png', 'url' => '#accessories'],
            ],
            'latest_products' => [
                [
                    'id' => 101,
                    'eyebrow' => 'IPHONE 16 PRO',
                    'title' => 'Built for Apple Intelligence.',
                    'price_label' => 'From ₹119900.00‡',
                    'price_raw' => 119900.00,
                    'theme' => 'dark',
                    'image' => 'assets/images/LatestImg/store-card-40-iphone-18-pro-202609 1.png',
                    'alt_text' => 'iPhone 16 Pro in Desert Titanium',
                    'badge' => 'NEW',
                    'url' => '#buy-iphone-16-pro'
                ],
                [
                    'id' => 102,
                    'eyebrow' => 'IPHONE 16',
                    'title' => 'Hello, Apple Intelligence.',
                    'price_label' => 'From ₹79900.00‡',
                    'price_raw' => 79900.00,
                    'theme' => 'light',
                    'image' => 'assets/images/LatestImg/store-card-40-iphone-duo-202609 1.png',
                    'alt_text' => 'iPhone 16 in vibrant Ultramarine and Teal',
                    'badge' => 'NEW',
                    'url' => '#buy-iphone-16'
                ],
                [
                    'id' => 103,
                    'eyebrow' => 'APPLE WATCH SERIES 10',
                    'title' => 'Thinscredible.',
                    'price_label' => 'From ₹46900.00‡',
                    'price_raw' => 46900.00,
                    'theme' => 'light',
                    'image' => 'assets/images/LatestImg/store-card-40-watch-series-12-202609_GEO_IN 1.png',
                    'alt_text' => 'Apple Watch Series 10 in Jet Black aluminum',
                    'badge' => 'NEW',
                    'url' => '#buy-watch-series-10'
                ],
                [
                    'id' => 104,
                    'eyebrow' => 'MACBOOK PRO',
                    'title' => 'A work of smart.',
                    'price_label' => 'From ₹169900.00‡',
                    'price_raw' => 169900.00,
                    'theme' => 'dark',
                    'image' => 'assets/images/LatestImg/store-card-40-macbook-pro-202610 1.png',
                    'alt_text' => 'MacBook Pro with M4 family chip',
                    'badge' => 'NEW',
                    'url' => '#buy-macbook-pro'
                ],
                [
                    'id' => 105,
                    'eyebrow' => 'IPAD AIR',
                    'title' => 'Fresh Air.',
                    'price_label' => 'From ₹59900.00‡',
                    'price_raw' => 59900.00,
                    'theme' => 'light',
                    'image' => 'assets/images/LatestImg/store-card-40-ipad-air-202603 1.png',
                    'alt_text' => 'iPad Air with powerful M2 chip',
                    'badge' => '',
                    'url' => '#buy-ipad-air'
                ],
                [
                    'id' => 106,
                    'eyebrow' => 'IPAD MINI',
                    'title' => 'Built for Apple Intelligence.',
                    'price_label' => 'From ₹49900.00‡',
                    'price_raw' => 49900.00,
                    'theme' => 'light',
                    'image' => 'assets/images/LatestImg/store-card-40-ipad-mini-202610 1.png',
                    'alt_text' => 'iPad mini featuring A17 Pro chip',
                    'badge' => 'NEW',
                    'url' => '#buy-ipad-mini'
                ],
                [
                    'id' => 107,
                    'eyebrow' => 'APPLE WATCH ULTRA 2',
                    'title' => 'New finish. Never quit.',
                    'price_label' => 'From ₹89900.00‡',
                    'price_raw' => 89900.00,
                    'theme' => 'dark',
                    'image' => 'assets/images/LatestImg/store-card-40-watch-ultra-4-202609_GEO_IN 1.png',
                    'alt_text' => 'Apple Watch Ultra 2 in Black Titanium',
                    'badge' => 'NEW FINISH',
                    'url' => '#buy-watch-ultra-2'
                ],
                [
                    'id' => 108,
                    'eyebrow' => 'AIRPODS 4',
                    'title' => 'Iconic. Now sonic.',
                    'price_label' => 'From ₹12900.00‡',
                    'price_raw' => 12900.00,
                    'theme' => 'light',
                    'image' => 'assets/images/LatestImg/store-card-40-airpods-5-202609 1.png',
                    'alt_text' => 'AirPods 4 with Active Noise Cancellation option',
                    'badge' => 'NEW',
                    'url' => '#buy-airpods-4'
                ],
                [
                    'id' => 109,
                    'eyebrow' => 'MAC MINI',
                    'title' => 'Size down. Power up.',
                    'price_label' => 'From ₹59900.00‡',
                    'price_raw' => 59900.00,
                    'theme' => 'light',
                    'image' => 'assets/images/LatestImg/store-card-40-mac-mini-202609 1.png',
                    'alt_text' => 'All-new smaller Mac mini with M4',
                    'badge' => 'NEW',
                    'url' => '#buy-mac-mini'
                ],
                [
                    'id' => 110,
                    'eyebrow' => 'IMAC',
                    'title' => 'Brilliant from edge to edge.',
                    'price_label' => 'From ₹134900.00‡',
                    'price_raw' => 134900.00,
                    'theme' => 'light',
                    'image' => 'assets/images/LatestImg/store-card-40-imac-202610 1.png',
                    'alt_text' => '24-inch iMac with M4 chip in striking colours',
                    'badge' => 'NEW',
                    'url' => '#buy-imac'
                ],
                [
                    'id' => 111,
                    'eyebrow' => 'MACBOOK AIR',
                    'title' => 'Lean. Mean. M3 machine.',
                    'price_label' => 'From ₹99900.00‡',
                    'price_raw' => 99900.00,
                    'theme' => 'light',
                    'image' => 'assets/images/LatestImg/store-card-40-macbook-air-202603 1.png',
                    'alt_text' => 'MacBook Air 13-inch and 15-inch with M3',
                    'badge' => '',
                    'url' => '#buy-macbook-air'
                ],
                [
                    'id' => 112,
                    'eyebrow' => 'BEATS PILL',
                    'title' => 'Sound bigger than ever.',
                    'price_label' => 'MRP ₹16900.00‡',
                    'price_raw' => 16900.00,
                    'theme' => 'dark',
                    'image' => 'assets/images/LatestImg/store-card-40-beats-360-202610 1.png',
                    'alt_text' => 'Beats Pill portable speaker',
                    'badge' => 'NEW',
                    'url' => '#buy-beats-pill'
                ],
                [
                    'id' => 113,
                    'eyebrow' => 'HOMEPOD',
                    'title' => 'Pro sound at home.',
                    'price_label' => '₹32900.00‡',
                    'price_raw' => 32900.00,
                    'theme' => 'light',
                    'image' => 'assets/images/LatestImg/store-card-40-home-view-202610_GEO_IN 1.png',
                    'alt_text' => 'Apple HomePod smart speaker',
                    'badge' => '',
                    'url' => '#buy-homepod'
                ],
                [
                    'id' => 114,
                    'eyebrow' => 'ACCESSORIES',
                    'title' => 'Explore new cases, bands and more.',
                    'price_label' => 'Shop now',
                    'price_raw' => 0.00,
                    'theme' => 'light',
                    'image' => 'assets/images/LatestImg/store-card-40-latest-accessories-202609 1.png',
                    'alt_text' => 'Apple accessories lineup',
                    'badge' => 'NEW',
                    'url' => '#accessories'
                ]
            ],
            'accessories' => [
                'lead_card' => [
                    'title' => 'In with the new.',
                    'subtitle' => 'Explore new colours and styles for cases, straps and more.',
                    'image' => 'assets/images/AccessoriesImg/store-card-40-accessories-202609 1.png',
                    'theme' => 'light'
                ],
                'items' => [
                    [
                        'id' => 201,
                        'part_number' => 'MKD14',
                        'name' => 'iPhone 16 Silicone Case with MagSafe',
                        'price_label' => 'MRP ₹4900.00 (Incl. of all taxes)',
                        'price_raw' => 4900.00,
                        'image' => 'assets/images/AccessoriesImg/MKD14 1.png',
                        'badge' => 'New',
                        'swatches' => [
                            ['color' => 'Star Fruit', 'hex' => '#e6db5d'],
                            ['color' => 'Ultramarine', 'hex' => '#4268a8'],
                            ['color' => 'Lake Green', 'hex' => '#3a6663'],
                            ['color' => 'Fuchsia', 'hex' => '#9e3460'],
                            ['color' => 'Stone Gray', 'hex' => '#7a7a7a'],
                            ['color' => 'Black', 'hex' => '#1d1d1f']
                        ]
                    ],
                    [
                        'id' => 202,
                        'part_number' => 'MKR64',
                        'name' => 'iPhone 16 Clear Case with MagSafe',
                        'price_label' => 'MRP ₹4900.00 (Incl. of all taxes)',
                        'price_raw' => 4900.00,
                        'image' => 'assets/images/AccessoriesImg/MKR64 1.png',
                        'badge' => 'New',
                        'swatches' => [
                            ['color' => 'Clear', 'hex' => '#f0f3f6']
                        ]
                    ],
                    [
                        'id' => 203,
                        'part_number' => 'MK854',
                        'name' => '46mm Lake Green Sport Loop',
                        'price_label' => 'MRP ₹4500.00 (Incl. of all taxes)',
                        'price_raw' => 4500.00,
                        'image' => 'assets/images/AccessoriesImg/MK854 1.png',
                        'badge' => 'New',
                        'swatches' => [
                            ['color' => 'Lake Green', 'hex' => '#4a7c6f'],
                            ['color' => 'Blue Cloud', 'hex' => '#658ca6'],
                            ['color' => 'Ink', 'hex' => '#2b303a'],
                            ['color' => 'Plum', 'hex' => '#6b3252']
                        ]
                    ],
                    [
                        'id' => 204,
                        'part_number' => 'MGYY4',
                        'name' => 'AirPods Max - USB-C',
                        'price_label' => 'MRP ₹59900.00 (Incl. of all taxes)',
                        'price_raw' => 59900.00,
                        'image' => 'assets/images/AccessoriesImg/MGYY4 1.png',
                        'badge' => 'New Colours',
                        'swatches' => [
                            ['color' => 'Midnight', 'hex' => '#1f242c'],
                            ['color' => 'Starlight', 'hex' => '#e5ded1'],
                            ['color' => 'Blue', 'hex' => '#9ab3c9'],
                            ['color' => 'Purple', 'hex' => '#b8b2cb'],
                            ['color' => 'Orange', 'hex' => '#dc6c4a']
                        ]
                    ],
                    [
                        'id' => 205,
                        'part_number' => 'MUVR3',
                        'name' => 'Apple Pencil Pro',
                        'price_label' => 'MRP ₹11900.00 (Incl. of all taxes)',
                        'price_raw' => 11900.00,
                        'image' => 'assets/images/AccessoriesImg/MUVR3 1.png',
                        'badge' => '',
                        'swatches' => [
                            ['color' => 'White', 'hex' => '#f2f2f2']
                        ]
                    ],
                    [
                        'id' => 206,
                        'part_number' => 'MGD74',
                        'name' => 'MagSafe Charger (1 m)',
                        'price_label' => 'MRP ₹4500.00 (Incl. of all taxes)',
                        'price_raw' => 4500.00,
                        'image' => 'assets/images/AccessoriesImg/MGD74 1.png',
                        'badge' => 'Faster Charging',
                        'swatches' => [
                            ['color' => 'Silver', 'hex' => '#e1e1e3']
                        ]
                    ],
                    [
                        'id' => 207,
                        'part_number' => 'MKR94',
                        'name' => 'Beats iPhone 16 Case with MagSafe',
                        'price_label' => 'MRP ₹4900.00 (Incl. of all taxes)',
                        'price_raw' => 4900.00,
                        'image' => 'assets/images/AccessoriesImg/MKR94 1.png',
                        'badge' => 'New',
                        'swatches' => [
                            ['color' => 'Midnight Black', 'hex' => '#1c1c1e'],
                            ['color' => 'Summit Stone', 'hex' => '#a79c8d'],
                            ['color' => 'Riptide Blue', 'hex' => '#327ba8'],
                            ['color' => 'Sunset Purple', 'hex' => '#834c7c']
                        ]
                    ],
                    [
                        'id' => 208,
                        'part_number' => 'MH044',
                        'name' => '20W USB-C Power Adapter',
                        'price_label' => 'MRP ₹1900.00 (Incl. of all taxes)',
                        'price_raw' => 1900.00,
                        'image' => 'assets/images/AccessoriesImg/MH044 1.png',
                        'badge' => '',
                        'swatches' => [
                            ['color' => 'White', 'hex' => '#ffffff']
                        ]
                    ],
                    [
                        'id' => 209,
                        'part_number' => 'MJU94ref',
                        'name' => 'Magic Keyboard for iPad Pro 13‑inch',
                        'price_label' => 'MRP ₹29900.00 (Incl. of all taxes)',
                        'price_raw' => 29900.00,
                        'image' => 'assets/images/AccessoriesImg/MJU94ref 1.png',
                        'badge' => '',
                        'swatches' => [
                            ['color' => 'Black', 'hex' => '#212123'],
                            ['color' => 'White', 'hex' => '#efefef']
                        ]
                    ],
                    [
                        'id' => 210,
                        'part_number' => 'MK944',
                        'name' => '46mm Plum Sport Loop',
                        'price_label' => 'MRP ₹4500.00 (Incl. of all taxes)',
                        'price_raw' => 4500.00,
                        'image' => 'assets/images/AccessoriesImg/MK944 1.png',
                        'badge' => 'New',
                        'swatches' => [
                            ['color' => 'Plum', 'hex' => '#5e2e48']
                        ]
                    ],
                    [
                        'id' => 211,
                        'part_number' => 'MUWA3',
                        'name' => '60W USB-C Woven Charge Cable (1 m)',
                        'price_label' => 'MRP ₹1900.00 (Incl. of all taxes)',
                        'price_raw' => 1900.00,
                        'image' => 'assets/images/AccessoriesImg/MUWA3 1.png',
                        'badge' => '',
                        'swatches' => [
                            ['color' => 'White', 'hex' => '#f2f2f2']
                        ]
                    ]
                ],
                'end_card' => [
                    'title' => 'Explore all accessories.',
                    'subtitle' => 'Find the perfect match for your devices.',
                    'image' => 'assets/images/AccessoriesImg/store-card-40-all-accessories-202603 1.png',
                    'theme' => 'light'
                ]
            ],
            'promotions_cards' => [
                [
                    'id' => 401,
                    'eyebrow' => 'APPLE TRADE IN',
                    'title' => 'Exchange your smartphone. Get ₹4000.00 – ₹67500.00 in credit.*',
                    'subtitle' => 'Upgrade and save with Apple Trade In.',
                    'image' => '',
                    'theme' => 'light',
                    'icon' => 'trade-in',
                    'url' => '#trade-in'
                ],
                [
                    'id' => 402,
                    'eyebrow' => 'FLEXIBLE PAYMENT',
                    'title' => 'Save with instant cashback and No Cost EMI.‡',
                    'subtitle' => 'Get up to ₹10000 instant cashback with eligible card payment.',
                    'image' => '',
                    'theme' => 'light',
                    'icon' => 'payment',
                    'url' => '#financing'
                ],
                [
                    'id' => 403,
                    'eyebrow' => 'CUSTOMISE YOUR MAC',
                    'title' => 'Build the Mac that is perfect for you.',
                    'subtitle' => 'Choose your memory, storage, graphics and even keyboard language.',
                    'image' => '',
                    'theme' => 'light',
                    'icon' => 'mac',
                    'url' => '#customise-mac'
                ],
                [
                    'id' => 404,
                    'eyebrow' => 'FREE ENGRAVING',
                    'title' => 'Make them yours. Engrave a mix of emoji, names and numbers for free.',
                    'subtitle' => 'Personalise your AirPods, AirTag, Apple Pencil Pro or iPad.',
                    'image' => '',
                    'theme' => 'light',
                    'icon' => 'engraving',
                    'url' => '#engraving'
                ],
                [
                    'id' => 405,
                    'eyebrow' => 'DELIVERY AND PICKUP',
                    'title' => 'Enjoy free delivery, or easy pickup from an Apple Store.',
                    'subtitle' => 'Contactless free delivery directly to your home.',
                    'image' => '',
                    'theme' => 'light',
                    'icon' => 'delivery',
                    'url' => '#delivery'
                ]
            ],
            'help_cards' => [
                [
                    'id' => 301,
                    'eyebrow' => 'APPLE SPECIALIST',
                    'title' => 'Shop one on one with a Specialist. Online or in a store.',
                    'image' => '',
                    'theme' => 'light',
                    'link_text' => 'Shop with a Specialist',
                    'url' => '#specialist'
                ],
                [
                    'id' => 302,
                    'eyebrow' => 'BUSINESS',
                    'title' => 'From enterprise to small business, we’ll work with you.',
                    'image' => '',
                    'theme' => 'light',
                    'link_text' => 'Learn more',
                    'url' => '#business'
                ],
                [
                    'id' => 303,
                    'eyebrow' => 'TODAY AT APPLE',
                    'title' => 'Watch and learn. Join free sessions to do more with your Apple devices.',
                    'image' => '',
                    'theme' => 'light',
                    'link_text' => 'Explore sessions',
                    'url' => '#today-at-apple'
                ],
                [
                    'id' => 304,
                    'eyebrow' => 'GET HELP BUYING',
                    'title' => 'Have a question? Call a Specialist or chat online.',
                    'image' => '',
                    'theme' => 'light',
                    'link_text' => 'Call 000800 040 1966',
                    'url' => 'tel:0008000401966'
                ]
            ],
            // Section 5: Loud and Clear Audio Products
            'audio_cards' => [
                [
                    'id' => 500,
                    'eyebrow' => 'APPLE MUSIC',
                    'title' => 'Get 3 months of Apple Music free.',
                    'description' => 'Included with the purchase of select Apple audio devices.⁺',
                    'price_label' => 'Try it free',
                    'image' => 'assets/images/LoudImg/store-card-40-applemusic-202609 1.png',
                    'theme' => 'light',
                    'is_lead' => true,
                    'url' => '#apple-music'
                ],
                [
                    'id' => 501,
                    'eyebrow' => 'AIRPODS PRO 2',
                    'title' => 'AirPods Pro 2',
                    'description' => 'Pro sound. Pro hearing health.',
                    'price_label' => 'MRP ₹24900.00 (Incl. of all taxes)',
                    'price_raw' => 24900.00,
                    'image' => 'assets/images/LoudImg/airpods-pro-3-hero-select-202509 1.png',
                    'badge' => 'Hearing Health',
                    'theme' => 'light',
                    'swatches' => [
                        ['color' => 'White', 'hex' => '#f2f2f2']
                    ],
                    'url' => '#airpods-pro-2'
                ],
                [
                    'id' => 502,
                    'eyebrow' => 'AIRPODS MAX',
                    'title' => 'AirPods Max - USB-C',
                    'description' => 'Five fresh finishes. Bold sound.',
                    'price_label' => 'MRP ₹59900.00 (Incl. of all taxes)',
                    'price_raw' => 59900.00,
                    'image' => 'assets/images/LoudImg/airpods-max-select-202409-orange 1.png',
                    'badge' => 'New Colours',
                    'theme' => 'light',
                    'swatches' => [
                        ['color' => 'Midnight', 'hex' => '#1f242c'],
                        ['color' => 'Starlight', 'hex' => '#e5ded1'],
                        ['color' => 'Blue', 'hex' => '#9ab3c9'],
                        ['color' => 'Purple', 'hex' => '#b8b2cb'],
                        ['color' => 'Orange', 'hex' => '#dc6c4a']
                    ],
                    'url' => '#airpods-max'
                ],
                [
                    'id' => 503,
                    'eyebrow' => 'HOMEPOD MINI',
                    'title' => 'HomePod mini',
                    'description' => 'Surprising sound for its size.',
                    'price_label' => 'MRP ₹10900.00 (Incl. of all taxes)',
                    'price_raw' => 10900.00,
                    'image' => 'assets/images/LoudImg/homepod-mini-select-pink-202610 1.png',
                    'badge' => 'Colourful Sound',
                    'theme' => 'light',
                    'swatches' => [
                        ['color' => 'Yellow', 'hex' => '#ffdc4b'],
                        ['color' => 'Orange', 'hex' => '#ea5a35'],
                        ['color' => 'Blue', 'hex' => '#2e516f'],
                        ['color' => 'White', 'hex' => '#e5e5e7'],
                        ['color' => 'Space Gray', 'hex' => '#3a3a3c']
                    ],
                    'url' => '#homepod-mini'
                ],
                [
                    'id' => 504,
                    'eyebrow' => 'HOMEPOD',
                    'title' => 'HomePod',
                    'description' => 'Pro sound at home.',
                    'price_label' => 'MRP ₹32900.00 (Incl. of all taxes)',
                    'price_raw' => 32900.00,
                    'image' => 'assets/images/LoudImg/homepod-select-white-202610 1.png',
                    'badge' => 'Spatial Audio',
                    'theme' => 'light',
                    'swatches' => [
                        ['color' => 'Midnight', 'hex' => '#1f242c'],
                        ['color' => 'White', 'hex' => '#e5e5e7']
                    ],
                    'url' => '#homepod'
                ],
                [
                    'id' => 505,
                    'eyebrow' => 'BEATS PILL',
                    'title' => 'Beats Pill',
                    'description' => 'Sound bigger than ever.',
                    'price_label' => 'MRP ₹16900.00 (Incl. of all taxes)',
                    'price_raw' => 16900.00,
                    'image' => 'assets/images/LoudImg/beats-360-hero-select-202609-pink 1.png',
                    'badge' => 'New',
                    'theme' => 'light',
                    'swatches' => [
                        ['color' => 'Matte Black', 'hex' => '#1c1c1e'],
                        ['color' => 'Statement Red', 'hex' => '#d71e28'],
                        ['color' => 'Champagne Gold', 'hex' => '#cfba96']
                    ],
                    'url' => '#beats-pill'
                ],
                [
                    'id' => 506,
                    'eyebrow' => 'BEATS PILL',
                    'title' => 'Beats Pill - Champagne Gold',
                    'description' => 'Up to 24 hours of battery life.',
                    'price_label' => 'MRP ₹16900.00 (Incl. of all taxes)',
                    'price_raw' => 16900.00,
                    'image' => 'assets/images/LoudImg/MW463 1.png',
                    'badge' => 'New',
                    'theme' => 'light',
                    'url' => '#beats-pill-gold'
                ],
                [
                    'id' => 507,
                    'eyebrow' => 'POWERBEATS PRO',
                    'title' => 'Powerbeats Pro',
                    'description' => 'High-performance workout earphones.',
                    'price_label' => 'MRP ₹19900.00 (Incl. of all taxes)',
                    'price_raw' => 19900.00,
                    'image' => 'assets/images/LoudImg/MX743 1.png',
                    'badge' => 'Sweat Resistant',
                    'theme' => 'light',
                    'url' => '#powerbeats-pro'
                ]
            ],
            // Section 6: The Apple Experience
            'experience_cards' => [
                [
                    'id' => 601,
                    'eyebrow' => 'APPLE INTELLIGENCE',
                    'title' => 'AI for the rest of us.',
                    'subtitle' => 'Personal, private, powerful intelligence integrated deeply into iOS, iPadOS and macOS.',
                    'image' => 'assets/images/ExperienceImg/store-card-50-apple-intelligence-202609 1.png',
                    'theme' => 'light',
                    'url' => '#apple-intelligence'
                ],
                [
                    'id' => 602,
                    'eyebrow' => 'APPLE ECOSYSTEM',
                    'title' => 'All your devices. One seamless experience.',
                    'subtitle' => 'Copy on iPhone, paste on Mac. Hand off calls. Everything works together effortlessly.',
                    'image' => 'assets/images/ExperienceImg/store-card-50-continuity-202609_GEO_IN 1.png',
                    'theme' => 'light',
                    'url' => '#continuity'
                ],
                [
                    'id' => 603,
                    'eyebrow' => 'APPLE ONE',
                    'title' => 'Six Apple services. One easy subscription.',
                    'subtitle' => 'Bundle Apple Music, Apple TV+, Apple Arcade, iCloud+ and more into one simple monthly plan.',
                    'image' => 'assets/images/ExperienceImg/store-card-50-app-bundle-202609 1.png',
                    'theme' => 'light',
                    'url' => '#apple-one'
                ],
                [
                    'id' => 604,
                    'eyebrow' => 'APPLECARE+',
                    'title' => 'Coverage for accidental drops, spills and more.',
                    'subtitle' => 'Get peace of mind with 24/7 priority access to Apple experts and certified repairs.',
                    'image' => 'assets/images/ExperienceImg/store-card-50-applecare-202609 1.png',
                    'theme' => 'light',
                    'url' => '#applecare'
                ],
                [
                    'id' => 605,
                    'eyebrow' => 'HOME',
                    'title' => 'See how one little app can manage your whole smart home.',
                    'subtitle' => 'Control lights, locks, cameras and thermostats securely from your Apple devices.',
                    'image' => 'assets/images/ExperienceImg/store-card-50-home-ecosystem-202610_GEO_IN 1.png',
                    'theme' => 'light',
                    'url' => '#home-ecosystem'
                ],
                [
                    'id' => 606,
                    'eyebrow' => 'APPLE TV 4K',
                    'title' => 'The Apple experience. Cinematic in every sense.',
                    'subtitle' => 'Stream stunning 4K Dolby Vision, HDR10+, and immersive Spatial Audio.',
                    'image' => 'assets/images/ExperienceImg/store-card-50-homekit-202610_GEO_IN 1.png',
                    'theme' => 'dark',
                    'url' => '#apple-tv'
                ],
                [
                    'id' => 607,
                    'eyebrow' => 'FREE ENGRAVING',
                    'title' => 'Make them yours with a mix of emoji, text and numbers.',
                    'subtitle' => 'Free personalisation exclusively at the Apple Store.',
                    'image' => 'assets/images/ExperienceImg/store-card-40-holiday-gifting-202512 1.png',
                    'theme' => 'light',
                    'url' => '#free-engraving'
                ]
            ],
            // Section 7: Special Stores
            'special_stores_cards' => [
                [
                    'id' => 701,
                    'eyebrow' => 'EDUCATION',
                    'title' => 'Save on Mac or iPad with education pricing.',
                    'subtitle' => 'Available to current and newly accepted university students, parents buying for them, and teachers and staff at all levels.',
                    'image' => 'assets/images/OffersImg/store-card-40-education-202609 1.png',
                    'theme' => 'light',
                    'link_text' => 'Shop Education',
                    'url' => '#education'
                ],
                [
                    'id' => 702,
                    'eyebrow' => 'BUSINESS',
                    'title' => 'From enterprise to small business, we’ll work with you.',
                    'subtitle' => 'Specialized pricing, flexible financing options, and expert deployment support.',
                    'image' => '',
                    'theme' => 'light',
                    'link_text' => 'Shop Business',
                    'url' => '#business-store'
                ]
            ],
            'quick_links' => [
                ['label' => 'Order Status', 'url' => '#order-status'],
                ['label' => 'Shopping Help', 'url' => '#shopping-help'],
                ['label' => 'Returns', 'url' => '#returns'],
                ['label' => 'Your Saves', 'url' => '#your-saves']
            ]
        ];
    }
}
