<?php
/**
 * Run migration + clear caches. Self-deletes after execution.
 */

if (($_GET['key'] ?? '') !== 'BundU-Deploy-2026-X9k') {
    http_response_code(403);
    die('Forbidden');
}

header('Content-Type: text/plain; charset=utf-8');
$base = __DIR__;

echo "=== BundU Maintenance — Migrate & Clear ===\n\n";

// Run migration
echo "Running migration...\n";
$output = [];
$code = 0;
exec('cd ' . escapeshellarg($base) . ' && php artisan migrate --force 2>&1', $output, $code);
echo implode("\n", $output) . "\n";
echo "Exit code: $code\n\n";

// Clear caches
echo "Clearing caches...\n";
exec('cd ' . escapeshellarg($base) . ' && php artisan config:clear 2>&1', $o1);
echo implode("\n", $o1) . "\n";
exec('cd ' . escapeshellarg($base) . ' && php artisan view:clear 2>&1', $o2);
echo implode("\n", $o2) . "\n";
exec('cd ' . escapeshellarg($base) . ' && php artisan route:clear 2>&1', $o3);
echo implode("\n", $o3) . "\n\n";

// Self-delete
unlink(__FILE__);
echo "_deploy.php self-deleted\n";
echo "\n=== Done ===\n";
