<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Step;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'institution_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the institution that the user belongs to.
     */
    public function institution(): BelongsTo
    {
        return $this->belongsTo(Institution::class);
    }

    /**
     * Get the batches that the user is assigned to (for students).
     */
    public function batches(): BelongsToMany
    {
        return $this->belongsToMany(Batch::class, 'batch_user')
            ->withPivot('joined_at', 'status')
            ->withTimestamps();
    }

    /**
     * Get the batches that the user teaches (for teachers).
     */
    public function teachingBatches()
    {
        return $this->hasMany(Batch::class, 'teacher_id');
    }

    /**
     * Get the exercise attempts for the user.
     */
    public function exerciseAttempts()
    {
        return $this->hasMany(ExerciseAttempt::class);
    }

    /**
     * Get the certificates for the user.
     */
    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }

    /**
     * Get the step progress records for the user.
     */
    public function stepProgress()
    {
        return $this->hasMany(StepProgress::class);
    }

    /**
     * Get the step progress for a specific step.
     *
     * @param Step $step
     * @return StepProgress|null
     */
    public function stepProgressForStep(Step $step)
    {
        return $this->stepProgress()->where('step_id', $step->id)->first();
    }

    /**
     * Check if the user is a teacher.
     */
    public function isTeacher(): bool
    {
        return $this->role === 'teacher';
    }

    /**
     * Check if the user is a student in a specific batch.
     */
    public function isStudentInBatch(Batch $batch): bool
    {
        return $this->batches()->where('batch_id', $batch->id)->exists();
    }
}
