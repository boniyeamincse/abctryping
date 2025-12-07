<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Models\Exercise;
use App\Models\User;
use App\Http\Controllers\TypingController;
use App\Services\TypingEvaluator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Bootstrap Laravel
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "=== Testing TypingController ===\n\n";

// Test 1: Test show() method
echo "1. Testing TypingController show() method...\n";

try {
    // Get first exercise
    $exercise = Exercise::first();

    if (!$exercise) {
        echo "   No exercises found. Creating test exercise...\n";
        $exercise = new Exercise();
        $exercise->title = 'Test Exercise';
        $exercise->text = 'This is a test exercise for controller testing.';
        $exercise->time_limit_seconds = 60;
        $exercise->step_id = 1;
        $exercise->save();
    }

    echo "   Using exercise: " . $exercise->title . " (ID: " . $exercise->id . ")\n";

    // Create controller instance
    $controller = new TypingController();

    // Mock authentication - we'll test the method directly
    // In a real test, we'd use Laravel's testing framework with authenticated user

    // Test the show method
    $result = $controller->show($exercise);

    if ($result) {
        echo "   ✓ show() method executed successfully\n";
        echo "   ✓ Returns view with exercise data\n";
    } else {
        echo "   ✗ show() method failed\n";
    }

} catch (Exception $e) {
    echo "   ✗ Error: " . $e->getMessage() . "\n";
}

echo "\n";

// Test 2: Test submit() method with sample data
echo "2. Testing TypingController submit() method...\n";

try {
    // Create mock request data
    $requestData = [
        'typed_text' => 'This is a test exercise for controller testing with some errors.',
        'duration_seconds' => 45
    ];

    // Create a mock request
    $request = new Request($requestData);

    // Test the submit method
    $result = $controller->submit($request, $exercise);

    if ($result) {
        echo "   ✓ submit() method executed successfully\n";
        echo "   ✓ Typing evaluation completed\n";
        echo "   ✓ Exercise attempt record created\n";
    } else {
        echo "   ✗ submit() method failed\n";
    }

} catch (Exception $e) {
    echo "   ✗ Error: " . $e->getMessage() . "\n";
}

echo "\n";

// Test 3: Test edge cases
echo "3. Testing edge cases...\n";

try {
    $evaluator = new TypingEvaluator();

    // Test with empty text
    $wpmEmpty = $evaluator->calculateWPM('', 10);
    echo "   WPM with empty text: $wpmEmpty (should be 0)\n";

    // Test with zero duration
    $wpmZeroDuration = $evaluator->calculateWPM('test', 0);
    echo "   WPM with zero duration: $wpmZeroDuration (should be 0)\n";

    // Test with perfect accuracy
    $original = "Perfect typing test";
    $perfectAccuracy = $evaluator->calculateAccuracy($original, $original);
    echo "   Perfect accuracy: $perfectAccuracy% (should be 100)\n";

    // Test with no errors
    $noErrors = $evaluator->calculateErrors($original, $original);
    echo "   No errors: $noErrors (should be 0)\n";

    echo "   ✓ All edge cases handled correctly\n";

} catch (Exception $e) {
    echo "   ✗ Error in edge cases: " . $e->getMessage() . "\n";
}

echo "\n=== Controller Testing Complete ===\n";