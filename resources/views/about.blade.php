@extends('layouts.base')

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-blue-50 to-purple-50 py-20 fade-in-up">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
                    About abctyping
                </h1>
                <p class="text-xl text-gray-600 mb-8 max-w-3xl mx-auto">
                    Helping students and professionals master typing, step by step.
                </p>
            </div>
        </div>
    </section>

    <!-- Story / Overview Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">Our Story</h2>
                    <p class="text-lg text-gray-600 mb-6">
                        abctyping is a comprehensive typing learning and contest platform designed to help individuals and institutions master typing skills through structured, step-by-step learning.
                    </p>
                    <p class="text-lg text-gray-600 mb-6">
                        Our platform offers a level-wise learning approach that takes learners from Beginner to Expert through carefully designed lessons, practice sessions, and real-time typing tests.
                    </p>
                    <p class="text-lg text-gray-600">
                        With gamification elements like badges, achievements, and certificates, we make typing practice engaging and rewarding.
                    </p>
                </div>
                <div class="bg-gradient-to-br from-blue-100 to-purple-100 rounded-2xl p-8">
                    <div class="bg-white rounded-xl p-6 shadow-lg">
                        <div class="text-center">
                            <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <span class="text-2xl">🎯</span>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Structured Learning Path</h3>
                            <p class="text-gray-600">Beginner → Intermediate → Advanced → Expert</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Key Highlights Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Key Highlights</h2>
                <p class="text-xl text-gray-600">What makes abctyping unique</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Card 1 -->
                <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-6">
                        <span class="text-2xl">📚</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Structured Levels & Steps</h3>
                    <p class="text-gray-600">Progress through carefully designed levels from Beginner to Expert with step-by-step lessons.</p>
                </div>

                <!-- Card 2 -->
                <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mb-6">
                        <span class="text-2xl">⚡</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Real-Time Typing Practice & Speed Tests</h3>
                    <p class="text-gray-600">Improve your typing speed and accuracy with interactive practice sessions and performance tracking.</p>
                </div>

                <!-- Card 3 -->
                <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-6">
                        <span class="text-2xl">🏅</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Badges, Achievements & Certificates</h3>
                    <p class="text-gray-600">Earn rewards and get certified as you progress through the learning journey.</p>
                </div>

                <!-- Card 4 -->
                <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mb-6">
                        <span class="text-2xl">🏫</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Institution & Batch Management</h3>
                    <p class="text-gray-600">Comprehensive tools for schools and training centers to manage students and track progress.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- For Students & Professionals Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">For Students & Professionals</h2>
                <p class="text-xl text-gray-600">Benefits for individual learners</p>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Left Column - Students -->
                <div class="bg-blue-50 rounded-2xl p-8">
                    <h3 class="text-2xl font-semibold text-gray-900 mb-6">For Students</h3>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <span class="text-green-500 mr-3 mt-1">✓</span>
                            <span class="text-gray-600">Improve typing speed and accuracy</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-green-500 mr-3 mt-1">✓</span>
                            <span class="text-gray-600">Earn badges and certificates for achievements</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-green-500 mr-3 mt-1">✓</span>
                            <span class="text-gray-600">Prepare for academic and professional success</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-green-500 mr-3 mt-1">✓</span>
                            <span class="text-gray-600">Track progress and see improvement over time</span>
                        </li>
                    </ul>
                </div>

                <!-- Right Column - Professionals -->
                <div class="bg-purple-50 rounded-2xl p-8">
                    <h3 class="text-2xl font-semibold text-gray-900 mb-6">For Professionals</h3>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <span class="text-green-500 mr-3 mt-1">✓</span>
                            <span class="text-gray-600">Increase work productivity with faster typing</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-green-500 mr-3 mt-1">✓</span>
                            <span class="text-gray-600">Reduce errors and improve document accuracy</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-green-500 mr-3 mt-1">✓</span>
                            <span class="text-gray-600">Enhance job skills and career prospects</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-green-500 mr-3 mt-1">✓</span>
                            <span class="text-gray-600">Compete in typing contests and benchmark skills</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- For Institutions Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">Built for Schools, Training Centers & Organizations</h2>
                    <p class="text-lg text-gray-600 mb-8">
                        abctyping provides comprehensive tools for educational institutions to manage typing education at scale.
                    </p>
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-start">
                            <span class="text-green-500 mr-3 mt-1">✓</span>
                            <span class="text-gray-600">Manage batches and students efficiently</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-green-500 mr-3 mt-1">✓</span>
                            <span class="text-gray-600">Track progress and performance with detailed analytics</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-green-500 mr-3 mt-1">✓</span>
                            <span class="text-gray-600">Create typing contests and leaderboards</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-green-500 mr-3 mt-1">✓</span>
                            <span class="text-gray-600">Issue certificates to students upon completion</span>
                        </li>
                    </ul>
                    <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-8 py-3 border border-transparent rounded-full font-semibold text-white uppercase tracking-widest bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Request Demo
                    </a>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-white rounded-2xl p-6 shadow-lg">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <span class="text-xl">👥</span>
                        </div>
                        <h3 class="font-semibold mb-2">Manage Batches</h3>
                        <p class="text-sm text-gray-600">Organize students into batches and track group progress.</p>
                    </div>
                    <div class="bg-white rounded-2xl p-6 shadow-lg">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                            <span class="text-xl">📊</span>
                        </div>
                        <h3 class="font-semibold mb-2">Track Progress</h3>
                        <p class="text-sm text-gray-600">Monitor individual and group performance with detailed analytics.</p>
                    </div>
                    <div class="bg-white rounded-2xl p-6 shadow-lg">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                            <span class="text-xl">🏆</span>
                        </div>
                        <h3 class="font-semibold mb-2">Create Contests</h3>
                        <p class="text-sm text-gray-600">Engage students with typing contests and leaderboards.</p>
                    </div>
                    <div class="bg-white rounded-2xl p-6 shadow-lg">
                        <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mb-4">
                            <span class="text-xl">📜</span>
                        </div>
                        <h3 class="font-semibold mb-2">Certification</h3>
                        <p class="text-sm text-gray-600">Issue certificates to students upon course completion.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team / Vision Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Our Vision</h2>
                <p class="text-xl text-gray-600">Promoting digital skills and typing literacy</p>
            </div>
            <div class="max-w-4xl mx-auto text-center">
                <p class="text-lg text-gray-600 mb-8">
                    At abctyping, we believe that typing is a fundamental digital skill that empowers individuals in both academic and professional settings. Our vision is to make high-quality typing education accessible to everyone, from students to working professionals.
                </p>
                <p class="text-lg text-gray-600 mb-8">
                    Through our structured learning approach, gamification elements, and comprehensive institution tools, we aim to create a world where everyone can type efficiently and confidently.
                </p>
                <p class="text-lg text-gray-600">
                    Join us on this journey to master typing skills and unlock new opportunities in the digital age.
                </p>
            </div>
        </div>
    </section>
@endsection