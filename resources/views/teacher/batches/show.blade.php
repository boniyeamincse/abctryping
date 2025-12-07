@extends('layouts.app')

@section('content')
    <div class="space-y-8">
        <!-- Batch Header -->
        <div class="bg-white rounded-2xl shadow-lg p-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $batch->name }}</h1>
                    <div class="flex items-center gap-4">
                        <span class="text-sm bg-blue-100 text-blue-800 px-3 py-1 rounded-full">{{ $batch->level->name ?? 'N/A' }}</span>
                        <span class="text-sm bg-green-100 text-green-800 px-3 py-1 rounded-full">{{ ucfirst($batch->status) }}</span>
                        <span class="text-sm text-gray-600">{{ $batch->students->count() }} students</span>
                    </div>
                </div>
                <a href="{{ route('teacher.dashboard') }}" class="flex items-center gap-2 px-4 py-2 border border-gray-300 rounded-lg font-medium text-gray-700 hover:bg-gray-50 transition ease-in-out duration-150">
                    <span>🔙</span> Back to Dashboard
                </a>
            </div>
        </div>

        <!-- Batch Information -->
        <div class="bg-white rounded-2xl shadow-lg p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Batch Information</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <div class="text-sm text-gray-600 mb-1">Teacher</div>
                    <div class="font-medium text-gray-900">{{ $batch->teacher->name }}</div>
                </div>
                <div>
                    <div class="text-sm text-gray-600 mb-1">Level</div>
                    <div class="font-medium text-gray-900">{{ $batch->level->name ?? 'N/A' }}</div>
                </div>
                <div>
                    <div class="text-sm text-gray-600 mb-1">Start Date</div>
                    <div class="font-medium text-gray-900">{{ $batch->start_date->format('M d, Y') }}</div>
                </div>
                <div>
                    <div class="text-sm text-gray-600 mb-1">End Date</div>
                    <div class="font-medium text-gray-900">{{ $batch->end_date ? $batch->end_date->format('M d, Y') : 'Ongoing' }}</div>
                </div>
            </div>
        </div>

        <!-- Student Performance Table -->
        <div class="bg-white rounded-2xl shadow-lg p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-semibold text-gray-900">Student Performance</h3>
                <div class="flex items-center gap-2">
                    <input type="text" placeholder="Search students..." class="px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <button class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50">Filter</button>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="text-gray-600 border-b">
                        <tr>
                            <th class="text-left py-3 font-medium">Student</th>
                            <th class="text-left py-3 font-medium">Best WPM</th>
                            <th class="text-left py-3 font-medium">Best Accuracy</th>
                            <th class="text-left py-3 font-medium">Last Activity</th>
                            <th class="text-right py-3 font-medium">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach($studentPerformance as $performance)
                            <tr class="border-b last:border-b-0 hover:bg-gray-50">
                                <td class="py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                            <span class="text-sm">👤</span>
                                        </div>
                                        <div>
                                            <div class="font-medium text-gray-900">{{ $performance['student']->name }}</div>
                                            <div class="text-xs text-gray-600">{{ $performance['student']->email }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 font-medium text-blue-600">{{ $performance['best_wpm'] }}</td>
                                <td class="py-4 {{ $performance['best_accuracy'] < 80 ? 'text-red-600' : 'text-green-600' }} font-medium">
                                    {{ $performance['best_accuracy'] }}%
                                </td>
                                <td class="py-4 text-sm text-gray-500">
                                    {{ $performance['last_activity'] ? $performance['last_activity']->diffForHumans() : 'No activity' }}
                                </td>
                                <td class="py-4 text-right">
                                    <a href="{{ route('teacher.student.detail', $performance['student']) }}" class="px-4 py-2 border border-blue-600 rounded-lg font-medium text-blue-600 hover:bg-blue-50 transition ease-in-out duration-150">
                                        View Performance
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Batch Statistics -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-900">Avg WPM</h3>
                    <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                        <span class="text-xl">⚡</span>
                    </div>
                </div>
                <div class="text-3xl font-bold text-gray-900">{{ number_format($batch->average_wpm, 1) }}</div>
                <div class="text-sm text-gray-600">Last 7 days</div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-900">Avg Accuracy</h3>
                    <div class="w-10 h-10 bg-yellow-100 rounded-full flex items-center justify-center">
                        <span class="text-xl">🎯</span>
                    </div>
                </div>
                <div class="text-3xl font-bold text-gray-900">{{ number_format($batch->average_accuracy, 1) }}%</div>
                <div class="text-sm text-gray-600">Last 7 days</div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-900">Completion Rate</h3>
                    <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center">
                        <span class="text-xl">📊</span>
                    </div>
                </div>
                <div class="text-3xl font-bold text-gray-900">65%</div>
                <div class="text-sm text-gray-600">Overall progress</div>
            </div>
        </div>
    </div>
@endsection