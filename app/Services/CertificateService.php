<?php

namespace App\Services;

use App\Models\User;
use App\Models\Level;
use App\Models\Certificate;
use App\Models\ExerciseAttempt;
use App\Models\Step;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class CertificateService
{
    /**
     * Generate a certificate for level completion
     *
     * @param User $user
     * @param Level $level
     * @return Certificate
     */
    public function generateForLevel(User $user, Level $level): Certificate
    {
        // Check if user already has certificate for this level
        $existingCertificate = Certificate::where('user_id', $user->id)
            ->where('level_id', $level->id)
            ->first();

        if ($existingCertificate) {
            return $existingCertificate;
        }

        // Get level stats
        $stats = $this->getLevelStats($user, $level);

        // Generate certificate code
        $certificateCode = $this->generateCertificateCode();

        // Create certificate record (pdf_path will be set after PDF generation)
        $certificate = Certificate::create([
            'user_id' => $user->id,
            'level_id' => $level->id,
            'certificate_code' => $certificateCode,
            'title' => 'Certificate of Completion: ' . $level->name,
            'description' => 'This certificate is awarded to ' . $user->name . ' for successfully completing the ' . $level->name . ' level.',
            'issued_at' => now(),
            'pdf_path' => '', // Temporary empty value
            'meta' => [
                'best_wpm' => $stats['best_wpm'],
                'best_accuracy' => $stats['best_accuracy'],
                'completion_date' => now()->toDateString()
            ]
        ]);

        // Generate and save PDF
        try {
            $pdfPath = $this->generatePdf($certificate);
            echo "PDF generated at: " . $pdfPath . "\n";
        } catch (\Exception $e) {
            echo "PDF generation failed: " . $e->getMessage() . "\n";
            // Continue even if PDF generation fails
        }

        return $certificate;
    }

    /**
     * Returns existing certificate or generates new one for level
     *
     * @param User $user
     * @param Level $level
     * @return Certificate
     */
    public function getOrCreateForLevel(User $user, Level $level): Certificate
    {
        return $this->generateForLevel($user, $level);
    }

    /**
     * Creates unique 12-character random code
     *
     * @return string
     */
    public function generateCertificateCode(): string
    {
        do {
            $code = Str::upper(Str::random(12));
            $exists = Certificate::where('certificate_code', $code)->exists();
        } while ($exists);

        return $code;
    }

    /**
     * Renders Blade template to PDF using DOMPDF
     *
     * @param Certificate $certificate
     * @return string PDF file path
     */
    public function generatePdf(Certificate $certificate): string
    {
        $user = $certificate->user;
        $level = $certificate->level;
        $stats = $certificate->meta;

        $pdf = Pdf::loadView('certificates.template', [
            'certificate' => $certificate,
            'user' => $user,
            'level' => $level,
            'stats' => $stats,
            'issued_at' => $certificate->issued_at->format('F j, Y'),
            'certificate_code' => $certificate->certificate_code
        ]);

        // Generate filename
        $filename = 'certificates/' . $certificate->certificate_code . '.pdf';

        // Save PDF to storage
        Storage::put($filename, $pdf->output());

        // Update certificate with PDF path
        $certificate->pdf_path = $filename;
        $certificate->save();

        return $filename;
    }

    /**
     * Gets best WPM and accuracy stats for the level
     *
     * @param User $user
     * @param Level $level
     * @return array
     */
    public function getLevelStats(User $user, Level $level): array
    {
        // Get all steps in this level
        $steps = $level->steps()->with('exercises')->get();

        $bestWpm = 0;
        $bestAccuracy = 0;
        $totalAttempts = 0;

        foreach ($steps as $step) {
            // Get exercise attempts for this step
            $attempts = ExerciseAttempt::whereHas('exercise', function($query) use ($step) {
                    $query->where('step_id', $step->id);
                })
                ->where('user_id', $user->id)
                ->get();

            foreach ($attempts as $attempt) {
                $totalAttempts++;

                if ($attempt->wpm > $bestWpm) {
                    $bestWpm = $attempt->wpm;
                }

                if ($attempt->accuracy > $bestAccuracy) {
                    $bestAccuracy = $attempt->accuracy;
                }
            }
        }

        return [
            'best_wpm' => $bestWpm,
            'best_accuracy' => $bestAccuracy,
            'total_attempts' => $totalAttempts
        ];
    }
}