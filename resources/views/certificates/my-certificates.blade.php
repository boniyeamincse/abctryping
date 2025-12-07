@extends('layouts.app')

@section('content')
    <div class="space-y-8">
        <!-- Page Header -->
        <div class="bg-white rounded-2xl shadow-lg p-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">My Certificates</h1>
            <p class="text-gray-600">View and manage all your earned certificates and achievements.</p>
        </div>

        <!-- Certificates Table -->
        <div class="bg-white rounded-2xl shadow-lg p-6">
            <div class="overflow-x-auto">
                @if($certificates->isEmpty())
                    <div class="text-center py-12">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl">📜</span>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">No Certificates Yet</h3>
                        <p class="text-gray-600">You haven't earned any certificates yet. Keep practicing and completing levels to earn your first certificate!</p>
                    </div>
                @else
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-3 text-left text-sm font-medium text-gray-500">Certificate Title</th>
                                <th class="px-4 py-3 text-left text-sm font-medium text-gray-500">Level</th>
                                <th class="px-4 py-3 text-left text-sm font-medium text-gray-500">Issued Date</th>
                                <th class="px-4 py-3 text-left text-sm font-medium text-gray-500">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($certificates as $certificate)
                                <tr>
                                    <td class="px-4 py-4 text-sm text-gray-900 font-medium">
                                        {{ $certificate->title }}
                                    </td>
                                    <td class="px-4 py-4 text-sm text-gray-600">
                                        {{ $certificate->level->name ?? 'N/A' }}
                                    </td>
                                    <td class="px-4 py-4 text-sm text-gray-600">
                                        {{ $certificate->issued_at->format('M d, Y') }}
                                    </td>
                                    <td class="px-4 py-4 text-sm">
                                        <div class="flex items-center gap-3">
                                            <a href="{{ route('certificates.verify', $certificate->certificate_code) }}"
                                               class="text-blue-600 hover:text-blue-800 font-medium transition-colors duration-200">
                                                View / Verify
                                            </a>
                                            <span class="text-gray-300">|</span>
                                            <a href="{{ route('certificates.download', $certificate) }}"
                                               class="text-green-600 hover:text-green-800 font-medium transition-colors duration-200">
                                                Download PDF
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection