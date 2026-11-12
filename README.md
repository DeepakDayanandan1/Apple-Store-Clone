# Apple Store Online (India) - Web Clone

A high-fidelity, pixel-accurate clone of the official [Apple Store Online (India)](https://www.apple.com/in/store), built from the ground up using **Core PHP**, **MySQL**, **HTML5**, **CSS3**, and **JavaScript**.

This project contains zero external frontend frameworks or heavy dependencies (no Bootstrap, Tailwind, or jQuery), delivering maximum performance, native typography, fluid micro-interactions, responsive horizontal carousels, and the signature Apple frosted-glass design language.

---

## Table of Contents

1. [Project Overview](#project-overview)
2. [Key Features](#key-features)
3. [Project Structure](#project-structure)
4. [Technology Stack](#technology-stack)
5. [Prerequisites](#prerequisites)
6. [Installation & Setup](#installation--setup)
7. [Database Setup & Schema](#database-setup--schema)
8. [Component Breakdown](#component-breakdown)
9. [Responsive Design Specifications](#responsive-design-specifications)


---

## Project Overview

This clone faithfully replicates the visual hierarchy, micro-interactions, layout proportions, and responsive design of Apple India's online storefront. It includes dynamic database integration for products, categories, accessory swatches, and shopping benefits, backed by graceful offline fallbacks so the project runs out of the box.

---

## Key Features

- **Global Navigation with Interactive Hover Flyouts**:
  - Sticky glassmorphic navbar with `-webkit-backdrop-filter` and `backdrop-filter: blur(20px)`.
  - Full-width desktop hover mega-menus for all major categories (**Store**, **Mac**, **iPad**, **iPhone**, **Watch**, **AirPods**, **Home**, **Entertainment**, **Accessories**, **Support**).
  - Multi-column link structures with primary headlines, secondary sub-links, and product categories.
  - Interactive **Search Flyout** with instant client-side product filtering and quick links.
  - Interactive **Shopping Bag Flyout** showing bag status, user profile links, and live cart contents.
  - Full-page frosted backdrop blur that dims and blurs background content when any flyout is active.
  - Smooth diagonal mouse movement debouncing (180ms) to ensure comfortable navigation between menus.

- **Promotional Ribbon Banner**:
  - Highlights instant cashback offers (up to ₹10,000.00) and No Cost EMI terms for Indian cardholders.

- **Store Hero & Specialist Contact**:
  - Large display typography: **"Store."** paired with **"The best way to buy the products you love."**
  - Direct specialist engagement cards (*Connect with a Specialist*, *Find an Apple Store*).

- **Horizontal Category Shelf**:
  - Visual product categories (Mac, iPhone, iPad, Apple Watch, AirPods, AirTag, HomePod, Accessories) with hover scaling.

- **The Latest (Spotlight Carousel)**:
  - High-impact product cards featuring iPhone 16 Pro, iPhone 16, Apple Watch Series 10, Apple Watch Ultra 2, MacBook Pro M4, iPad mini, and iMac.
  - Smooth native horizontal scroll with custom circular navigation controls (`<` and `>`).

- **Accessories Section**:
  - Interactive product cards with dynamic color swatches.
  - Add-to-bag functionality persisting to `localStorage` and updating the bag badge in real time.

- **The Apple Store Difference**:
  - Distinctive benefit cards highlighting Apple Trade In, flexible monthly financing, custom Mac configuration, free engraving/personalization, and free delivery/returns.

- **Help is Here**:
  - Customer support cards showcasing video sessions with Specialists, Personal Setup onboarding, and Genius Bar support.

- **Loud and Clear**:
  - Audio and music lineup showcasing AirPods Pro 2, AirPods Max, HomePod, and Apple Music trial promotions.

- **The Apple Experience**:
  - Deep-dive feature cards highlighting Apple Intelligence, Continuity/Ecosystem, Apple One, AppleCare+, and HomeKit integration.

- **Special Stores & Education**:
  - Dedicated cards for Apple Education savings, student discounts, and business procurement.

- **Official Apple India Footer**:
  - Detailed bank offer footnotes, legal disclosures, and regulatory notes.
  - Desktop 5-column directory transforming into smooth collapsible accordions on mobile viewports.
  - Breadcrumbs navigation (` > Apple Store Online`), copyright statements, and India region selector.

---

## Project Structure

```
apple-store-clone/
│
├── index.php                       # Main application entry point
│
├── config/
│   └── database.php                # Database connection & fallback data provider
│
├── includes/
│   ├── header.php                  # HTML <head>, meta tags, and style links
│   ├── navigation.php              # Global navbar, mega-menu flyouts, search & bag
│   ├── footer.php                  # Footnotes, directory columns, legal notices
│   └── functions.php               # Helper functions (currency formatting, sanitization)
│
├── sections/
│   ├── hero.php                    # Store headline, specialist links, category shelf
│   ├── product-highlights.php      # "The latest" spotlight product carousel
│   ├── products.php                # General product catalog sections
│   ├── accessories.php             # Accessories shelf with interactive color swatches
│   ├── shopping-benefits.php       # "The Apple Store difference" benefit cards
│   └── promotions.php              # Help, Audio, Experience, and Education sections
│
├── assets/
│   ├── images/                     # Product imagery, banners, and thumbnails
│   │   ├── hero/
│   │   ├── products/
│   │   ├── banners/
│   │   ├── AccessoriesImg/
│   │   ├── DifferenceImg/
│   │   ├── ExperienceImg/
│   │   ├── HelpImg/
│   │   ├── LoudImg/
│   │   ├── NavImg/
│   │   └── OffersImg/
│   └── icons/                      # Custom inline SVGs and Apple icons
│
├── css/
│   ├── style.css                   # Global reset, typography, CSS custom properties
│   ├── header.css                  # Navbar, flyout mega-menus, search, bag, backdrops
│   ├── sections.css                # Hero, cards, carousels, swatches, difference grid
│   └── responsive.css              # Breakpoints (1200px, 1024px, 834px, 734px, 480px)
│
├── js/
│   ├── script.js                   # Application lifecycle & interaction controller
│   ├── carousel.js                 # Horizontal carousel slider & swipe behavior
│   └── navigation.js               # Mega-menu hover controller, live search & mobile drawer
│
├── database/
│   └── apple_store.sql             # MySQL database schema and seed data
│
├── README.md                       # Comprehensive project documentation
└── .gitignore                      # Git ignore file for local configuration
```

---

## Technology Stack

- **Backend**: Core PHP 8.2+ (Modular object-oriented architecture, PDO MySQL driver)
- **Database**: MySQL 5.7+ / MariaDB 10.4+
- **Frontend**: Semantic HTML5, CSS3 (Modern Flexbox, CSS Grid, Custom Properties, Glassmorphism)
- **Scripting**: Vanilla JavaScript (ES6+, zero third-party libraries or frameworks)

---

## Prerequisites

Before running the project locally, ensure you have the following installed:

- **PHP** 8.2 or higher
- **MySQL** 5.7+ or MariaDB 10.4+ (Optional; built-in data fallback handles offline viewing)
- A modern web browser (Google Chrome, Apple Safari, Mozilla Firefox, or Microsoft Edge)

---

## Installation & Setup

### 1. Clone or Open the Repository
```bash
cd "c:\Projects\Apple Store Clone"
```

### 2. Set Up the MySQL Database
1. Open your MySQL administration tool (e.g. phpMyAdmin, MySQL Workbench, or MySQL CLI).
2. Import the SQL file located at `database/apple_store.sql`:
   ```bash
   mysql -u root -p < database/apple_store.sql
   ```
3. The script automatically creates the `apple_store` database, initializes the table schemas, and inserts all sample products and categories with Indian Rupee (₹) pricing.

### 3. Configure Database Credentials (Optional)
If your local MySQL service uses credentials other than `root` with no password, edit `config/database.php`:
```php
private string $host = '127.0.0.1';
private string $dbname = 'apple_store';
private string $username = 'root';
private string $password = 'your_password';
```
> **Fail-Safe Design**: If MySQL is not running or the database is not configured, the application automatically loads the built-in dataset without throwing fatal errors.

### 4. Start the Local Server
Run PHP's built-in development server from the project root:
```bash
php -S localhost:8000
```

Open your browser and navigate to:
```
http://localhost:8000
```

---

## Component Breakdown

### 1. Navigation & Mega-Menu Flyouts
- **Header Structure**: `includes/navigation.php`
- **Flyout Styles**: `css/header.css`
- **Controller Logic**: `js/navigation.js`
- Displays individual mega-menu panels with exact link hierarchies for Store, Mac, iPad, iPhone, and all categories. Sibling nav items subtly dim on hover, and mouse movements are debounced to ensure seamless diagonal cursor travel.

### 2. Live Search & Bag Panels
- **Live Search**: Typing into the search input instantly queries available products, hiding static quick links and rendering matching product thumbnails, titles, and prices.
- **Shopping Bag**: Displays an empty-bag prompt with a sign-in link, order history shortcuts, and real-time cart item listings if products are added.

### 3. Carousel Controllers
- **Slider Logic**: `js/carousel.js`
- Implements touch swipe, mouse drag, and circular button navigation (`<` and `>`). Automatically disables navigation buttons when reaching the start or end of the track.

### 4. Mobile Drawer & Accordions
- On screens 834px and narrower, the desktop navbar transitions into a mobile top bar with a hamburger icon. Toggling the icon triggers a full-screen mobile menu drawer.
- The footer directory links automatically transform from 5 desktop columns into collapsible accordion headers with chevron indicators.

---

## Responsive Design Specifications

The application includes tailored styles across standard device breakpoints:

| Breakpoint | Target Devices | Layout Adaptations |
| :--- | :--- | :--- |
| **> 1024px** | Large Desktops / iMacs | Full 1024px centered navbar, 3-column mega-menus, multi-card carousels |
| **835px – 1024px** | Tablets (Landscape) / Laptops | Proportional card scaling, adapted flyouts, preserved carousels |
| **735px – 834px** | Tablets (Portrait) / iPad Mini | Mobile top bar with hamburger toggle, compact cards |
| **< 734px** | Smartphones (iPhone 14/15/16 Pro Max) | Full-width cards, touch swipe snapping, collapsible footer accordions |

