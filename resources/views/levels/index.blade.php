@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Typing Levels</h1>
        <p class="text-gray-600">Choose your level to start learning</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach($levels as $level)
        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
            <div class="p-6">
                <div class="flex justify-between items-start mb-4">
                    <h2 class="text-xl font-semibold text-gray-800">{{ $level->name }}</h2>
                    <span class="px-3 py-1 rounded-full text-xs font-medium
                        {{ $level->is_free ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }}">
                        {{ $level->is_free ? 'Free' : 'Premium' }}
                    </span>
                </div>

                <p class="text-gray-600 mb-6">{{ $level->description }}</p>

                <div class="flex justify-between items-center">
                    <a href="{{ route('levels.show', $level) }}" class="inline-flex items-center px-4 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition-colors duration-200">
                        View Level
                        <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                    <span class="text-sm text-gray-500">Level {{ $level->order }}</span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection