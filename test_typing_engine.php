<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Models\Exercise;
use App\Models\User;
use App\Services\TypingEvaluator;

// Bootstrap Laravel
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "=== Typing Engine Testing ===\n\n";

// Test 1: Check if we have exercises
echo "1. Checking for existing exercises...\n";
$exerciseCount = Exercise::count();
echo "Found $exerciseCount exercises\n\n";

// Create test exercise if none exists
if ($exerciseCount === 0) {
    echo "Creating test exercise...\n";
    $exercise = new Exercise();
    $exercise->title = 'Test Typing Exercise';
    $exercise->text = 'The quick brown fox jumps over the lazy dog. This sentence contains all the letters in the English alphabet.';
    $exercise->time_limit_seconds = 60;
    $exercise->step_id = 1; // Assuming step 1 exists
    $exercise->save();
    echo "Created exercise with ID: " . $exercise->id . "\n\n";
} else {
    $exercise = Exercise::first();
    echo "Using existing exercise with ID: " . $exercise->id . "\n\n";
}

// Test 2: Test TypingEvaluator service
echo "2. Testing TypingEvaluator service...\n";

$evaluator = new TypingEvaluator();

// Test WPM calculation
echo "   a) Testing WPM calculation...\n";
$typedText = "The quick brown fox jumps over the lazy dog";
$duration = 30; // seconds
$wpm = $evaluator->calculateWPM($typedText, $duration);
echo "      WPM for '$typedText' in $duration seconds: $wpm\n";

// Test accuracy calculation
echo "   b) Testing accuracy calculation...\n";
$originalText = "The quick brown fox jumps over the lazy dog";
$typedTextWithErrors = "The quick brown fox jumps over the lazy cat";
$accuracy = $evaluator->calculateAccuracy($originalText, $typedTextWithErrors);
echo "      Accuracy: $accuracy%\n";

// Test error calculation
echo "   c) Testing error calculation...\n";
$errors = $evaluator->calculateErrors($originalText, $typedTextWithErrors);
echo "      Errors: $errors\n";

// Test full evaluation
echo "   d) Testing full evaluation...\n";
$metrics = $evaluator->evaluateTyping($originalText, $typedTextWithErrors, $duration);
echo "      Full metrics: " . json_encode($metrics) . "\n\n";

// Test 3: Test routes
echo "3. Testing routes...\n";
echo "   Routes are defined in routes/web.php\n";
echo "   - GET /exercises/{exercise} -> TypingController@show\n";
echo "   - POST /exercises/{exercise}/attempt -> TypingController@submit\n";
echo "   - Test routes available: /test-exercise-show, /test-exercise-result\n\n";

echo "=== Testing Complete ===\n";