<?php

namespace App\Http\Controllers;

use App\Models\Level;
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
        return view('levels.show', compact('level'));
    }
}