@extends('layouts.app')

@section('content')
    <div class="space-y-8">
        <!-- Dashboard Header -->
        <div class="bg-white rounded-2xl shadow-lg p-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Teacher Dashboard</h1>
            <p class="text-gray-600">Monitor your students' progress and manage your assigned batches.</p>
        </div>

        <!-- Summary Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Total Batches -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-900">Total Batches</h3>
                    <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                        <span class="text-xl">📚</span>
                    </div>
                </div>
                <div class="text-3xl font-bold text-gray-900">{{ $summary['total_batches'] }}</div>
                <div class="text-sm text-gray-600">Assigned batches</div>
            </div>

            <!-- Total Students -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-900">Total Students</h3>
                    <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center">
                        <span class="text-xl">👥</span>
                    </div>
                </div>
                <div class="text-3xl font-bold text-gray-900">{{ $summary['total_students'] }}</div>
                <div class="text-sm text-gray-600">Across all batches</div>
            </div>

            <!-- Average WPM -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-900">Avg WPM</h3>
                    <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                        <span class="text-xl">⚡</span>
                    </div>
                </div>
                <div class="text-3xl font-bold text-gray-900">{{ number_format($summary['average_wpm'], 1) }}</div>
                <div class="text-sm text-gray-600">Last 7 days</div>
            </div>

            <!-- Average Accuracy -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-900">Avg Accuracy</h3>
                    <div class="w-10 h-10 bg-yellow-100 rounded-full flex items-center justify-center">
                        <span class="text-xl">🎯</span>
                    </div>
                </div>
                <div class="text-3xl font-bold text-gray-900">{{ number_format($summary['average_accuracy'], 1) }}%</div>
                <div class="text-sm text-gray-600">Last 7 days</div>
            </div>
        </div>

        <!-- My Batches List -->
        <div class="bg-white rounded-2xl shadow-lg p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-semibold text-gray-900">My Batches</h3>
                <a href="#" class="text-sm text-blue-600 hover:text-blue-800">View All Batches</a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($batches as $batch)
                    <div class="bg-gray-50 rounded-xl p-4">
                        <div class="flex items-center justify-between mb-2">
                            <h4 class="font-semibold text-gray-900">{{ $batch->name }}</h4>
                            <span class="text-sm text-gray-600">{{ $batch->students->count() }} students</span>
                        </div>
                        <div class="flex items-center gap-2 mb-2">
                            <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded-full">{{ $batch->level->name ?? 'N/A' }}</span>
                            <span class="text-xs bg-green-100 text-green-800 px-2 py-1 rounded-full">{{ ucfirst($batch->status) }}</span>
                        </div>
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-sm text-gray-600">Avg WPM: {{ number_format($batch->average_wpm, 1) }}</span>
                            <span class="text-sm text-gray-600">Avg Acc: {{ number_format($batch->average_accuracy, 1) }}%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2 mb-3">
                            <div class="bg-blue-500 h-2 rounded-full" style="width: {{ min(100, $batch->average_accuracy) }}%"></div>
                        </div>
                        <a href="{{ route('teacher.batch.detail', $batch) }}" class="block w-full text-center px-4 py-2 border border-blue-600 rounded-lg font-medium text-blue-600 hover:bg-blue-50 transition ease-in-out duration-150">
                            View Batch Details
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Students Who Need Attention -->
        <div class="bg-white rounded-2xl shadow-lg p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-semibold text-gray-900">Students Who Need Attention</h3>
                <span class="text-sm text-gray-600">{{ count($studentsAtRisk) }} students</span>
            </div>

            @if(count($studentsAtRisk) > 0)
                <div class="space-y-4">
                    @foreach($studentsAtRisk as $student)
                        <div class="flex items-center justify-between p-3 bg-red-50 rounded-lg">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center">
                                    <span class="text-sm">😕</span>
                                </div>
                                <div>
                                    <div class="text-sm font-medium text-gray-900">{{ $student['user']->name }}</div>
                                    <div class="text-xs text-gray-600">
                                        {{ implode(', ', $student['reasons']) }} |
                                        Last active: {{ $student['last_active']->diffForHumans() }}
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="text-sm font-medium text-blue-600">{{ $student['wpm'] }} WPM</div>
                                <div class="text-xs {{ $student['accuracy'] < 80 ? 'text-red-600' : 'text-green-600' }}">
                                    {{ $student['accuracy'] }}% Acc
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-8">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl">😊</span>
                    </div>
                    <p class="text-gray-600">All students are performing well!</p>
                    <p class="text-sm text-gray-500">No students need attention at this time.</p>
                </div>
            @endif
        </div>

        <!-- Recent Activity -->
        <div class="bg-white rounded-2xl shadow-lg p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-semibold text-gray-900">Recent Activity</h3>
                <a href="#" class="text-sm text-blue-600 hover:text-blue-800">View All Activity</a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="text-gray-600 border-b">
                        <tr>
                            <th class="text-left py-2 font-medium">Student</th>
                            <th class="text-left py-2 font-medium">Exercise</th>
                            <th class="text-center py-2 font-medium">WPM</th>
                            <th class="text-center py-2 font-medium">Accuracy</th>
                            <th class="text-right py-2 font-medium">Time</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach($recentActivity as $activity)
                            <tr class="border-b last:border-b-0 hover:bg-gray-50">
                                <td class="py-3">
                                    <div class="flex items-center gap-2">
                                        <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                            <span class="text-sm">👤</span>
                                        </div>
                                        <span>{{ $activity['student_name'] }}</span>
                                    </div>
                                </td>
                                <td class="py-3">{{ Str::limit($activity['exercise_name'], 30) }}</td>
                                <td class="py-3 text-center font-medium text-blue-600">{{ $activity['wpm'] }}</td>
                                <td class="py-3 text-center {{ $activity['accuracy'] < 80 ? 'text-red-600' : 'text-green-600' }} font-medium">
                                    {{ $activity['accuracy'] }}%
                                </td>
                                <td class="py-3 text-right text-sm text-gray-500">
                                    {{ $activity['timestamp']->diffForHumans() }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white rounded-2xl shadow-lg p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <a href="{{ route('teacher.dashboard') }}" class="block text-center p-4 border border-gray-200 rounded-xl hover:bg-gray-50 transition ease-in-out duration-150">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-3">
                        <span class="text-xl">📚</span>
                    </div>
                    <span class="font-medium text-gray-900">View All Batches</span>
                </a>
                <a href="#" class="block text-center p-4 border border-gray-200 rounded-xl hover:bg-gray-50 transition ease-in-out duration-150">
                    <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-3">
                        <span class="text-xl">👥</span>
                    </div>
                    <span class="font-medium text-gray-900">View All Students</span>
                </a>
                <a href="#" class="block text-center p-4 border border-gray-200 rounded-xl hover:bg-gray-50 transition ease-in-out duration-150">
                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-3">
                        <span class="text-xl">🏆</span>
                    </div>
                    <span class="font-medium text-gray-900">View Contests</span>
                </a>
            </div>
        </div>
    </div>
@endsection