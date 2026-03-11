<?php
/**
 * IFMG CMS - Front Controller
 */

session_start();

// Define useful constants
define('DS', DIRECTORY_SEPARATOR);
define('BASE_PATH', __DIR__ . '/');
define('BASE_URL', '/FileZillaFTP/source/diff/ifmg/ifmg_admin/');

// Autoloader
spl_autoload_register(function ($class) {
    $paths = ['core', 'models', 'controllers'];
    foreach ($paths as $path) {
        $file = BASE_PATH . $path . DS . $class . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

// Load configuration
require_once BASE_PATH . 'config/database.php';
require_once BASE_PATH . 'config/app.php';

// Load Helpers (contains global functions)
require_once BASE_PATH . 'core/Helpers.php';

// Initialize Router
$router = new Router();

// Load Routes
require_once BASE_PATH . 'config/routes.php';

// Dispatch the request
$router->dispatch();
