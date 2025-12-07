<?php

namespace App\Policies;

use App\Models\Batch;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BatchPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the batch.
     */
    public function view(User $user, Batch $batch): bool
    {
        return $user->id === $batch->teacher_id;
    }

    /**
     * Determine whether the user can update the batch.
     */
    public function update(User $user, Batch $batch): bool
    {
        return $user->id === $batch->teacher_id;
    }

    /**
     * Determine whether the user can delete the batch.
     */
    public function delete(User $user, Batch $batch): bool
    {
        return $user->id === $batch->teacher_id;
    }
}