<?php

require __DIR__ . '/vendor/autoload.php';

use App\Services\CertificateService;
use App\Models\User;
use App\Models\Level;

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

try {
    $service = new CertificateService();
    $user = User::first();
    $level = Level::first();

    if (!$user || !$level) {
        echo "No user or level found for testing\n";
        exit(1);
    }

    echo "Testing certificate generation...\n";
    echo "User: " . $user->name . "\n";
    echo "Level: " . $level->name . "\n";

    $certificate = $service->generateForLevel($user, $level);

    echo "Certificate created successfully!\n";
    echo "Certificate Code: " . $certificate->certificate_code . "\n";
    echo "Title: " . $certificate->title . "\n";
    echo "PDF Path: " . $certificate->pdf_path . "\n";
    echo "Issued At: " . $certificate->issued_at . "\n";

} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    echo "Trace: " . $e->getTraceAsString() . "\n";
    exit(1);
}