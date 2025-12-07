@extends('layouts.app')

@section('content')
    <div class="space-y-8">
        <!-- Page Header -->
        <div class="bg-white rounded-2xl shadow-lg p-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Typing Practice</h1>
            <p class="text-gray-600">Choose from various typing exercises to improve your speed and accuracy.</p>
        </div>

        <!-- Practice Exercises Grid -->
        <div class="bg-white rounded-2xl shadow-lg p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-6">Available Exercises</h3>

            @if($exercises->isEmpty())
                <div class="text-center py-12">
                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl">📝</span>
                    </div>
                    <p class="text-gray-600 mb-2">No exercises available yet.</p>
                    <p class="text-sm text-gray-500">Check back later or complete some levels to unlock practice exercises.</p>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($exercises as $exercise)
                        <div class="border border-gray-200 rounded-xl p-4 hover:shadow-md transition-shadow duration-200">
                            <div class="flex items-center justify-between mb-3">
                                <h4 class="font-semibold text-gray-900">{{ $exercise->title }}</h4>
                                <span class="text-xs px-2 py-1 rounded-full bg-blue-100 text-blue-800">
                                    {{ ucfirst($exercise->difficulty ?? 'medium') }}
                                </span>
                            </div>

                            <div class="mb-3">
                                <p class="text-sm text-gray-600 mb-1">Level: {{ $exercise->step->level->title ?? 'Unknown' }}</p>
                                <p class="text-sm text-gray-600">Step: {{ $exercise->step->title ?? 'Unknown' }}</p>
                            </div>

                            <div class="flex items-center justify-between mt-4">
                                <span class="text-sm text-gray-500">
                                    {{ $exercise->time_limit_seconds }} seconds
                                </span>
                                <a href="{{ route('exercises.show', $exercise->id) }}"
                                   class="px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition-colors duration-200">
                                    Start Practice
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Practice Tips -->
        <div class="bg-white rounded-2xl shadow-lg p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Practice Tips</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-blue-50 rounded-lg p-4">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                            <span>🎯</span>
                        </div>
                        <h4 class="font-semibold text-gray-900">Focus on Accuracy</h4>
                    </div>
                    <p class="text-sm text-gray-600">Accuracy is more important than speed. Aim for 95%+ accuracy first.</p>
                </div>
                <div class="bg-green-50 rounded-lg p-4">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                            <span>⏱️</span>
                        </div>
                        <h4 class="font-semibold text-gray-900">Consistent Timing</h4>
                    </div>
                    <p class="text-sm text-gray-600">Practice regularly to build muscle memory and improve your WPM.</p>
                </div>
                <div class="bg-purple-50 rounded-lg p-4">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center">
                            <span>🧘</span>
                        </div>
                        <h4 class="font-semibold text-gray-900">Proper Posture</h4>
                    </div>
                    <p class="text-sm text-gray-600">Maintain good posture and hand position for optimal typing.</p>
                </div>
            </div>
        </div>
    </div>
@endsection