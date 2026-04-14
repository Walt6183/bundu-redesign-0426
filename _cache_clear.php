<?php
if (($_GET['key'] ?? '') !== 'BundU-Deploy-2026-X9k') {
    http_response_code(403);
    die('Forbidden');
}

header('Content-Type: text/plain; charset=utf-8');
$base = realpath(__DIR__ . '/..');

echo "=== Cache Clear ===\n\n";

$commands = [
    'php artisan config:clear',
    'php artisan view:clear',
    'php artisan route:clear',
    'php artisan cache:clear',
    'php artisan filament:clear-cached-components',
    'php artisan optimize:clear',
    'php artisan icons:clear',
];

foreach ($commands as $cmd) {
    echo "> $cmd\n";
    $out = [];
    exec('cd ' . escapeshellarg($base) . " && $cmd 2>&1", $out);
    echo implode("\n", $out) . "\n\n";
    $out = [];
}

// Also check if the class is autoloadable
echo "=== Autoload Check ===\n";
exec('cd ' . escapeshellarg($base) . ' && php artisan tinker --execute="echo class_exists(\App\Filament\Pages\MaintenanceMode::class) ? \'CLASS FOUND\' : \'CLASS NOT FOUND\';" 2>&1', $out2);
echo implode("\n", $out2) . "\n\n";

// Check composer autoload
echo "=== Composer Dump ===\n";
exec('cd ' . escapeshellarg($base) . ' && composer dump-autoload 2>&1', $out3);
echo implode("\n", $out3) . "\n\n";

unlink(__FILE__);
echo "_deploy.php self-deleted\n=== Done ===\n";
