<?php
/**
 * Hostpoint Deployment: Extract and Setup
 * 
 * Upload this + bundu-deploy.zip to www/bundu.ch/
 * Then visit: https://bundu.ch/_deploy.php?key=DEPLOY_KEY
 * 
 * SECURITY: Delete this file after deployment!
 */

$DEPLOY_KEY = 'BundU-Deploy-2026-X9k';

if (($_GET['key'] ?? '') !== $DEPLOY_KEY) {
    http_response_code(403);
    die('Forbidden');
}

set_time_limit(300);
error_reporting(E_ALL);
ini_set('display_errors', 1);

$action = $_GET['action'] ?? 'status';
$base = __DIR__;

header('Content-Type: text/plain; charset=utf-8');

switch ($action) {
    case 'status':
        echo "=== Deployment Status ===\n";
        echo "PHP: " . phpversion() . "\n";
        echo "Base: $base\n";
        echo "Zip exists: " . (file_exists("$base/bundu-deploy.zip") ? 'YES' : 'NO') . "\n";
        echo "vendor/ exists: " . (is_dir("$base/vendor") ? 'YES' : 'NO') . "\n";
        echo ".env exists: " . (file_exists("$base/.env") ? 'YES' : 'NO') . "\n";
        echo "artisan exists: " . (file_exists("$base/artisan") ? 'YES' : 'NO') . "\n";
        
        echo "\nPHP Extensions:\n";
        foreach (['pdo_mysql', 'mbstring', 'openssl', 'curl', 'zip', 'gd', 'intl', 'fileinfo'] as $ext) {
            echo "  $ext: " . (extension_loaded($ext) ? 'OK' : 'MISSING') . "\n";
        }
        
        echo "\nComposer: ";
        $composer = trim(shell_exec('which composer 2>/dev/null') ?? '');
        echo $composer ?: 'not found';
        echo "\n";
        
        echo "\nDisk free: " . round(disk_free_space($base) / 1024 / 1024) . " MB\n";
        break;

    case 'extract':
        $zipFile = "$base/bundu-deploy.zip";
        if (!file_exists($zipFile)) {
            die("ERROR: bundu-deploy.zip not found!\n");
        }
        
        echo "Extracting bundu-deploy.zip...\n";
        $zip = new ZipArchive();
        if ($zip->open($zipFile) === true) {
            $zip->extractTo($base);
            $zip->close();
            echo "Extracted " . filesize($zipFile) . " bytes successfully.\n";
        } else {
            die("ERROR: Could not open zip file!\n");
        }
        break;

    case 'composer':
        // Ensure storage directories exist
        $storageDirs = [
            "$base/storage/app/public",
            "$base/storage/framework/cache/data",
            "$base/storage/framework/sessions",
            "$base/storage/framework/views",
            "$base/storage/logs",
            "$base/bootstrap/cache",
        ];
        foreach ($storageDirs as $dir) {
            if (!is_dir($dir)) {
                mkdir($dir, 0755, true);
                echo "Created: $dir\n";
            }
        }
        
        echo "Running composer install --no-dev --optimize-autoloader...\n";
        $output = shell_exec('cd ' . escapeshellarg($base) . ' && composer install --no-dev --optimize-autoloader 2>&1');
        echo $output;
        break;

    case 'artisan':
        $cmd = $_GET['cmd'] ?? 'about';
        $allowed = ['about', 'migrate --force', 'migrate:fresh --force --seed', 'config:cache', 'route:cache', 'view:cache', 'storage:link', 'key:generate --force', 'optimize'];
        
        if (!in_array($cmd, $allowed)) {
            die("ERROR: Command '$cmd' not allowed. Allowed: " . implode(', ', $allowed));
        }
        
        echo "Running: php artisan $cmd\n";
        $output = shell_exec('cd ' . escapeshellarg($base) . ' && php artisan ' . $cmd . ' 2>&1');
        echo $output;
        break;

    case 'env':
        echo "Current .env (masked):\n";
        if (file_exists("$base/.env")) {
            $lines = file("$base/.env");
            foreach ($lines as $line) {
                if (preg_match('/^(.*?PASSWORD|.*?KEY|.*?SECRET)=(.+)$/i', trim($line), $m)) {
                    echo $m[1] . '=***' . "\n";
                } else {
                    echo $line;
                }
            }
        } else {
            echo ".env not found\n";
        }
        break;

    case 'cleanup':
        echo "Removing deployment artifacts...\n";
        if (file_exists("$base/bundu-deploy.zip")) {
            unlink("$base/bundu-deploy.zip");
            echo "Deleted bundu-deploy.zip\n";
        }
        echo "\n⚠️  REMOVE THIS FILE MANUALLY: _deploy.php\n";
        break;

    case 'log':
        $logFile = "$base/storage/logs/laravel.log";
        if (file_exists($logFile)) {
            // Clear old content first to get fresh errors
            $content = file_get_contents($logFile);
            // Get last error block
            $blocks = preg_split('/^\[(\d{4}-\d{2}-\d{2})/m', $content, -1, PREG_SPLIT_DELIM_CAPTURE);
            $lastBlocks = array_slice($blocks, -6); // Last 3 error blocks
            echo implode('', $lastBlocks);
        } else {
            echo "No log file found\n";
        }
        break;

    default:
        echo "Unknown action: $action\n";
        echo "Available: status, extract, composer, artisan&cmd=..., env, cleanup\n";
}
