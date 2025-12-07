<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('teacher_feedback', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id')->constrained('users');
            $table->foreignId('student_id')->constrained('users');
            $table->foreignId('batch_id')->constrained('batches');
            $table->text('message');
            $table->string('feedback_type')->default('general');
            $table->boolean('is_read')->default(false);
            $table->timestamps();

            $table->index(['teacher_id', 'student_id']);
            $table->index(['batch_id', 'student_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher_feedback');
    }
};