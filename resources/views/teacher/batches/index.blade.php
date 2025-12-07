@extends('layouts.app')

@section('content')
    <div class="space-y-8">
        <!-- Batches Header -->
        <div class="bg-white rounded-2xl shadow-lg p-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">My Batches</h1>
                    <p class="text-gray-600">View and manage all batches assigned to you.</p>
                </div>
                <a href="{{ route('teacher.dashboard') }}" class="flex items-center gap-2 px-4 py-2 border border-gray-300 rounded-lg font-medium text-gray-700 hover:bg-gray-50 transition ease-in-out duration-150">
                    <span>🔙</span> Back to Dashboard
                </a>
            </div>
        </div>

        <!-- Batches Grid -->
        <div class="bg-white rounded-2xl shadow-lg p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($batches as $batch)
                    <div class="bg-gray-50 rounded-xl p-6 hover:shadow-md transition-shadow duration-200">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold text-gray-900">{{ $batch->name }}</h3>
                            <span class="text-xs bg-{{ $batch->status === 'active' ? 'green' : 'gray' }}-100 text-{{ $batch->status === 'active' ? 'green' : 'gray' }}-800 px-2 py-1 rounded-full">
                                {{ ucfirst($batch->status) }}
                            </span>
                        </div>

                        <div class="space-y-3 mb-6">
                            <div class="flex items-center gap-2">
                                <span class="text-gray-600">📚 Level:</span>
                                <span class="font-medium">{{ $batch->level->name ?? 'N/A' }}</span>
                            </div>

                            <div class="flex items-center gap-2">
                                <span class="text-gray-600">👥 Students:</span>
                                <span class="font-medium">{{ $batch->students->count() }}</span>
                            </div>

                            <div class="flex items-center gap-2">
                                <span class="text-gray-600">⚡ Avg WPM:</span>
                                <span class="font-medium">{{ number_format($batch->average_wpm, 1) }}</span>
                            </div>

                            <div class="flex items-center gap-2">
                                <span class="text-gray-600">🎯 Avg Accuracy:</span>
                                <span class="font-medium {{ $batch->average_accuracy < 80 ? 'text-red-600' : 'text-green-600' }}">
                                    {{ number_format($batch->average_accuracy, 1) }}%
                                </span>
                            </div>
                        </div>

                        <div class="flex items-center gap-3">
                            <a href="{{ route('teacher.batch.detail', $batch) }}" class="flex-1 text-center px-4 py-2 border border-blue-600 rounded-lg font-medium text-blue-600 hover:bg-blue-50 transition ease-in-out duration-150">
                                View Details
                            </a>
                            <a href="#" class="w-10 h-10 flex items-center justify-center border border-gray-300 rounded-lg hover:bg-gray-50 transition ease-in-out duration-150">
                                <span>⚙️</span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white rounded-2xl shadow-lg p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Batch Actions</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <button class="flex items-center justify-center gap-3 p-4 border border-gray-200 rounded-xl hover:bg-gray-50 transition ease-in-out duration-150">
                    <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                        <span>📝</span>
                    </div>
                    <span class="font-medium text-gray-900">Create Assignment</span>
                </button>
                <button class="flex items-center justify-center gap-3 p-4 border border-gray-200 rounded-xl hover:bg-gray-50 transition ease-in-out duration-150">
                    <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center">
                        <span>📊</span>
                    </div>
                    <span class="font-medium text-gray-900">Generate Report</span>
                </button>
                <button class="flex items-center justify-center gap-3 p-4 border border-gray-200 rounded-xl hover:bg-gray-50 transition ease-in-out duration-150">
                    <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                        <span>📅</span>
                    </div>
                    <span class="font-medium text-gray-900">Schedule Contest</span>
                </button>
            </div>
        </div>
    </div>
@endsection