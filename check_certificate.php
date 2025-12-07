<?php

require __DIR__ . '/vendor/autoload.php';

use App\Models\Certificate;

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

$cert = Certificate::first();

if ($cert) {
    echo "Certificate found!\n";
    echo "ID: " . $cert->id . "\n";
    echo "User ID: " . $cert->user_id . "\n";
    echo "Level ID: " . $cert->level_id . "\n";
    echo "Certificate Code: " . $cert->certificate_code . "\n";
    echo "Title: " . $cert->title . "\n";
    echo "PDF Path: " . ($cert->pdf_path ?? 'NULL') . "\n";
    echo "Issued At: " . $cert->issued_at . "\n";
    echo "Meta: " . json_encode($cert->meta) . "\n";
} else {
    echo "No certificate found.\n";
}