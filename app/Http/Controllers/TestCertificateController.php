<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Level;
use App\Services\CertificateService;
use Illuminate\Http\Request;

class TestCertificateController extends Controller
{
    public function testCertificate(CertificateService $certificateService)
    {
        // Get a user and level for testing
        $user = User::first();
        $level = Level::first();

        if (!$user || !$level) {
            return response()->json([
                'error' => 'No user or level found for testing'
            ], 404);
        }

        try {
            // Test the certificate generation
            $certificate = $certificateService->generateForLevel($user, $level);

            return response()->json([
                'success' => true,
                'message' => 'Certificate generated successfully',
                'certificate' => [
                    'id' => $certificate->id,
                    'user_id' => $certificate->user_id,
                    'level_id' => $certificate->level_id,
                    'certificate_code' => $certificate->certificate_code,
                    'title' => $certificate->title,
                    'pdf_path' => $certificate->pdf_path,
                    'issued_at' => $certificate->issued_at,
                    'meta' => $certificate->meta
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ], 500);
        }
    }

    /**
     * Test view for valid certificate
     */
    public function testValidCertificate()
    {
        // Create a mock certificate with user and level
        $certificate = (object)[
            'id' => 1,
            'certificate_code' => 'ABC123456789',
            'title' => 'Advanced Typing Certificate',
            'issued_at' => now(),
            'meta' => [
                'best_wpm' => 85,
                'best_accuracy' => 97,
                'total_exercises' => 25,
                'total_time' => 120
            ],
            'user' => (object)[
                'name' => 'John Doe'
            ],
            'level' => (object)[
                'name' => 'Advanced'
            ]
        ];

        return view('certificates.verify', [
            'certificate' => $certificate,
            'is_valid' => true
        ]);
    }

    /**
     * Test view for invalid certificate
     */
    public function testInvalidCertificate()
    {
        return view('certificates.verify', [
            'certificate' => null,
            'is_valid' => false
        ]);
    }
}