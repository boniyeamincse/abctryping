<?php

namespace App\Listeners;

use App\Events\Registered;
use App\Services\ProgressService;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class InitializeBeginnerSteps implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Create the event listener.
     */
    public function __construct(protected ProgressService $progressService)
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Registered $event): void
    {
        try {
            $user = $event->user;
            Log::info("Initializing beginner steps for user: {$user->id}");

            $this->progressService->initializeBeginnerSteps($user);

            Log::info("Successfully initialized beginner steps for user: {$user->id}");
        } catch (\Exception $e) {
            Log::error("Failed to initialize beginner steps for user: {$event->user->id}. Error: " . $e->getMessage());
            // Don't throw to avoid breaking the registration flow
        }
    }
}