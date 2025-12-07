<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\User;
use App\Models\ExerciseAttempt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class TeacherDashboardController extends Controller
{
    /**
     * Teacher Dashboard - Main view
     */
    public function dashboard()
    {
        $teacher = Auth::user();

        // Get all batches assigned to this teacher
        $batches = Batch::with(['students', 'level'])
            ->where('teacher_id', $teacher->id)
            ->get();

        // Get all student IDs from teacher's batches
        $studentIds = $this->getStudentIdsFromBatches($batches);

        // Summary Metrics
        $summary = [
            'total_batches' => $batches->count(),
            'total_students' => count($studentIds),
            'average_wpm' => $this->calculateAverageWpm($studentIds),
            'average_accuracy' => $this->calculateAverageAccuracy($studentIds),
        ];

        // Students who need attention
        $studentsAtRisk = $this->getStudentsAtRisk($studentIds);

        // Recent activity
        $recentActivity = $this->getRecentActivity($studentIds);

        return view('dashboard.teacher', [
            'batches' => $batches,
            'summary' => $summary,
            'studentsAtRisk' => $studentsAtRisk,
            'recentActivity' => $recentActivity,
        ]);
    }

    /**
     * Get student IDs from batches
     */
    protected function getStudentIdsFromBatches($batches): array
    {
        $studentIds = [];
        foreach ($batches as $batch) {
            $studentIds = array_merge($studentIds, $batch->students->pluck('id')->toArray());
        }
        return array_unique($studentIds);
    }

    /**
     * Calculate average WPM for students (last 7 days)
     */
    protected function calculateAverageWpm(array $studentIds): float
    {
        if (empty($studentIds)) {
            return 0;
        }

        return ExerciseAttempt::whereIn('user_id', $studentIds)
            ->where('created_at', '>=', now()->subDays(7))
            ->avg('wpm') ?? 0;
    }

    /**
     * Calculate average accuracy for students (last 7 days)
     */
    protected function calculateAverageAccuracy(array $studentIds): float
    {
        if (empty($studentIds)) {
            return 0;
        }

        return ExerciseAttempt::whereIn('user_id', $studentIds)
            ->where('created_at', '>=', now()->subDays(7))
            ->avg('accuracy') ?? 0;
    }

    /**
     * Get students who need attention
     */
    protected function getStudentsAtRisk(array $studentIds): array
    {
        if (empty($studentIds)) {
            return [];
        }

        // Get recent attempts for all students
        $recentAttempts = ExerciseAttempt::whereIn('user_id', $studentIds)
            ->where('created_at', '>=', now()->subDays(30))
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy('user_id');

        $studentsAtRisk = [];
        $batchAverages = $this->calculateBatchAverages($studentIds);

        foreach ($recentAttempts as $userId => $attempts) {
            $latestAttempt = $attempts->first();

            // Check if student meets at-risk criteria
            $isAtRisk = false;
            $reasons = [];

            // Low accuracy
            if ($latestAttempt->accuracy < 80) {
                $isAtRisk = true;
                $reasons[] = 'Low accuracy';
            }

            // No recent activity (last 3 days)
            $lastActivity = $latestAttempt->created_at;
            if ($lastActivity < now()->subDays(3)) {
                $isAtRisk = true;
                $reasons[] = 'Inactive';
            }

            // Significantly below batch average WPM
            if ($batchAverages['wpm'] > 0 && $latestAttempt->wpm < ($batchAverages['wpm'] * 0.7)) {
                $isAtRisk = true;
                $reasons[] = 'Below average WPM';
            }

            if ($isAtRisk) {
                $user = User::find($userId);
                if ($user) {
                    $studentsAtRisk[] = [
                        'user' => $user,
                        'wpm' => $latestAttempt->wpm,
                        'accuracy' => $latestAttempt->accuracy,
                        'last_active' => $lastActivity,
                        'reasons' => $reasons,
                    ];
                }
            }
        }

        return $studentsAtRisk;
    }

    /**
     * Calculate batch averages for comparison
     */
    protected function calculateBatchAverages(array $studentIds): array
    {
        return [
            'wpm' => ExerciseAttempt::whereIn('user_id', $studentIds)
                ->where('created_at', '>=', now()->subDays(7))
                ->avg('wpm') ?? 0,
            'accuracy' => ExerciseAttempt::whereIn('user_id', $studentIds)
                ->where('created_at', '>=', now()->subDays(7))
                ->avg('accuracy') ?? 0,
        ];
    }

    /**
     * Get recent activity from students
     */
    protected function getRecentActivity(array $studentIds): array
    {
        if (empty($studentIds)) {
            return [];
        }

        return ExerciseAttempt::with(['user', 'exercise'])
            ->whereIn('user_id', $studentIds)
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get()
            ->map(function ($attempt) {
                return [
                    'student_name' => $attempt->user->name,
                    'exercise_name' => $attempt->exercise->title,
                    'wpm' => $attempt->wpm,
                    'accuracy' => $attempt->accuracy,
                    'timestamp' => $attempt->created_at,
                ];
            })
            ->toArray();
    }

    /**
     * Batch Detail Page
     */
    public function batchDetail(Batch $batch)
    {
        // Authorization check
        if ($batch->teacher_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // Get students with their performance data
        $students = $batch->students()->with(['exerciseAttempts' => function($query) {
            $query->orderBy('created_at', 'desc')->limit(1);
        }])->get();

        $studentPerformance = $students->map(function ($student) {
            $latestAttempt = $student->exerciseAttempts->first();

            return [
                'student' => $student,
                'best_wpm' => $latestAttempt ? $latestAttempt->wpm : 0,
                'best_accuracy' => $latestAttempt ? $latestAttempt->accuracy : 0,
                'last_activity' => $latestAttempt ? $latestAttempt->created_at : null,
            ];
        });

        return view('teacher.batches.show', [
            'batch' => $batch,
            'studentPerformance' => $studentPerformance,
        ]);
    }

    /**
     * Student Detail Page (Teacher View)
     */
    public function studentDetail(User $student)
    {
        $teacher = Auth::user();

        // Check if this student belongs to any of the teacher's batches
        $isAuthorized = Batch::where('teacher_id', $teacher->id)
            ->whereHas('students', function($query) use ($student) {
                $query->where('user_id', $student->id);
            })
            ->exists();

        if (!$isAuthorized) {
            abort(403, 'Unauthorized action.');
        }

        // Get student's exercise attempts
        $recentAttempts = ExerciseAttempt::with('exercise')
            ->where('user_id', $student->id)
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        // Calculate statistics
        $stats = $this->calculateStudentStatistics($student->id);

        // Get feedback for this student
        $feedback = $this->getStudentFeedback($student);

        // Get assignments for this student
        $assignments = $this->getStudentAssignments($student);

        // Get student's badges/achievements
        $badges = $student->certificates()->orderBy('issued_at', 'desc')->get();

        return view('teacher.students.show', [
            'student' => $student,
            'recentAttempts' => $recentAttempts,
            'stats' => $stats,
            'feedback' => $feedback,
            'assignments' => $assignments,
            'badges' => $badges,
        ]);
    }

    /**
     * Calculate student statistics
     */
    protected function calculateStudentStatistics(int $studentId): array
    {
        $attempts = ExerciseAttempt::where('user_id', $studentId)
            ->where('created_at', '>=', now()->subDays(7))
            ->get();

        if ($attempts->isEmpty()) {
            return [
                'best_wpm' => 0,
                'best_accuracy' => 0,
                'average_wpm' => 0,
                'average_accuracy' => 0,
                'total_attempts' => 0,
            ];
        }

        return [
            'best_wpm' => $attempts->max('wpm'),
            'best_accuracy' => $attempts->max('accuracy'),
            'average_wpm' => $attempts->avg('wpm'),
            'average_accuracy' => $attempts->avg('accuracy'),
            'total_attempts' => $attempts->count(),
        ];
    }

    /**
     * Batches Index - Show all batches assigned to teacher
     */
    public function batchesIndex()
    {
        $teacher = Auth::user();

        $batches = Batch::with(['students', 'level'])
            ->where('teacher_id', $teacher->id)
            ->get();

        return view('teacher.batches.index', [
            'batches' => $batches,
        ]);
    }

    /**
     * Store teacher feedback for a student
     */
    public function storeFeedback(Request $request, User $student)
    {
        $teacher = Auth::user();

        // Authorization check
        $isAuthorized = Batch::where('teacher_id', $teacher->id)
            ->whereHas('students', function($query) use ($student) {
                $query->where('user_id', $student->id);
            })
            ->exists();

        if (!$isAuthorized) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'message' => 'required|string|max:1000',
            'feedback_type' => 'nullable|string|max:50',
            'batch_id' => 'required|exists:batches,id',
        ]);

        $feedback = TeacherFeedback::create([
            'teacher_id' => $teacher->id,
            'student_id' => $student->id,
            'batch_id' => $validated['batch_id'],
            'message' => $validated['message'],
            'feedback_type' => $validated['feedback_type'] ?? 'general',
        ]);

        return redirect()->back()
            ->with('success', 'Feedback submitted successfully!');
    }

    /**
     * Store a new assignment
     */
    public function storeAssignment(Request $request)
    {
        $teacher = Auth::user();

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'exercise_id' => 'required|exists:exercises,id',
            'due_date' => 'required|date|after:today',
            'batch_id' => 'nullable|exists:batches,id',
            'student_id' => 'nullable|exists:users,id',
        ]);

        // Authorization check - teacher can only assign to their batches/students
        if ($validated['batch_id']) {
            $batch = Batch::find($validated['batch_id']);
            if ($batch->teacher_id !== $teacher->id) {
                abort(403, 'Unauthorized action.');
            }
        }

        if ($validated['student_id']) {
            $isAuthorized = Batch::where('teacher_id', $teacher->id)
                ->whereHas('students', function($query) use ($validated) {
                    $query->where('user_id', $validated['student_id']);
                })
                ->exists();

            if (!$isAuthorized) {
                abort(403, 'Unauthorized action.');
            }
        }

        $assignment = Assignment::create([
            'teacher_id' => $teacher->id,
            'batch_id' => $validated['batch_id'],
            'student_id' => $validated['student_id'],
            'exercise_id' => $validated['exercise_id'],
            'title' => $validated['title'],
            'description' => $validated['description'],
            'due_date' => $validated['due_date'],
            'status' => 'pending',
        ]);

        return redirect()->back()
            ->with('success', 'Assignment created successfully!');
    }

    /**
     * Get feedback for a student
     */
    protected function getStudentFeedback(User $student): array
    {
        return TeacherFeedback::with('teacher')
            ->where('student_id', $student->id)
            ->orderBy('created_at', 'desc')
            ->get()
            ->toArray();
    }

    /**
     * Get assignments for a student or batch
     */
    protected function getStudentAssignments(User $student, ?Batch $batch = null): array
    {
        $query = Assignment::with(['exercise', 'teacher'])
            ->where('student_id', $student->id);

        if ($batch) {
            $query->orWhere('batch_id', $batch->id);
        }

        return $query->orderBy('due_date', 'asc')
            ->get()
            ->toArray();
    }
}