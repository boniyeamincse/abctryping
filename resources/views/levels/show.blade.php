@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Level Header -->
    <div class="bg-white rounded-xl shadow-md p-8 mb-8">
        <div class="flex justify-between items-start mb-6">
            <div>
                <h1 class="text-3xl font-bold text-gray-800 mb-2">{{ $level->name }}</h1>
                <p class="text-gray-600 text-lg">{{ $level->description }}</p>
            </div>
            <span class="px-4 py-2 rounded-full text-sm font-medium
                {{ $level->is_free ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }}">
                {{ $level->is_free ? 'Free Level' : 'Premium Level' }}
            </span>
        </div>

        <div class="flex items-center gap-4">
            <span class="px-3 py-1 bg-primary-100 text-primary-800 rounded-full text-sm font-medium">
                Level {{ $level->order }}
            </span>
            <span class="px-3 py-1 bg-gray-100 text-gray-800 rounded-full text-sm font-medium">
                {{ ucfirst($level->slug) }} Level
            </span>
        </div>
    </div>

    <!-- Steps List -->
    <div class="space-y-6">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Steps in this Level</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($level->steps->sortBy('order') as $step)
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <h3 class="text-xl font-semibold text-gray-800">Step {{ $step->order }}: {{ $step->title }}</h3>
                        <span class="px-3 py-1 bg-gray-100 text-gray-800 rounded-full text-xs font-medium">
                            Step {{ $step->order }}
                        </span>
                    </div>

                    <p class="text-gray-600 mb-6">{{ $step->description }}</p>

                    <!-- Step Status Indicator -->
                    @php
                        $status = $stepProgress[$step->id] ?? 'locked';
                        $isLocked = $status === 'locked';
                        $isInProgress = $status === 'in_progress';
                        $isCompleted = $status === 'completed';
                    @endphp

                    <div class="mb-4">
                        <div class="flex items-center gap-2">
                            @if($isCompleted)
                                <div class="flex items-center gap-2">
                                    <div class="w-5 h-5 rounded-full bg-green-500 flex items-center justify-center">
                                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <span class="text-green-600 font-medium">Completed</span>
                                </div>
                            @elseif($isInProgress)
                                <div class="flex items-center gap-2">
                                    <div class="w-5 h-5 rounded-full bg-blue-500 flex items-center justify-center">
                                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <span class="text-blue-600 font-medium">In Progress</span>
                                </div>
                            @else
                                <div class="flex items-center gap-2">
                                    <div class="w-5 h-5 rounded-full bg-gray-300 flex items-center justify-center">
                                        <svg class="w-3 h-3 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <span class="text-gray-600 font-medium">Locked</span>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="flex justify-between items-center">
                        <a href="{{ route('steps.show', $step) }}" class="inline-flex items-center px-4 py-2 {{ $isLocked ? 'bg-gray-300 text-gray-500 cursor-not-allowed' : 'bg-primary-600 text-white hover:bg-primary-700' }} rounded-lg transition-colors duration-200 {{ $isLocked ? '' : 'hover:bg-primary-700' }}" {{ $isLocked ? 'disabled' : '' }}>
                            View Step
                            <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                        <div class="text-right">
                            <p class="text-sm text-gray-500">Min WPM: {{ $step->min_wpm }}</p>
                            <p class="text-sm text-gray-500">Min Accuracy: {{ $step->min_accuracy }}%</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection