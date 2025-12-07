@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Exercise Header -->
    <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-2">{{ $exercise->title }}</h1>

        <!-- Level/Step Info -->
        <div class="flex flex-wrap gap-4 mb-4 text-sm text-gray-600">
            <div class="flex items-center gap-2">
                <span class="font-medium">Level:</span>
                <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full">{{ $exercise->step->level->title ?? 'N/A' }}</span>
            </div>
            <div class="flex items-center gap-2">
                <span class="font-medium">Step:</span>
                <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full">{{ $exercise->step->title ?? 'N/A' }}</span>
            </div>
            <div class="flex items-center gap-2">
                <span class="font-medium">Time Limit:</span>
                <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full">{{ $exercise->time_limit_seconds }} seconds</span>
            </div>
        </div>
    </div>

    <!-- Exercise Content -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Original Text -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Original Text</h2>
            <div class="border-2 border-gray-200 rounded-lg p-4 min-h-[200px] bg-gray-50">
                <p class="text-gray-700 whitespace-pre-wrap">{{ $exercise->text }}</p>
            </div>
        </div>

        <!-- Typing Area -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Type Here</h2>

            <!-- Timer Display -->
            <div class="mb-4">
                <div id="timer" class="text-2xl font-bold text-center py-3 bg-gray-100 rounded-lg">
                    {{ $exercise->time_limit_seconds }}:00
                </div>
            </div>

            <!-- Typing Input -->
            <form id="typingForm" method="POST" action="{{ route('exercises.attempt', $exercise) }}" class="space-y-4">
                @csrf
                <textarea
                    name="typed_text"
                    id="typed_text"
                    rows="8"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 resize-none"
                    placeholder="Start typing the text above..."
                    autofocus
                ></textarea>

                <!-- Hidden field for duration -->
                <input type="hidden" name="duration_seconds" id="duration_seconds" value="0">

                <!-- Submit Button -->
                <button
                    type="submit"
                    id="submitBtn"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-4 rounded-lg transition-colors duration-200 disabled:bg-gray-400 disabled:cursor-not-allowed"
                    disabled
                >
                    Submit Typing Test
                </button>
            </form>
        </div>
    </div>

    <!-- Last Attempts (if available) -->
    @if($lastAttempts->count() > 0)
    <div class="mt-8 bg-white rounded-xl shadow-sm p-6">
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

<!-- JavaScript for Timer and Form Handling -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const timerElement = document.getElementById('timer');
    const submitBtn = document.getElementById('submitBtn');
    const durationInput = document.getElementById('duration_seconds');
    const typedText = document.getElementById('typed_text');

    let timeLeft = {{ $exercise->time_limit_seconds }};
    let timerInterval;
    let startTime;

    // Start timer when user starts typing
    typedText.addEventListener('keydown', function(e) {
        if (!timerInterval) {
            startTimer();
        }
    });

    function startTimer() {
        startTime = new Date();
        timerInterval = setInterval(function() {
            timeLeft--;
            updateTimerDisplay();

            if (timeLeft <= 0) {
                clearInterval(timerInterval);
                submitForm();
            }
        }, 1000);

        // Enable submit button
        submitBtn.disabled = false;
    }

    function updateTimerDisplay() {
        const minutes = Math.floor(timeLeft / 60);
        const seconds = timeLeft % 60;
        timerElement.textContent = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
    }

    function submitForm() {
        // Calculate actual duration
        const endTime = new Date();
        const duration = Math.floor((endTime - startTime) / 1000);
        durationInput.value = duration;

        // Submit the form
        document.getElementById('typingForm').submit();
    }

    // Handle form submission
    document.getElementById('typingForm').addEventListener('submit', function(e) {
        if (timerInterval) {
            clearInterval(timerInterval);
            const endTime = new Date();
            const duration = Math.floor((endTime - startTime) / 1000);
            durationInput.value = duration;
        }
    });
});
</script>
@endsection