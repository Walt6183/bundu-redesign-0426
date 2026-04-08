<?php

/**
 * Hostpoint Production Entry Point
 * 
 * Document Root: ~/www/bundu.ch/
 * Laravel App:   ~/bundu-app/
 */

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Path to the Laravel application (outside document root)
$appPath = dirname($_SERVER['DOCUMENT_ROOT']) . '/bundu-app';

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = $appPath.'/storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require $appPath.'/vendor/autoload.php';

// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once $appPath.'/bootstrap/app.php';

$app->handleRequest(Request::capture());
