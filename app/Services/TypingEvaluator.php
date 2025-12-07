<?php

namespace App\Services;

class TypingEvaluator
{
    /**
     * Calculate Words Per Minute (WPM)
     *
     * Formula: WPM = (total_characters / 5) / (duration_seconds / 60)
     * total_characters = length of typed text
     *
     * @param string $typedText The text typed by the user
     * @param int $durationSeconds The duration in seconds
     * @return int Words per minute (rounded to nearest integer, minimum 0)
     */
    public function calculateWPM(string $typedText, int $durationSeconds): int
    {
        if ($durationSeconds <= 0) {
            return 0;
        }

        $totalCharacters = strlen($typedText);
        $wpm = ($totalCharacters / 5) / ($durationSeconds / 60);

        return max(0, round($wpm));
    }

    /**
     * Calculate typing accuracy
     *
     * Compare character by character at same positions
     * accuracy = (correct_chars / total_chars) * 100
     * total_chars = max(length of original, length of typed)
     *
     * @param string $originalText The original text to compare against
     * @param string $typedText The text typed by the user
     * @return int Accuracy percentage (0-100)
     */
    public function calculateAccuracy(string $originalText, string $typedText): int
    {
        $originalLength = strlen($originalText);
        $typedLength = strlen($typedText);
        $totalChars = max($originalLength, $typedLength);

        if ($totalChars === 0) {
            return 100;
        }

        $correctChars = 0;
        for ($i = 0; $i < $totalChars; $i++) {
            if (isset($originalText[$i]) && isset($typedText[$i]) && $originalText[$i] === $typedText[$i]) {
                $correctChars++;
            }
        }

        $accuracy = ($correctChars / $totalChars) * 100;
        return max(0, min(100, round($accuracy)));
    }

    /**
     * Calculate typing errors
     *
     * errors = total_chars - correct_chars
     *
     * @param string $originalText The original text to compare against
     * @param string $typedText The text typed by the user
     * @return int Number of errors (minimum 0)
     */
    public function calculateErrors(string $originalText, string $typedText): int
    {
        $originalLength = strlen($originalText);
        $typedLength = strlen($typedText);
        $totalChars = max($originalLength, $typedLength);

        $correctChars = 0;
        for ($i = 0; $i < $totalChars; $i++) {
            if (isset($originalText[$i]) && isset($typedText[$i]) && $originalText[$i] === $typedText[$i]) {
                $correctChars++;
            }
        }

        return max(0, $totalChars - $correctChars);
    }

    /**
     * Evaluate typing performance
     *
     * Convenience method that returns all metrics in one call
     *
     * @param string $originalText The original text to compare against
     * @param string $typedText The text typed by the user
     * @param int $durationSeconds The duration in seconds
     * @return array Associative array with wpm, accuracy, and errors
     */
    public function evaluateTyping(string $originalText, string $typedText, int $durationSeconds): array
    {
        return [
            'wpm' => $this->calculateWPM($typedText, $durationSeconds),
            'accuracy' => $this->calculateAccuracy($originalText, $typedText),
            'errors' => $this->calculateErrors($originalText, $typedText)
        ];
    }
}