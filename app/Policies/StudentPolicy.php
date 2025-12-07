<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StudentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the teacher can view the student.
     */
    public function view(User $teacher, User $student): bool
    {
        // Teacher can view students in their batches
        return $teacher->teachingBatches()
            ->whereHas('students', function($query) use ($student) {
                $query->where('user_id', $student->id);
            })
            ->exists();
    }

    /**
     * Determine whether the teacher can leave feedback for the student.
     */
    public function giveFeedback(User $teacher, User $student): bool
    {
        return $this->view($teacher, $student);
    }

    /**
     * Determine whether the teacher can assign work to the student.
     */
    public function assignWork(User $teacher, User $student): bool
    {
        return $this->view($teacher, $student);
    }
}