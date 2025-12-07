<?php

namespace Database\Seeders;

use App\Models\Level;
use App\Models\Step;
use App\Models\Exercise;
use Illuminate\Database\Seeder;

class LearningModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 4 levels
        $beginner = Level::create([
            'name' => 'Beginner',
            'slug' => 'beginner',
            'order' => 1,
            'description' => 'Start your typing journey with basic finger placement and home row keys.',
            'is_free' => true
        ]);

        Level::create([
            'name' => 'Intermediate',
            'slug' => 'intermediate',
            'order' => 2,
            'description' => 'Build speed and accuracy with more complex word patterns.',
            'is_free' => false
        ]);

        Level::create([
            'name' => 'Advanced',
            'slug' => 'advanced',
            'order' => 3,
            'description' => 'Master advanced typing techniques and complex text patterns.',
            'is_free' => false
        ]);

        Level::create([
            'name' => 'Expert',
            'slug' => 'expert',
            'order' => 4,
            'description' => 'Achieve professional typing speed and accuracy with challenging exercises.',
            'is_free' => false
        ]);

        // Create 10 steps for Beginner level
        $beginnerSteps = [
            [
                'title' => 'Home Row – Left Hand',
                'description' => 'Learn the left hand home row keys: ASDF',
                'order' => 1
            ],
            [
                'title' => 'Home Row – Right Hand',
                'description' => 'Learn the right hand home row keys: JKL;',
                'order' => 2
            ],
            [
                'title' => 'Home Row – Combined',
                'description' => 'Practice both hands together on the home row',
                'order' => 3
            ],
            [
                'title' => 'Top Row Basics',
                'description' => 'Learn the top row keys: QWERTYUIOP',
                'order' => 4
            ],
            [
                'title' => 'Bottom Row Basics',
                'description' => 'Learn the bottom row keys: ZXCVBNM',
                'order' => 5
            ],
            [
                'title' => 'Numbers and Symbols',
                'description' => 'Practice typing numbers and common symbols',
                'order' => 6
            ],
            [
                'title' => 'Capital Letters',
                'description' => 'Learn to type capital letters using shift key',
                'order' => 7
            ],
            [
                'title' => 'Common Words Practice',
                'description' => 'Type common English words to build muscle memory',
                'order' => 8
            ],
            [
                'title' => 'Sentence Structure',
                'description' => 'Practice typing complete sentences with proper punctuation',
                'order' => 9
            ],
            [
                'title' => 'Speed Building',
                'description' => 'Build typing speed with longer text passages',
                'order' => 10
            ]
        ];

        foreach ($beginnerSteps as $stepData) {
            $step = Step::create([
                'level_id' => $beginner->id,
                'title' => $stepData['title'],
                'description' => $stepData['description'],
                'order' => $stepData['order'],
                'min_wpm' => 20,
                'min_accuracy' => 85
            ]);

            // Create at least 1 exercise for each step
            Exercise::create([
                'step_id' => $step->id,
                'title' => 'Exercise 1: ' . $stepData['title'],
                'text' => $this->generateExerciseText($stepData['title']),
                'time_limit_seconds' => 60,
                'difficulty' => 'easy'
            ]);
        }
    }

    /**
     * Generate exercise text based on step title
     */
    private function generateExerciseText(string $stepTitle): string
    {
        $texts = [
            'Home Row – Left Hand' => 'asdf asdf asdf as dfsa sadf asdf asdf asdf asdf asdf asdf asdf asdf asdf asdf',
            'Home Row – Right Hand' => 'jkl; jkl; jkl; jkl; jkl; jkl; jkl; jkl; jkl; jkl; jkl; jkl;',
            'Home Row – Combined' => 'asdf jkl; asdf jkl; asdf jkl; asdf jkl; asdf jkl; asdf jkl;',
            'Top Row Basics' => 'qwerty qwerty qwerty qwerty qwerty qwerty qwerty qwerty',
            'Bottom Row Basics' => 'zxcvb zxcvb zxcvb zxcvb zxcvb zxcvb zxcvb zxcvb',
            'Numbers and Symbols' => '12345 67890 12345 67890 12345 67890 12345 67890',
            'Capital Letters' => 'ASDF JKL; ASDF JKL; ASDF JKL; ASDF JKL; ASDF JKL;',
            'Common Words Practice' => 'the quick brown fox jumps over the lazy dog the quick brown fox jumps',
            'Sentence Structure' => 'This is a simple sentence. Another sentence follows. Practice makes perfect.',
            'Speed Building' => 'The quick brown fox jumps over the lazy dog repeatedly for speed practice and accuracy improvement.'
        ];

        return $texts[$stepTitle] ?? 'Sample exercise text for typing practice and skill development.';
    }
}