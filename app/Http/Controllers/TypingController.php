<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\ExerciseAttempt;
use App\Services\ProgressService;
use App\Services\CertificateService;
use App\Services\TypingEvaluator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TypingController extends Controller
{
    protected $progressService;
    protected $certificateService;

    public function __construct(ProgressService $progressService, CertificateService $certificateService)
    {
        $this->progressService = $progressService;
        $this->certificateService = $certificateService;
    }

    /**
     * Display the typing exercise
     *
     * @param Exercise $exercise
     * @return \Illuminate\View\View
     */
    public function show(Exercise $exercise)
    {
        // Only for authenticated users
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Load exercise with level and step relationships
        $exercise->load(['step.level']);

        // Get user's last 3 attempts for this exercise
        $lastAttempts = ExerciseAttempt::where('user_id', Auth::id())
            ->where('exercise_id', $exercise->id)
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        return view('exercises.show', [
            'exercise' => $exercise,
            'title' => $exercise->title,
            'text' => $exercise->text,
            'time_limit_seconds' => $exercise->time_limit_seconds,
            'last_attempts' => $lastAttempts
        ]);
    }

    /**
     * Handle typing exercise submission
     *
     * @param Request $request
     * @param Exercise $exercise
     * @return \Illuminate\View\View
     */
    public function submit(Request $request, Exercise $exercise)
    {
        // Validate request data
        $validated = $request->validate([
            'typed_text' => 'required|string',
            'duration_seconds' => 'required|integer|min:1'
        ]);

        // Use TypingEvaluator service to calculate metrics
        $evaluator = new TypingEvaluator();
        $metrics = $evaluator->evaluateTyping(
            $exercise->text,
            $validated['typed_text'],
            $validated['duration_seconds']
        );

        // Create ExerciseAttempt record
        $attempt = ExerciseAttempt::create([
            'user_id' => Auth::id(),
            'exercise_id' => $exercise->id,
            'wpm' => $metrics['wpm'],
            'accuracy' => $metrics['accuracy'],
            'errors' => $metrics['errors'],
            'duration_seconds' => $validated['duration_seconds'],
            'typed_text' => $validated['typed_text']
        ]);

        // Update progress for authenticated users only
        if (Auth::check()) {
            try {
                $this->progressService->updateProgressAfterAttempt(Auth::user(), $attempt, $this->certificateService);
            } catch (\Exception $e) {
                // Log the error but don't fail the request
                \Log::error('Failed to update progress after exercise attempt: ' . $e->getMessage());
            }
        }

        // Generate motivational message based on performance
        $motivationalMessage = $this->getMotivationalMessage($metrics['accuracy'], $metrics['wpm']);

        return view('exercises.result', [
            'exercise' => $exercise,
            'wpm' => $metrics['wpm'],
            'accuracy' => $metrics['accuracy'],
            'errors' => $metrics['errors'],
            'duration_seconds' => $validated['duration_seconds'],
            'motivational_message' => $motivationalMessage
        ]);
    }

    /**
     * Generate motivational message based on typing performance
     *
     * @param int $accuracy
     * @param int $wpm
     * @return string
     */
    private function getMotivationalMessage(int $accuracy, int $wpm): string
    {
        if ($accuracy >= 95 && $wpm >= 60) {
            return 'Excellent work! You have amazing typing skills!';
        } elseif ($accuracy >= 90 && $wpm >= 40) {
            return 'Great job! Keep practicing to improve even more!';
        } elseif ($accuracy >= 80 && $wpm >= 30) {
            return 'Good effort! With more practice, you\'ll get even better!';
        } elseif ($accuracy >= 70) {
            return 'Not bad! Focus on accuracy and speed will follow!';
        } else {
            return 'Keep practicing! Every attempt helps you improve!';
        }
    }

    /**
     * Display the practice index page with available exercises
     *
     * @return \Illuminate\View\View
     */
    public function practiceIndex()
    {
        // Only for authenticated users
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Get available exercises for practice
        $exercises = Exercise::with(['step.level'])
            ->orderBy('step_id')
            ->orderBy('difficulty')
            ->get();

        return view('exercises.practice-index', [
            'exercises' => $exercises
        ]);
    }
}