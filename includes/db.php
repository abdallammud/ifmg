<?php
/**
 * IFMG Frontend Database & Localization Bootstrap
 */

// Include CMS database config
require_once __DIR__ . '/../ifmg_admin/config/database.php';

// Session for language persistence
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Current Language (default: en)
if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'] === 'so' ? 'so' : 'en';
}
$lang = $_SESSION['lang'] ?? 'en';

/**
 * Get localized text from a database row
 */
function get_text($row, $field)
{
    global $lang;
    $suffix = ($lang === 'so') ? '_so' : '_en';
    return $row[$field . $suffix] ?? $row[$field . '_en'] ?? '';
}

/**
 * Fetch global settings
 */
function get_settings($key = null)
{
    global $mysqli;
    static $settings = null;

    if ($settings === null) {
        $res = $mysqli->query("SELECT setting_key, setting_value FROM settings");
        $settings = [];
        if ($res) {
            while ($row = $res->fetch_assoc()) {
                $settings[$row['setting_key']] = $row['setting_value'];
            }
        }
    }

    if ($key === null) {
        return $settings;
    }

    return $settings[$key] ?? '';
}

// Pre-load settings
get_settings();

/**
 * Escaping helper
 */
function e($value)
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

/**
 * Asset URL helper (Frontend)
 */
function fe_asset($path)
{
    if (empty($path))
        return '';

    // Strip redundant 'assets/' even if it's deeply nested like 'assets/assets/'
    while (strpos($path, 'assets/') === 0) {
        $path = substr($path, 7);
    }

    // If it's already a full URL or starts with ifmg_admin/
    if (strpos($path, 'http') === 0 || strpos($path, 'ifmg_admin/') === 0) {
        return $path;
    }

    // Special case for logo.png if it's just the filename
    if ($path === 'logo.png') {
        return 'assets/images/logo.png';
    }

    // If it's a CMS upload (usually starts with hero/, partners/, etc.)
    $cms_folders = ['hero/', 'partners/', 'uploads/', 'director/', 'media/', 'publications/'];
    foreach ($cms_folders as $folder) {
        if (strpos($path, $folder) === 0) {
            return 'ifmg_admin/assets/uploads/' . $path;
        }
    }

    // Default to frontend assets
    return 'assets/' . $path;
}
