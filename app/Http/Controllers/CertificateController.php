<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class CertificateController extends Controller
{
    /**
     * Constructor - no middleware needed here as it's handled in routes
     */
    public function __construct()
    {
        // Middleware is applied in routes/web.php
        // This constructor is kept for future extensibility
    }

    /**
     * List all certificates for the authenticated user
     *
     * @return \Illuminate\View\View
     */
    public function myCertificates()
    {
        $user = Auth::user();

        // Get all certificates for the authenticated user
        $certificates = Certificate::where('user_id', $user->id)
            ->with(['level', 'user'])
            ->orderBy('issued_at', 'desc')
            ->get();

        return view('certificates.my-certificates', [
            'certificates' => $certificates
        ]);
    }

    /**
     * Download a certificate PDF with proper access control
     *
     * @param Certificate $certificate
     * @return \Symfony\Component\HttpFoundation\StreamedResponse|\Illuminate\Http\RedirectResponse
     */
    public function download(Certificate $certificate)
    {
        $user = Auth::user();

        // Check if user owns the certificate or is an admin
        if ($certificate->user_id !== $user->id && $user->role !== 'super_admin') {
            abort(403, 'Unauthorized to download this certificate');
        }

        // Check if PDF exists
        if (empty($certificate->pdf_path) || !Storage::exists($certificate->pdf_path)) {
            abort(404, 'Certificate PDF not found');
        }

        // Download the PDF file
        return Storage::download($certificate->pdf_path, 'certificate_' . $certificate->certificate_code . '.pdf');
    }

    /**
     * Public verification page for certificate codes
     *
     * @param string $certificate_code
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function verify($certificate_code)
    {
        // Find certificate by code
        $certificate = Certificate::where('certificate_code', $certificate_code)
            ->with(['user', 'level'])
            ->first();

        if (!$certificate) {
            return redirect()->route('home')->with('error', 'Certificate not found');
        }

        return view('certificates.verify', [
            'certificate' => $certificate,
            'is_valid' => true
        ]);
    }
}