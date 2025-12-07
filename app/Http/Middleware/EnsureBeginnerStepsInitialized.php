<?php

namespace App\Http\Middleware;

use App\Services\ProgressService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class EnsureBeginnerStepsInitialized
{
    /**
     * Create a new middleware instance.
     */
    public function __construct(protected ProgressService $progressService)
    {
        //
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if ($user) {
            // Check if user has any step progress
            $hasStepProgress = $user->stepProgress()->exists();

            if (!$hasStepProgress) {
                Log::info("User {$user->id} has no step progress, initializing beginner steps");
                $this->progressService->initializeBeginnerSteps($user);
            }
        }

        return $next($request);
    }
}