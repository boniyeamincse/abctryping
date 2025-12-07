<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\StepProgress;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    /**
     * Display a listing of the levels.
     */
    public function index()
    {
        $levels = Level::orderBy('order')->get();
        return view('levels.index', compact('levels'));
    }

    /**
     * Display the specified level.
     */
    public function show(Level $level)
    {
        $level->load('steps');
        $user = auth()->user();
        $stepProgress = [];

        if ($user) {
            $stepProgress = StepProgress::where('user_id', $user->id)
                ->whereIn('step_id', $level->steps->pluck('id'))
                ->pluck('status', 'step_id')
                ->toArray();
        }

        return view('levels.show', compact('level', 'stepProgress'));
    }
}