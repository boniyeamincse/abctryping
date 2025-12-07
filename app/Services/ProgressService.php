<?php

namespace App\Services;

use App\Models\User;
use App\Models\Step;
use App\Models\StepProgress;
use App\Models\ExerciseAttempt;
use App\Models\Level;
use App\Services\CertificateService;
use Illuminate\Support\Facades\DB;

class ProgressService
{
    /**
     * Initialize beginner steps for a user.
     *
     * @param User $user
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function initializeBeginnerSteps(User $user)
    {
        // Find all steps in the Beginner level (level_id = 1 or name = 'Beginner')
        $beginnerLevel = Level::where(function($query) {
            $query->where('id', 1)
                  ->orWhere('name', 'Beginner');
        })->first();

        if (!$beginnerLevel) {
            return collect();
        }

        $beginnerSteps = $beginnerLevel->steps()->orderBy('order')->get();

        $createdProgresses = collect();

        DB::transaction(function () use ($user, $beginnerSteps, &$createdProgresses) {
            foreach ($beginnerSteps as $step) {
                $status = $step->order === 1 ? 'in_progress' : 'locked';

                $stepProgress = StepProgress::updateOrCreate(
                    ['user_id' => $user->id, 'step_id' => $step->id],
                    ['status' => $status]
                );

                $createdProgresses->push($stepProgress);
            }
        });

        return $createdProgresses;
    }

    /**
     * Update progress after an exercise attempt.
     *
     * @param User $user
     * @param ExerciseAttempt $attempt
     * @return StepProgress
     */
    public function updateProgressAfterAttempt(User $user, ExerciseAttempt $attempt, ?CertificateService $certificateService = null)
    {
        $step = $attempt->exercise->step;

        return DB::transaction(function () use ($user, $attempt, $step, $certificateService) {
            // Find or create step progress
            $stepProgress = StepProgress::firstOrCreate(
                ['user_id' => $user->id, 'step_id' => $step->id],
                ['status' => 'in_progress']
            );

            // Update attempt statistics
            $stepProgress->attempt_count = ($stepProgress->attempt_count ?? 0) + 1;
            $stepProgress->last_attempt_at = now();

            // Update best WPM and accuracy if this attempt is better
            if ($attempt->wpm > ($stepProgress->best_wpm ?? 0)) {
                $stepProgress->best_wpm = $attempt->wpm;
            }

            if ($attempt->accuracy > ($stepProgress->best_accuracy ?? 0)) {
                $stepProgress->best_accuracy = $attempt->accuracy;
            }

            $stepProgress->save();

            // Check if step should be marked as completed
            $minWpm = $step->min_wpm ?? 0;
            $minAccuracy = $step->min_accuracy ?? 0;

            if ($attempt->wpm >= $minWpm && $attempt->accuracy >= $minAccuracy) {
                $this->markStepAsCompleted($stepProgress, $certificateService);
            }

            return $stepProgress;
        });
    }

    /**
     * Mark a step as completed and unlock the next step.
     *
     * @param StepProgress $stepProgress
     * @return StepProgress
     */
    public function markStepAsCompleted(StepProgress $stepProgress, ?CertificateService $certificateService = null)
    {
        return DB::transaction(function () use ($stepProgress, $certificateService) {
            // Mark current step as completed
            $stepProgress->status = 'completed';
            $stepProgress->save();

            // Unlock the next step if it exists
            $nextStep = $stepProgress->step->nextStep();
            if ($nextStep) {
                $this->unlockNextStep($stepProgress->user, $stepProgress->step);
            }

            // Check if certificate should be generated after this step completion
            if ($certificateService) {
                $this->checkAndGenerateCertificate($stepProgress, $certificateService);
            }

            return $stepProgress;
        });
    }

    /**
     * Unlock the next step in the same level.
     *
     * @param User $user
     * @param Step $currentStep
     * @return StepProgress|null
     */
    public function unlockNextStep(User $user, Step $currentStep)
    {
        $nextStep = $currentStep->nextStep();

        if (!$nextStep) {
            return null;
        }

        return DB::transaction(function () use ($user, $nextStep) {
            $nextStepProgress = StepProgress::firstOrCreate(
                ['user_id' => $user->id, 'step_id' => $nextStep->id],
                ['status' => 'in_progress']
            );

            // If the step was locked, update it to in_progress
            if ($nextStepProgress->status === 'locked') {
                $nextStepProgress->status = 'in_progress';
                $nextStepProgress->save();
            }

            return $nextStepProgress;
        });
    }

    /**
     * Check if all steps in a level are completed for a user.
     *
     * @param User $user
     * @param Level $level
     * @return bool
     */
    public function isLevelCompleted(User $user, Level $level): bool
    {
        // Get all steps in the level
        $steps = $level->steps()->get();

        if ($steps->isEmpty()) {
            return false;
        }

        // Check if all steps have completed status
        $completedStepsCount = StepProgress::where('user_id', $user->id)
            ->whereIn('step_id', $steps->pluck('id'))
            ->where('status', 'completed')
            ->count();

        return $completedStepsCount === $steps->count();
    }

    /**
     * Check if level completion should trigger certificate generation.
     * This method is called after a step is marked as completed.
     *
     * @param StepProgress $stepProgress
     * @param CertificateService $certificateService
     * @return void
     */
    public function checkAndGenerateCertificate(StepProgress $stepProgress, CertificateService $certificateService): void
    {
        $user = $stepProgress->user;
        $level = $stepProgress->step->level;

        // Check if all steps in this level are completed
        if ($this->isLevelCompleted($user, $level)) {
            // Generate certificate for the completed level
            $certificateService->generateForLevel($user, $level);
        }
}
}