<?php

namespace Tests\Unit;

use App\Models\User;
use App\Models\Level;
use App\Models\Step;
use App\Models\StepProgress;
use App\Models\Exercise;
use App\Models\ExerciseAttempt;
use App\Services\ProgressService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProgressServiceTest extends TestCase
{
    use RefreshDatabase;

    protected $progressService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->progressService = new ProgressService();

        // Create test data
        $this->beginnerLevel = Level::create([
            'name' => 'Beginner',
            'slug' => 'beginner',
            'order' => 1,
            'description' => 'Beginner level',
            'is_free' => true
        ]);

        // Create steps for beginner level
        $this->step1 = Step::create([
            'level_id' => $this->beginnerLevel->id,
            'order' => 1,
            'title' => 'Step 1',
            'description' => 'First step',
            'min_wpm' => 20,
            'min_accuracy' => 90
        ]);

        $this->step2 = Step::create([
            'level_id' => $this->beginnerLevel->id,
            'order' => 2,
            'title' => 'Step 2',
            'description' => 'Second step',
            'min_wpm' => 25,
            'min_accuracy' => 92
        ]);

        $this->step3 = Step::create([
            'level_id' => $this->beginnerLevel->id,
            'order' => 3,
            'title' => 'Step 3',
            'description' => 'Third step',
            'min_wpm' => 30,
            'min_accuracy' => 95
        ]);

        $this->user = User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password')
        ]);
    }

    public function testInitializeBeginnerSteps()
    {
        $progresses = $this->progressService->initializeBeginnerSteps($this->user);

        $this->assertCount(3, $progresses);

        // First step should be in_progress
        $step1Progress = $progresses->where('step_id', $this->step1->id)->first();
        $this->assertEquals('in_progress', $step1Progress->status);

        // Other steps should be locked
        $step2Progress = $progresses->where('step_id', $this->step2->id)->first();
        $this->assertEquals('locked', $step2Progress->status);

        $step3Progress = $progresses->where('step_id', $this->step3->id)->first();
        $this->assertEquals('locked', $step3Progress->status);
    }

    public function testUpdateProgressAfterAttempt()
    {
        // Initialize beginner steps first
        $this->progressService->initializeBeginnerSteps($this->user);

        // Create exercise for step 1
        $exercise = Exercise::create([
            'step_id' => $this->step1->id,
            'title' => 'Test Exercise',
            'text' => 'This is a test exercise text.',
            'time_limit_seconds' => 60,
            'difficulty' => 'easy'
        ]);

        // Create a successful attempt
        $attempt = ExerciseAttempt::create([
            'user_id' => $this->user->id,
            'exercise_id' => $exercise->id,
            'wpm' => 25,
            'accuracy' => 95,
            'errors' => 2,
            'duration_seconds' => 45,
            'typed_text' => 'This is a test exercise text.'
        ]);

        // Update progress
        $stepProgress = $this->progressService->updateProgressAfterAttempt($this->user, $attempt);

        $this->assertEquals(1, $stepProgress->attempt_count);
        $this->assertEquals(25, $stepProgress->best_wpm);
        $this->assertEquals(95, $stepProgress->best_accuracy);
        $this->assertEquals('completed', $stepProgress->status);

        // Check that step 2 is now unlocked
        $step2Progress = StepProgress::where('user_id', $this->user->id)
            ->where('step_id', $this->step2->id)
            ->first();

        $this->assertEquals('in_progress', $step2Progress->status);
    }

    public function testMarkStepAsCompleted()
    {
        // Create step progress
        $stepProgress = StepProgress::create([
            'user_id' => $this->user->id,
            'step_id' => $this->step1->id,
            'status' => 'in_progress',
            'attempt_count' => 1,
            'best_wpm' => 25,
            'best_accuracy' => 95
        ]);

        // Mark as completed
        $result = $this->progressService->markStepAsCompleted($stepProgress);

        $this->assertEquals('completed', $result->status);

        // Check that next step is unlocked
        $step2Progress = StepProgress::where('user_id', $this->user->id)
            ->where('step_id', $this->step2->id)
            ->first();

        $this->assertNotNull($step2Progress);
        $this->assertEquals('in_progress', $step2Progress->status);
    }

    public function testUnlockNextStep()
    {
        // Unlock step 2 (next step after step 1)
        $step2Progress = $this->progressService->unlockNextStep($this->user, $this->step1);

        $this->assertNotNull($step2Progress);
        $this->assertEquals('in_progress', $step2Progress->status);
        $this->assertEquals($this->step2->id, $step2Progress->step_id);

        // Try to unlock next step after step 3 (should return null)
        $result = $this->progressService->unlockNextStep($this->user, $this->step3);
        $this->assertNull($result);
    }
}