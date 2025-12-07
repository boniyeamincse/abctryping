@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Result Header -->
    <div class="bg-white rounded-xl shadow-sm p-6 mb-6 text-center">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Your Result</h1>
        <p class="text-lg text-gray-600">{{ $exercise->title }}</p>
    </div>

    <!-- Main Metrics -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        <!-- WPM -->
        <div class="bg-white rounded-xl shadow-sm p-6 text-center">
            <div class="text-4xl font-bold text-blue-600 mb-2">{{ $wpm }}</div>
            <div class="text-sm font-medium text-gray-600 uppercase tracking-wide">Words Per Minute</div>
        </div>

        <!-- Accuracy -->
        <div class="bg-white rounded-xl shadow-sm p-6 text-center">
            <div class="text-4xl font-bold @if($accuracy >= 90) text-green-600 @elseif($accuracy >= 70) text-yellow-600 @else text-red-600 @endif mb-2">
                {{ $accuracy }}%
            </div>
            <div class="text-sm font-medium text-gray-600 uppercase tracking-wide">Accuracy</div>
        </div>

        <!-- Errors -->
        <div class="bg-white rounded-xl shadow-sm p-6 text-center">
            <div class="text-4xl font-bold text-red-600 mb-2">{{ $errors }}</div>
            <div class="text-sm font-medium text-gray-600 uppercase tracking-wide">Errors</div>
        </div>

        <!-- Time Taken -->
        <div class="bg-white rounded-xl shadow-sm p-6 text-center">
            <div class="text-4xl font-bold text-purple-600 mb-2">{{ $duration_seconds }}s</div>
            <div class="text-sm font-medium text-gray-600 uppercase tracking-wide">Time Taken</div>
        </div>
    </div>

    <!-- Motivational Message -->
    <div class="bg-white rounded-xl shadow-sm p-6 mb-8 text-center">
        <p class="text-xl font-medium text-gray-700 italic">"{{ $motivational_message }}"</p>
    </div>

    <!-- Action Buttons -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
        <a href="{{ route('exercises.show', $exercise) }}"
           class="block bg-blue-600 hover:bg-blue-700 text-white font-medium py-4 px-6 rounded-lg transition-colors duration-200 text-center">
            Try Again
        </a>
        <a href="{{ route('steps.show', $exercise->step) }}"
           class="block bg-gray-600 hover:bg-gray-700 text-white font-medium py-4 px-6 rounded-lg transition-colors duration-200 text-center">
            Back to Step
        </a>
    </div>

    <!-- Last 3 Attempts Table -->
    @if(isset($lastAttempts) && $lastAttempts->count() > 0)
    <div class="bg-white rounded-xl shadow-sm p-6">
        <h3 class="text-lg font-semibold text-gray-700 mb-4">Your Last 3 Attempts</h3>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">Date</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">WPM</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">Accuracy</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">Errors</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">Time</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($lastAttempts as $attempt)
                    <tr>
                        <td class="px-4 py-3 text-sm text-gray-600">{{ $attempt->created_at->format('M d, Y H:i') }}</td>
                        <td class="px-4 py-3 text-sm text-gray-600">{{ $attempt->wpm }}</td>
                        <td class="px-4 py-3 text-sm text-gray-600">{{ $attempt->accuracy }}%</td>
                        <td class="px-4 py-3 text-sm text-gray-600">{{ $attempt->errors }}</td>
                        <td class="px-4 py-3 text-sm text-gray-600">{{ $attempt->duration_seconds }}s</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
</div>
@endsection