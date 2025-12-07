@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Step Header -->
    <div class="bg-white rounded-xl shadow-md p-8 mb-8">
        <div class="flex justify-between items-start mb-6">
            <div>
                <h1 class="text-3xl font-bold text-gray-800 mb-2">{{ $step->title }}</h1>
                <p class="text-gray-600 text-lg">{{ $step->description }}</p>
            </div>
            <div class="text-right">
                <span class="px-4 py-2 bg-primary-100 text-primary-800 rounded-full text-sm font-medium mb-2 block">
                    Step {{ $step->order }}
                </span>
                <span class="px-4 py-2 bg-gray-100 text-gray-800 rounded-full text-sm font-medium block">
                    Part of {{ $step->level->name }} Level
                </span>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-gray-50 rounded-lg p-4">
                <h3 class="font-semibold text-gray-800 mb-2">Requirements</h3>
                <div class="space-y-2">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Minimum WPM:</span>
                        <span class="font-medium text-gray-800">{{ $step->min_wpm }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Minimum Accuracy:</span>
                        <span class="font-medium text-gray-800">{{ $step->min_accuracy }}%</span>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 rounded-lg p-4">
                <h3 class="font-semibold text-gray-800 mb-2">Level Information</h3>
                <div class="space-y-2">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Level:</span>
                        <span class="font-medium text-gray-800">{{ $step->level->name }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Level Order:</span>
                        <span class="font-medium text-gray-800">{{ $step->level->order }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Exercises List -->
    <div class="space-y-6">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Exercises in this Step</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($step->exercises as $exercise)
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <h3 class="text-xl font-semibold text-gray-800">{{ $exercise->title }}</h3>
                        <span class="px-3 py-1 bg-gray-100 text-gray-800 rounded-full text-xs font-medium">
                            {{ $exercise->time_limit_seconds }} seconds
                        </span>
                    </div>

                    <div class="mb-6">
                        <p class="text-gray-600 mb-2">Preview:</p>
                        <div class="bg-gray-50 rounded-lg p-3 text-sm text-gray-700">
                            {{ Str::limit($exercise->text, 50) }}
                        </div>
                    </div>

                    <div class="flex justify-between items-center">
                        <a href="#" class="inline-flex items-center px-4 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition-colors duration-200">
                            Open Exercise
                            <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                            </svg>
                        </a>
                        @if($exercise->difficulty)
                        <span class="px-3 py-1 rounded-full text-xs font-medium
                            {{ $exercise->difficulty === 'easy' ? 'bg-green-100 text-green-800' :
                               ($exercise->difficulty === 'medium' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                            {{ ucfirst($exercise->difficulty) }}
                        </span>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection