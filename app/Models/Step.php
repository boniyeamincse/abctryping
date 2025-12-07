<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Step extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'level_id',
        'order',
        'title',
        'description',
        'min_wpm',
        'min_accuracy'
    ];

    /**
     * Get the level that owns the step.
     */
    public function level(): BelongsTo
    {
        return $this->belongsTo(Level::class);
    }

    /**
     * Get the exercises for this step.
     */
    public function exercises(): HasMany
    {
        return $this->hasMany(Exercise::class);
    }

    /**
     * Get the step progress records for this step.
     */
    public function stepProgress(): HasMany
    {
        return $this->hasMany(StepProgress::class);
    }

    /**
     * Get the next step in the same level.
     *
     * @return Step|null
     */
    public function nextStep()
    {
        return Step::where('level_id', $this->level_id)
            ->where('order', $this->order + 1)
            ->first();
    }

    /**
     * Check if this step belongs to a beginner level.
     *
     * @return bool
     */
    public function isBeginnerLevel()
    {
        return $this->level && strtolower($this->level->name) === 'beginner';
    }
}