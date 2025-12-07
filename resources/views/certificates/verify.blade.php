@extends('layouts.base')

@section('content')
    <div class="max-w-4xl mx-auto">
        <!-- Page Header -->
        <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
            <div class="flex items-center gap-4 mb-6">
                <div class="w-12 h-12 bg-gradient-primary rounded-lg flex items-center justify-center text-white font-bold text-xl">
                    AT
                </div>
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Certificate Verification</h1>
                    <p class="text-gray-600 mt-1">Verify the authenticity of ABC Typing certificates</p>
                </div>
            </div>

            @if(isset($certificate) && $certificate)
                <!-- Valid Certificate -->
                <div class="bg-white rounded-2xl shadow-lg p-8 border-2 border-green-200">
                    <div class="flex justify-between items-start mb-6">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                                <span class="text-green-600 text-xl">✓</span>
                            </div>
                            <h2 class="text-2xl font-bold text-green-700">Valid Certificate</h2>
                        </div>
                        <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">
                            Status: Valid
                        </span>
                    </div>

                    <!-- Certificate Details -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div class="space-y-4">
                            <div class="flex items-center gap-3">
                                <div class="w-6 h-6 bg-blue-100 rounded flex items-center justify-center">
                                    <span class="text-blue-600 text-sm font-bold">📜</span>
                                </div>
                                <div>
                                    <div class="text-sm text-gray-500 uppercase tracking-wide">Certificate Title</div>
                                    <div class="font-semibold text-gray-900">{{ $certificate->title }}</div>
                                </div>
                            </div>

                            <div class="flex items-center gap-3">
                                <div class="w-6 h-6 bg-blue-100 rounded flex items-center justify-center">
                                    <span class="text-blue-600 text-sm font-bold">👤</span>
                                </div>
                                <div>
                                    <div class="text-sm text-gray-500 uppercase tracking-wide">User Name</div>
                                    <div class="font-semibold text-gray-900">{{ $certificate->user->name }}</div>
                                </div>
                            </div>

                            <div class="flex items-center gap-3">
                                <div class="w-6 h-6 bg-blue-100 rounded flex items-center justify-center">
                                    <span class="text-blue-600 text-sm font-bold">🎯</span>
                                </div>
                                <div>
                                    <div class="text-sm text-gray-500 uppercase tracking-wide">Level</div>
                                    <div class="font-semibold text-gray-900">{{ $certificate->level->name ?? 'N/A' }}</div>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <div class="flex items-center gap-3">
                                <div class="w-6 h-6 bg-blue-100 rounded flex items-center justify-center">
                                    <span class="text-blue-600 text-sm font-bold">📅</span>
                                </div>
                                <div>
                                    <div class="text-sm text-gray-500 uppercase tracking-wide">Issued Date</div>
                                    <div class="font-semibold text-gray-900">
                                        {{ $certificate->issued_at->format('M d, Y') }}
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center gap-3">
                                <div class="w-6 h-6 bg-blue-100 rounded flex items-center justify-center">
                                    <span class="text-blue-600 text-sm font-bold">🔢</span>
                                </div>
                                <div>
                                    <div class="text-sm text-gray-500 uppercase tracking-wide">Certificate Code</div>
                                    <div class="font-semibold text-gray-900">{{ $certificate->certificate_code }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Performance Stats (if available) -->
                    @if(isset($certificate->meta) && is_array($certificate->meta) && !empty($certificate->meta))
                        <div class="bg-gray-50 rounded-xl p-6 mb-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Performance Statistics</h3>
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                @if(isset($certificate->meta['best_wpm']))
                                    <div class="text-center">
                                        <div class="text-sm text-gray-500 uppercase tracking-wide">Best WPM</div>
                                        <div class="text-2xl font-bold text-blue-600">{{ $certificate->meta['best_wpm'] }}</div>
                                    </div>
                                @endif
                                @if(isset($certificate->meta['best_accuracy']))
                                    <div class="text-center">
                                        <div class="text-sm text-gray-500 uppercase tracking-wide">Best Accuracy</div>
                                        <div class="text-2xl font-bold text-green-600">{{ $certificate->meta['best_accuracy'] }}%</div>
                                    </div>
                                @endif
                                @if(isset($certificate->meta['total_exercises']))
                                    <div class="text-center">
                                        <div class="text-sm text-gray-500 uppercase tracking-wide">Exercises</div>
                                        <div class="text-2xl font-bold text-purple-600">{{ $certificate->meta['total_exercises'] }}</div>
                                    </div>
                                @endif
                                @if(isset($certificate->meta['total_time']))
                                    <div class="text-center">
                                        <div class="text-sm text-gray-500 uppercase tracking-wide">Total Time</div>
                                        <div class="text-2xl font-bold text-orange-600">{{ $certificate->meta['total_time'] }} min</div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif

                    <!-- Certificate Ownership Statement -->
                    <div class="bg-blue-50 border border-blue-200 rounded-xl p-4 text-center">
                        <p class="text-gray-700 font-medium">
                            This certificate belongs to <span class="font-bold text-blue-600">{{ $certificate->user->name }}</span> and is issued by ABC Typing.
                        </p>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex justify-center gap-4 mt-8">
                        <a href="{{ route('home') }}" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200 font-medium">
                            Back to Home
                        </a>
                        @auth
                            @if(Auth::user()->id === $certificate->user_id)
                                <a href="{{ route('certificates.download', $certificate) }}" class="px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors duration-200 font-medium">
                                    Download Certificate
                                </a>
                            @endif
                        @endauth
                    </div>
                </div>
            @else
                <!-- Invalid Certificate -->
                <div class="bg-white rounded-2xl shadow-lg p-8 border-2 border-red-200">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center">
                            <span class="text-red-600 text-2xl">✗</span>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-red-700">Invalid Certificate</h2>
                            <p class="text-gray-600 mt-1">The certificate you're trying to verify could not be found.</p>
                        </div>
                    </div>

                    <div class="bg-red-50 border border-red-200 rounded-xl p-4 mb-6">
                        <p class="text-red-700 font-medium text-center">
                            The certificate code you entered is not valid or does not exist in our system.
                        </p>
                    </div>

                    <div class="text-center">
                        <p class="text-gray-600 mb-4">
                            Please double-check the certificate code and try again.
                        </p>
                        <a href="{{ route('home') }}" class="inline-block px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200 font-medium">
                            Back to Home
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection