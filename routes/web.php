<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\StepController;
use App\Http\Controllers\TypingController;
use App\Http\Controllers\CertificateController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', [ContactController::class, 'show'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

Route::get('/privacy-policy', function () {
    return view('privacy-policy');
})->name('privacy-policy');

Route::get('/terms-of-service', function () {
    return view('terms-of-service');
})->name('terms-of-service');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('/dashboard/user', [DashboardController::class, 'userDashboard'])
        ->middleware('role:user')
        ->name('dashboard.user');

    Route::get('/dashboard/institution-admin', [DashboardController::class, 'institutionAdminDashboard'])
        ->middleware('role:institution_admin')
        ->name('dashboard.institution-admin');

    Route::get('/dashboard/teacher', [DashboardController::class, 'teacherDashboard'])
        ->middleware('role:teacher')
        ->name('dashboard.teacher');

    Route::get('/dashboard/super-admin', [DashboardController::class, 'superAdminDashboard'])
        ->middleware('role:super_admin')
        ->name('dashboard.super-admin');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Certificate Routes
    Route::get('/my/certificates', [CertificateController::class, 'myCertificates'])->name('certificates.my');
    Route::get('/certificates/{certificate}/download', [CertificateController::class, 'download'])->name('certificates.download');

    // Learning Module Routes
    Route::middleware('beginner-steps')->group(function () {
        Route::get('/levels', [LevelController::class, 'index'])->name('levels.index');
        Route::get('/levels/{level}', [LevelController::class, 'show'])->name('levels.show');
        Route::get('/steps/{step}', [StepController::class, 'show'])->name('steps.show');

        // Typing Exercise Routes
        Route::get('/exercises/{exercise}', [TypingController::class, 'show'])->name('exercises.show');
        Route::post('/exercises/{exercise}/attempt', [TypingController::class, 'submit'])->name('exercises.attempt');
    });
});

// Test routes for view testing
Route::get('/test-exercise-show', function () {
    return view('exercises.show', [
        'exercise' => (object)[
            'id' => 1,
            'title' => 'Sample Typing Exercise',
            'text' => 'The quick brown fox jumps over the lazy dog. This sentence contains all the letters in the English alphabet.',
            'time_limit_seconds' => 60,
            'step' => (object)[
                'title' => 'Basic Typing',
                'level' => (object)[
                    'title' => 'Beginner'
                ]
            ]
        ],
        'lastAttempts' => collect([
            (object)[
                'created_at' => now(),
                'wpm' => 45,
                'accuracy' => 92,
                'errors' => 3,
                'duration_seconds' => 58
            ],
            (object)[
                'created_at' => now()->subMinutes(10),
                'wpm' => 38,
                'accuracy' => 88,
                'errors' => 5,
                'duration_seconds' => 60
            ]
        ])
    ]);
})->name('test.exercise.show');

Route::get('/test-exercise-result', function () {
    return view('exercises.result', [
        'exercise' => (object)[
            'id' => 1,
            'title' => 'Sample Typing Exercise',
            'step' => (object)[
                'id' => 1
            ]
        ],
        'wpm' => 52,
        'accuracy' => 95,
        'errors' => 2,
        'duration_seconds' => 55,
        'motivational_message' => 'Excellent work! You have amazing typing skills!',
        'lastAttempts' => collect([
            (object)[
                'created_at' => now(),
                'wpm' => 45,
                'accuracy' => 92,
                'errors' => 3,
                'duration_seconds' => 58
            ],
            (object)[
                'created_at' => now()->subMinutes(10),
                'wpm' => 38,
                'accuracy' => 88,
                'errors' => 5,
                'duration_seconds' => 60
            ]
        ])
    ]);
})->name('test.exercise.result');

require __DIR__.'/auth.php';

// Certificate verification route (public)
Route::get('/cert/{certificate_code}', [CertificateController::class, 'verify'])->name('certificates.verify');

// Test route for certificate service
Route::get('/test-certificate', [\App\Http\Controllers\TestCertificateController::class, 'testCertificate'])
    ->name('test.certificate');

// Test routes for certificate verification view
Route::get('/test-valid-certificate', [\App\Http\Controllers\TestCertificateController::class, 'testValidCertificate'])
    ->name('test.valid.certificate');

Route::get('/test-invalid-certificate', [\App\Http\Controllers\TestCertificateController::class, 'testInvalidCertificate'])
    ->name('test.invalid.certificate');
