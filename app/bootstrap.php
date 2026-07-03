<?php
declare(strict_types=1);

// Bootstrap: config, errors, session, db. Included by every entry point.

const APP_ROOT = __DIR__ . '/..';
$config = require APP_ROOT . '/config.php';

date_default_timezone_set('UTC');
error_reporting(E_ALL);
ini_set('display_errors', $config['password'] === 'change-me-please' ? '1' : '0');

session_set_cookie_params([
    'httponly' => true,
    'samesite' => 'Lax',
    'secure'   => (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off'),
]);
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require APP_ROOT . '/app/db.php';
require APP_ROOT . '/app/helpers.php';
require APP_ROOT . '/app/actions.php';

db_init($config['db_path']);

// Content Security Policy — moderate, allows the CDN scripts/styles in use.
// Skipped for the dev server if it interferes; only set once.
if (!headers_sent()) {
    $csp = [
        "default-src 'self'",
        "script-src 'self' 'unsafe-inline' https://cdn.tailwindcss.com https://cdn.jsdelivr.net",
        "style-src 'self' 'unsafe-inline' https://fonts.googleapis.com",
        "font-src https://fonts.gstatic.com data:",
        "img-src 'self' data: blob: https:",
        "media-src 'self' blob:",
        "frame-src 'self'",
        "connect-src 'self'",
        "base-uri 'self'",
        "form-action 'self'",
        "object-src 'none'",
    ];
    header('Content-Security-Policy: ' . implode('; ', $csp));
    header('X-Content-Type-Options: nosniff');
    header('X-Frame-Options: SAMEORIGIN');
    header('Referrer-Policy: strict-origin-when-cross-origin');
}
