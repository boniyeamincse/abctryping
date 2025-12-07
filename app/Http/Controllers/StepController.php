<?php

namespace App\Http\Controllers;

use App\Models\Step;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StepController extends Controller
{
    /**
     * Display the specified step.
     */
    public function show(Step $step)
    {
        $step->load(['exercises', 'level']);

        // Get the logged-in user's progress for this step
        $user = Auth::user();
        $stepProgress = null;

        if ($user) {
            $stepProgress = $user->stepProgressForStep($step);
        }

        return view('steps.show', compact('step', 'stepProgress'));
    }
}