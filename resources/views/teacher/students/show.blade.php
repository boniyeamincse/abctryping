@extends('layouts.app')

@section('content')
    <div class="space-y-8">
        <!-- Student Header -->
        <div class="bg-white rounded-2xl shadow-lg p-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $student->name }}</h1>
                    <div class="flex items-center gap-4">
                        <span class="text-sm bg-blue-100 text-blue-800 px-3 py-1 rounded-full">{{ $student->email }}</span>
                        <span class="text-sm bg-green-100 text-green-800 px-3 py-1 rounded-full">{{ ucfirst($student->role) }}</span>
                    </div>
                </div>
                <a href="{{ route('teacher.dashboard') }}" class="flex items-center gap-2 px-4 py-2 border border-gray-300 rounded-lg font-medium text-gray-700 hover:bg-gray-50 transition ease-in-out duration-150">
                    <span>🔙</span> Back to Dashboard
                </a>
            </div>
        </div>

        <!-- Student Information -->
        <div class="bg-white rounded-2xl shadow-lg p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Student Information</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <div class="text-sm text-gray-600 mb-1">Name</div>
                    <div class="font-medium text-gray-900">{{ $student->name }}</div>
                </div>
                <div>
                    <div class="text-sm text-gray-600 mb-1">Email</div>
                    <div class="font-medium text-gray-900">{{ $student->email }}</div>
                </div>
                <div>
                    <div class="text-sm text-gray-600 mb-1">Role</div>
                    <div class="font-medium text-gray-900">{{ ucfirst($student->role) }}</div>
                </div>
                <div>
                    <div class="text-sm text-gray-600 mb-1">Joined</div>
                    <div class="font-medium text-gray-900">{{ $student->created_at->format('M d, Y') }}</div>
                </div>
            </div>
        </div>

        <!-- Performance Statistics -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-900">Best WPM</h3>
                    <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                        <span class="text-xl">⚡</span>
                    </div>
                </div>
                <div class="text-3xl font-bold text-gray-900">{{ $stats['best_wpm'] }}</div>
                <div class="text-sm text-gray-600">Highest speed achieved</div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-900">Best Accuracy</h3>
                    <div class="w-10 h-10 bg-yellow-100 rounded-full flex items-center justify-center">
                        <span class="text-xl">🎯</span>
                    </div>
                </div>
                <div class="text-3xl font-bold text-gray-900">{{ $stats['best_accuracy'] }}%</div>
                <div class="text-sm text-gray-600">Highest accuracy achieved</div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-900">Total Attempts</h3>
                    <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center">
                        <span class="text-xl">📊</span>
                    </div>
                </div>
                <div class="text-3xl font-bold text-gray-900">{{ $stats['total_attempts'] }}</div>
                <div class="text-sm text-gray-600">Total exercises completed</div>
            </div>
        </div>

        <!-- Recent Attempts -->
        <div class="bg-white rounded-2xl shadow-lg p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-semibold text-gray-900">Recent Attempts</h3>
                <span class="text-sm text-gray-600">Last 10 exercises</span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="text-gray-600 border-b">
                        <tr>
                            <th class="text-left py-3 font-medium">Exercise</th>
                            <th class="text-center py-3 font-medium">WPM</th>
                            <th class="text-center py-3 font-medium">Accuracy</th>
                            <th class="text-center py-3 font-medium">Errors</th>
                            <th class="text-right py-3 font-medium">Time</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach($recentAttempts as $attempt)
                            <tr class="border-b last:border-b-0 hover:bg-gray-50">
                                <td class="py-4">{{ $attempt->exercise->title }}</td>
                                <td class="py-4 text-center font-medium text-blue-600">{{ $attempt->wpm }}</td>
                                <td class="py-4 text-center {{ $attempt->accuracy < 80 ? 'text-red-600' : 'text-green-600' }} font-medium">
                                    {{ $attempt->accuracy }}%
                                </td>
                                <td class="py-4 text-center text-sm text-gray-500">{{ $attempt->errors }}</td>
                                <td class="py-4 text-right text-sm text-gray-500">
                                    {{ $attempt->created_at->diffForHumans() }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Feedback Section -->
        <div class="bg-white rounded-2xl shadow-lg p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-semibold text-gray-900">Teacher Feedback</h3>
                <button class="px-4 py-2 border border-blue-600 rounded-lg font-medium text-blue-600 hover:bg-blue-50 transition ease-in-out duration-150" onclick="toggleFeedbackForm()">
                    + Add Feedback
                </button>
            </div>

            <!-- Feedback Form (Hidden by default) -->
            <div id="feedbackForm" class="hidden mb-6 p-4 bg-gray-50 rounded-lg">
                <form method="POST" action="{{ route('teacher.feedback.store', $student) }}">
                    @csrf
                    <div class="space-y-4">
                        <input type="hidden" name="batch_id" value="{{ $student->batches->first()->id ?? '' }}">

                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Feedback Message</label>
                            <textarea id="message" name="message" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required></textarea>
                        </div>

                        <div>
                            <label for="feedback_type" class="block text-sm font-medium text-gray-700 mb-1">Feedback Type</label>
                            <select id="feedback_type" name="feedback_type" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option value="general">General</option>
                                <option value="progress">Progress</option>
                                <option value="improvement">Needs Improvement</option>
                                <option value="excellent">Excellent Work</option>
                            </select>
                        </div>

                        <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg font-medium hover:bg-blue-700 transition ease-in-out duration-150">
                            Submit Feedback
                        </button>
                    </form>
                </div>

                <!-- Feedback List -->
                <div class="space-y-4">
                    @forelse($feedback as $item)
                        <div class="p-4 bg-gray-50 rounded-lg border border-gray-200">
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex items-center gap-2">
                                    <span class="text-sm font-medium text-gray-900">{{ $item['teacher']['name'] }}</span>
                                    <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded-full">{{ ucfirst($item['feedback_type']) }}</span>
                                </div>
                                <span class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($item['created_at'])->diffForHumans() }}</span>
                            </div>
                            <p class="text-sm text-gray-700">{{ $item['message'] }}</p>
                        </div>
                    @empty
                        <div class="text-center py-8">
                            <p class="text-gray-500">No feedback yet. Be the first to leave feedback!</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Assignments Section -->
        <div class="bg-white rounded-2xl shadow-lg p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-semibold text-gray-900">Assignments</h3>
                <button class="px-4 py-2 border border-green-600 rounded-lg font-medium text-green-600 hover:bg-green-50 transition ease-in-out duration-150" onclick="toggleAssignmentForm()">
                    + Create Assignment
                </button>
            </div>

            <!-- Assignment Form (Hidden by default) -->
            <div id="assignmentForm" class="hidden mb-6 p-4 bg-gray-50 rounded-lg">
                <form method="POST" action="{{ route('teacher.assignment.store') }}">
                    @csrf
                    <input type="hidden" name="student_id" value="{{ $student->id }}">

                    <div class="space-y-4">
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Assignment Title</label>
                            <input type="text" id="title" name="title" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                        </div>

                        <div>
                            <label for="exercise_id" class="block text-sm font-medium text-gray-700 mb-1">Exercise</label>
                            <select id="exercise_id" name="exercise_id" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                                @foreach(\App\Models\Exercise::all() as $exercise)
                                    <option value="{{ $exercise->id }}">{{ $exercise->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                            <textarea id="description" name="description" rows="2" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"></textarea>
                        </div>

                        <div>
                            <label for="due_date" class="block text-sm font-medium text-gray-700 mb-1">Due Date</label>
                            <input type="date" id="due_date" name="due_date" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" required min="{{ date('Y-m-d') }}">
                        </div>

                        <button type="submit" class="px-6 py-2 bg-green-600 text-white rounded-lg font-medium hover:bg-green-700 transition ease-in-out duration-150">
                            Create Assignment
                        </button>
                    </form>
                </div>

                <!-- Assignments List -->
                <div class="space-y-3">
                    @forelse($assignments as $assignment)
                        <div class="p-3 bg-white rounded-lg border border-gray-200 flex items-center justify-between">
                            <div>
                                <div class="font-medium text-gray-900">{{ $assignment['title'] }}</div>
                                <div class="text-xs text-gray-500">
                                    {{ $assignment['exercise']['title'] }} • Due: {{ \Carbon\Carbon::parse($assignment['due_date'])->format('M d, Y') }}
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="text-xs bg-{{ $assignment['status'] === 'completed' ? 'green' : ($assignment['status'] === 'overdue' ? 'red' : 'yellow') }}-100 text-{{ $assignment['status'] === 'completed' ? 'green' : ($assignment['status'] === 'overdue' ? 'red' : 'yellow') }}-800 px-2 py-1 rounded-full">
                                    {{ ucfirst($assignment['status']) }}
                                </span>
                                <button class="text-gray-400 hover:text-gray-600">⋯</button>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-4">
                            <p class="text-gray-500 text-sm">No assignments yet.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Badges/Achievements Section -->
        <div class="bg-white rounded-2xl shadow-lg p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-6">Achievements & Badges</h3>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @forelse($badges as $badge)
                    <div class="text-center">
                        <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-2">
                            <span class="text-2xl">🏅</span>
                        </div>
                        <div class="text-xs font-medium text-gray-900">{{ $badge->title }}</div>
                        <div class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($badge->issued_at)->format('M d, Y') }}</div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-8">
                        <p class="text-gray-500">No badges earned yet. Keep practicing!</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Performance Chart (Placeholder) -->
        <div class="bg-white rounded-2xl shadow-lg p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Performance Over Time</h3>
            <div class="bg-gray-50 rounded-lg p-8 text-center">
                <div class="text-gray-500 mb-4">Performance chart would be displayed here</div>
                <div class="text-sm text-gray-400">WPM and Accuracy trends over the last 30 days</div>
            </div>
        </div>
    </div>

    <script>
        function toggleFeedbackForm() {
            const form = document.getElementById('feedbackForm');
            form.classList.toggle('hidden');
        }

        function toggleAssignmentForm() {
            const form = document.getElementById('assignmentForm');
            form.classList.toggle('hidden');
        }
    </script>
@endsection