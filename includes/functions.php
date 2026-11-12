<?php
/**
 * Utility Functions
 * Apple Store India Clone
 */

if (!function_exists('formatPrice')) {
    /**
     * Formats a number to Indian Rupee currency standard
     * Example: 164900 -> "₹164900.00‡" or "₹1,64,900.00‡"
     */
    function formatPrice(float $amount, bool $withSymbol = true, bool $withDagger = true): string {
        $formatted = number_format($amount, 2, '.', '');
        $prefix = $withSymbol ? 'From ₹' : '';
        $suffix = $withDagger ? '‡' : '';
        return $prefix . $formatted . $suffix;
    }
}

if (!function_exists('e')) {
    /**
     * Escapes HTML output safely
     */
    function e(?string $string): string {
        return htmlspecialchars($string ?? '', ENT_QUOTES, 'UTF-8');
    }
}

if (!function_exists('renderActionChevron')) {
    /**
     * Renders standard Apple circle action button with next (>) chevron
     */
    function renderActionChevron(string $ariaLabel = 'Explore product'): string {
        return sprintf(
            '<button type="button" class="card-action-circle" aria-label="%s">' .
            '<svg width="12" height="12" viewBox="0 0 12 12" fill="none" aria-hidden="true">' .
            '<path d="M4.5 2.5L8 6L4.5 9.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>' .
            '</svg>' .
            '</button>',
            e($ariaLabel)
        );
    }
}

if (!function_exists('cleanImageUrl')) {
    /**
     * Sanitizes and properly URL-encodes image paths for Apache/Linux compatibility
     */
    function cleanImageUrl(?string $path): string {
        if (empty($path)) return '';
        $segments = explode('/', $path);
        $encoded = array_map(function($segment) {
            return rawurlencode($segment);
        }, $segments);
        return implode('/', $encoded);
    }
}

