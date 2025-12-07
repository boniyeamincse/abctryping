<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Exercise extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'step_id',
        'title',
        'text',
        'time_limit_seconds',
        'difficulty'
    ];

    /**
     * Get the step that owns the exercise.
     */
    public function step(): BelongsTo
    {
        return $this->belongsTo(Step::class);
    }

    /**
     * Get the exercise attempts for the exercise.
     */
    public function exerciseAttempts()
    {
        return $this->hasMany(ExerciseAttempt::class);
    }
}