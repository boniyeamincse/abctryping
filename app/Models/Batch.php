<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Batch extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'teacher_id',
        'institution_id',
        'level_id',
        'start_date',
        'end_date',
        'status'
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'start_date' => 'datetime',
            'end_date' => 'datetime',
        ];
    }

    /**
     * Get the teacher that owns the batch.
     */
    public function teacher(): BelongsTo
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    /**
     * Get the level that this batch belongs to.
     */
    public function level(): BelongsTo
    {
        return $this->belongsTo(Level::class);
    }

    /**
     * Get the institution that this batch belongs to.
     */
    public function institution(): BelongsTo
    {
        return $this->belongsTo(Institution::class);
    }

    /**
     * Get the students in this batch.
     */
    public function students(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'batch_user')
            ->withPivot('joined_at', 'status')
            ->withTimestamps();
    }

    /**
     * Get the exercise attempts for students in this batch.
     */
    public function exerciseAttempts()
    {
        return $this->hasManyThrough(
            ExerciseAttempt::class,
            User::class,
            'id', // Foreign key on users table
            'user_id', // Foreign key on exercise_attempts table
            'id', // Local key on batches table
            'id' // Local key on users table
        );
    }

    /**
     * Get the average WPM for this batch (last 7 days).
     */
    public function getAverageWpmAttribute(): float
    {
        return $this->exerciseAttempts()
            ->where('created_at', '>=', now()->subDays(7))
            ->avg('wpm') ?? 0;
    }

    /**
     * Get the average accuracy for this batch (last 7 days).
     */
    public function getAverageAccuracyAttribute(): float
    {
        return $this->exerciseAttempts()
            ->where('created_at', '>=', now()->subDays(7))
            ->avg('accuracy') ?? 0;
    }

    /**
     * Get the total number of active students in this batch.
     */
    public function getActiveStudentsCountAttribute(): int
    {
        return $this->students()
            ->wherePivot('status', 'active')
            ->count();
    }
}