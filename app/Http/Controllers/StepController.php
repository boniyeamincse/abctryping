<?php

namespace App\Http\Controllers;

use App\Models\Step;
use Illuminate\Http\Request;

class StepController extends Controller
{
    /**
     * Display the specified step.
     */
    public function show(Step $step)
    {
        $step->load(['exercises', 'level']);
        return view('steps.show', compact('step'));
    }
}