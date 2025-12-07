<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StepProgress extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'step_id',
        'status',
        'best_wpm',
        'best_accuracy',
        'attempt_count',
        'last_attempt_at'
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'last_attempt_at' => 'datetime',
        ];
    }

    /**
     * Get the user that owns the step progress.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the step that this progress belongs to.
     */
    public function step(): BelongsTo
    {
        return $this->belongsTo(Step::class);
    }

    /**
     * Boot the model and set up event listeners.
     */
    protected static function boot(): void
    {
        parent::boot();

        // Validate status field on creating/updating
        static::saving(function ($model) {
            $allowedStatuses = ['locked', 'in_progress', 'completed'];
            if (!in_array($model->status, $allowedStatuses)) {
                throw new \InvalidArgumentException("Status must be one of: " . implode(', ', $allowedStatuses));
            }
        });
    }
}