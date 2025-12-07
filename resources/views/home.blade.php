@extends('layouts.base')

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-blue-50 to-purple-50 py-20 fade-in-up">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="text-center lg:text-left">
                    <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
                        Master Typing Skills with Structured Lessons & Real-Time Practice
                    </h1>
                    <p class="text-xl text-gray-600 mb-8">
                        Beginner to Expert — Level-wise lessons, typing tests, badges, and certification.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-8 py-3 border border-transparent rounded-full font-semibold text-white uppercase tracking-widest bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Start Learning Free
                        </a>
                        <a href="#" class="inline-flex items-center justify-center px-8 py-3 border border-gray-300 rounded-full font-semibold text-gray-700 uppercase tracking-widest bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-300 card-hover">
                            View Courses
                        </a>
                    </div>
                </div>
                <div class="relative">
                    <div class="bg-white rounded-2xl p-6 shadow-2xl">
                        <div class="bg-gray-100 rounded-xl p-4 mb-4">
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex space-x-2">
                                    <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                                    <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                                    <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                                </div>
                            </div>
                            <div class="bg-white rounded-lg p-4">
                                <div class="text-sm text-gray-500 mb-2">Typing Practice</div>
                                <div class="text-2xl font-bold text-gray-900 mb-4">The quick brown fox jumps over the lazy dog</div>
                                <div class="flex items-center justify-between">
                                    <div class="text-sm text-gray-500">WPM: 45</div>
                                    <div class="text-sm text-gray-500">Accuracy: 98%</div>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-2">
                            <div class="bg-blue-100 rounded-lg p-3 text-center">
                                <div class="text-2xl font-bold text-blue-600">🏆</div>
                                <div class="text-sm text-blue-600 mt-1">Badges</div>
                            </div>
                            <div class="bg-purple-100 rounded-lg p-3 text-center">
                                <div class="text-2xl font-bold text-purple-600">📊</div>
                                <div class="text-sm text-purple-600 mt-1">Progress</div>
                            </div>
                            <div class="bg-green-100 rounded-lg p-3 text-center">
                                <div class="text-2xl font-bold text-green-600">⭐</div>
                                <div class="text-sm text-green-600 mt-1">Levels</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Key Features Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Powerful Features for Effective Learning</h2>
                <p class="text-xl text-gray-600">Everything you need to become a typing master</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-6">
                        <span class="text-2xl">📚</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Step-by-Step Learning</h3>
                    <p class="text-gray-600">Progress from Beginner to Expert with structured lessons and guided practice.</p>
                </div>

                <!-- Feature 2 -->
                <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mb-6">
                        <span class="text-2xl">⚡</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Typing Practice & Speed Test</h3>
                    <p class="text-gray-600">Improve your speed and accuracy with real-time typing tests and performance tracking.</p>
                </div>

                <!-- Feature 3 -->
                <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-6">
                        <span class="text-2xl">🏅</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Gamification & Badges</h3>
                    <p class="text-gray-600">Earn badges, achievements, and rewards as you progress through the levels.</p>
                </div>

                <!-- Feature 4 -->
                <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mb-6">
                        <span class="text-2xl">📜</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Certificates</h3>
                    <p class="text-gray-600">Get certified for your typing skills and showcase your achievements.</p>
                </div>

                <!-- Feature 5 -->
                <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mb-6">
                        <span class="text-2xl">🏫</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Institution Dashboard</h3>
                    <p class="text-gray-600">Comprehensive tools for schools and training centers to manage students and track progress.</p>
                </div>

                <!-- Feature 6 -->
                <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="w-16 h-16 bg-pink-100 rounded-full flex items-center justify-center mb-6">
                        <span class="text-2xl">🏆</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Contests & Leaderboards</h3>
                    <p class="text-gray-600">Compete with others in typing contests and climb the leaderboards.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">How It Works</h2>
                <p class="text-xl text-gray-600">Simple 3-step process to master typing</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Step 1 -->
                <div class="text-center">
                    <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-3xl">👤</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Step 1: Sign Up</h3>
                    <p class="text-gray-600">Create your free account and choose your starting level.</p>
                </div>

                <!-- Step 2 -->
                <div class="text-center">
                    <div class="w-20 h-20 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-3xl">🎯</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Step 2: Learn & Practice Daily</h3>
                    <p class="text-gray-600">Complete daily lessons and practice sessions to improve your skills.</p>
                </div>

                <!-- Step 3 -->
                <div class="text-center">
                    <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-3xl">🏅</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Step 3: Earn Badges & Get Certified</h3>
                    <p class="text-gray-600">Unlock achievements and earn certificates as you master typing.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Level Progress Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Structured Curriculum From Beginner to Expert</h2>
                <p class="text-xl text-gray-600">Progress through our comprehensive learning path</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Beginner -->
                <div class="bg-blue-50 rounded-2xl p-6 text-center">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl">👶</span>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Beginner</h3>
                    <p class="text-sm text-gray-600 mb-4">Learn the basics of typing and keyboard familiarity</p>
                    <div class="text-sm font-medium text-blue-600">Free</div>
                </div>

                <!-- Intermediate -->
                <div class="bg-purple-50 rounded-2xl p-6 text-center">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl">👨‍💻</span>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Intermediate</h3>
                    <p class="text-sm text-gray-600 mb-4">Improve speed and accuracy with advanced exercises</p>
                    <div class="text-sm font-medium text-purple-600">Premium</div>
                </div>

                <!-- Advanced -->
                <div class="bg-green-50 rounded-2xl p-6 text-center">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl">💻</span>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Advanced</h3>
                    <p class="text-sm text-gray-600 mb-4">Master complex typing patterns and professional techniques</p>
                    <div class="text-sm font-medium text-green-600">Premium</div>
                </div>

                <!-- Expert -->
                <div class="bg-orange-50 rounded-2xl p-6 text-center">
                    <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl">🏆</span>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Expert</h3>
                    <p class="text-sm text-gray-600 mb-4">Achieve professional typing speed and certification</p>
                    <div class="text-sm font-medium text-orange-600">Premium</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">What Our Users Say</h2>
                <p class="text-xl text-gray-600">Real stories from our satisfied learners</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-white p-8 rounded-2xl shadow-lg">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                            <span class="text-xl">👤</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Sarah Johnson</h4>
                            <p class="text-sm text-gray-500">Student</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">"abctyping improved my typing speed from 25 WPM to 65 WPM in just 3 weeks! The structured lessons and gamification make learning fun and engaging."</p>
                </div>

                <!-- Testimonial 2 -->
                <div class="bg-white p-8 rounded-2xl shadow-lg">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mr-4">
                            <span class="text-xl">👨‍💼</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Michael Chen</h4>
                            <p class="text-sm text-gray-500">Professional</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">"As a professional, I needed to improve my typing efficiency. abctyping's advanced exercises and speed tests helped me achieve 95 WPM with 98% accuracy."</p>
                </div>

                <!-- Testimonial 3 -->
                <div class="bg-white p-8 rounded-2xl shadow-lg">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mr-4">
                            <span class="text-xl">👩‍🏫</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Emma Wilson</h4>
                            <p class="text-sm text-gray-500">Teacher</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">"I use abctyping for my students and the results are amazing! The institution dashboard makes it easy to track progress and the gamification keeps students motivated."</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Institution Banner Section -->
    <section class="bg-gradient-to-r from-purple-600 to-blue-600 py-20 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl font-bold mb-6">Built for Institutions & Training Centers</h2>
                    <p class="text-xl mb-8">Comprehensive tools to manage students, track progress, and create engaging typing contests.</p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="#" class="inline-flex items-center justify-center px-8 py-3 border border-transparent rounded-full font-semibold text-white uppercase tracking-widest bg-white text-gray-900 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 transition ease-in-out duration-150">
                            Request Demo
                        </a>
                        <a href="#" class="inline-flex items-center justify-center px-8 py-3 border border-white rounded-full font-semibold text-white uppercase tracking-widest hover:bg-white hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 transition ease-in-out duration-150">
                            Learn More
                        </a>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-white bg-opacity-10 rounded-2xl p-6">
                        <div class="w-12 h-12 bg-white bg-opacity-20 rounded-lg flex items-center justify-center mb-4">
                            <span class="text-2xl">👥</span>
                        </div>
                        <h3 class="font-semibold mb-2">Manage Batches</h3>
                        <p class="text-sm text-white text-opacity-80">Organize students into batches and track group progress.</p>
                    </div>
                    <div class="bg-white bg-opacity-10 rounded-2xl p-6">
                        <div class="w-12 h-12 bg-white bg-opacity-20 rounded-lg flex items-center justify-center mb-4">
                            <span class="text-2xl">📊</span>
                        </div>
                        <h3 class="font-semibold mb-2">Track Progress</h3>
                        <p class="text-sm text-white text-opacity-80">Monitor individual and group performance with detailed analytics.</p>
                    </div>
                    <div class="bg-white bg-opacity-10 rounded-2xl p-6">
                        <div class="w-12 h-12 bg-white bg-opacity-20 rounded-lg flex items-center justify-center mb-4">
                            <span class="text-2xl">🏆</span>
                        </div>
                        <h3 class="font-semibold mb-2">Create Contests</h3>
                        <p class="text-sm text-white text-opacity-80">Engage students with typing contests and leaderboards.</p>
                    </div>
                    <div class="bg-white bg-opacity-10 rounded-2xl p-6">
                        <div class="w-12 h-12 bg-white bg-opacity-20 rounded-lg flex items-center justify-center mb-4">
                            <span class="text-2xl">📜</span>
                        </div>
                        <h3 class="font-semibold mb-2">Certification</h3>
                        <p class="text-sm text-white text-opacity-80">Issue certificates to students upon course completion.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Simple, Transparent Pricing</h2>
                <p class="text-xl text-gray-600">Choose the plan that fits your learning needs</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Beginner Plan -->
                <div class="bg-white border border-gray-200 rounded-2xl p-8 shadow-lg">
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Beginner</h3>
                    <p class="text-gray-600 mb-6">Perfect for getting started</p>
                    <div class="mb-6">
                        <span class="text-4xl font-bold text-gray-900">$0</span>
                        <span class="text-gray-600">/month</span>
                    </div>
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-center">
                            <span class="text-green-500 mr-2">✓</span>
                            <span class="text-gray-600">Basic typing lessons</span>
                        </li>
                        <li class="flex items-center">
                            <span class="text-green-500 mr-2">✓</span>
                            <span class="text-gray-600">Speed tests</span>
                        </li>
                        <li class="flex items-center">
                            <span class="text-green-500 mr-2">✓</span>
                            <span class="text-gray-600">Community access</span>
                        </li>
                    </ul>
                    <a href="{{ route('register') }}" class="w-full inline-flex items-center justify-center px-8 py-3 border border-gray-300 rounded-full font-semibold text-gray-700 uppercase tracking-widest bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Get Started Free
                    </a>
                </div>

                <!-- Intermediate Plan -->
                <div class="bg-blue-50 border-2 border-blue-200 rounded-2xl p-8 shadow-lg">
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Intermediate</h3>
                    <p class="text-gray-600 mb-6">For serious learners</p>
                    <div class="mb-6">
                        <span class="text-4xl font-bold text-gray-900">$9</span>
                        <span class="text-gray-600">/month</span>
                    </div>
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-center">
                            <span class="text-green-500 mr-2">✓</span>
                            <span class="text-gray-600">All Beginner features</span>
                        </li>
                        <li class="flex items-center">
                            <span class="text-green-500 mr-2">✓</span>
                            <span class="text-gray-600">Advanced lessons</span>
                        </li>
                        <li class="flex items-center">
                            <span class="text-green-500 mr-2">✓</span>
                            <span class="text-gray-600">Progress tracking</span>
                        </li>
                        <li class="flex items-center">
                            <span class="text-green-500 mr-2">✓</span>
                            <span class="text-gray-600">Badges & achievements</span>
                        </li>
                    </ul>
                    <a href="#" class="w-full inline-flex items-center justify-center px-8 py-3 border border-transparent rounded-full font-semibold text-white uppercase tracking-widest bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Upgrade Now
                    </a>
                </div>

                <!-- Full Access Plan -->
                <div class="bg-purple-50 border-2 border-purple-200 rounded-2xl p-8 shadow-lg">
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Full Access</h3>
                    <p class="text-gray-600 mb-6">Complete typing mastery</p>
                    <div class="mb-6">
                        <span class="text-4xl font-bold text-gray-900">$19</span>
                        <span class="text-gray-600">/month</span>
                    </div>
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-center">
                            <span class="text-green-500 mr-2">✓</span>
                            <span class="text-gray-600">All Intermediate features</span>
                        </li>
                        <li class="flex items-center">
                            <span class="text-green-500 mr-2">✓</span>
                            <span class="text-gray-600">Expert lessons</span>
                        </li>
                        <li class="flex items-center">
                            <span class="text-green-500 mr-2">✓</span>
                            <span class="text-gray-600">Certification</span>
                        </li>
                        <li class="flex items-center">
                            <span class="text-green-500 mr-2">✓</span>
                            <span class="text-gray-600">Contest access</span>
                        </li>
                        <li class="flex items-center">
                            <span class="text-green-500 mr-2">✓</span>
                            <span class="text-gray-600">Priority support</span>
                        </li>
                    </ul>
                    <a href="#" class="w-full inline-flex items-center justify-center px-8 py-3 border border-transparent rounded-full font-semibold text-white uppercase tracking-widest bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Get Full Access
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">abctyping</h3>
                    <p class="text-gray-400 mb-4">Learn. Practice. Master Typing — Step by Step.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white">
                            <span class="sr-only">Facebook</span>
                            <span>📘</span>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <span class="sr-only">LinkedIn</span>
                            <span>💼</span>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <span class="sr-only">Twitter</span>
                            <span>🐦</span>
                        </a>
                    </div>
                </div>
                <div>
                    <h4 class="font-semibold mb-4">Company</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">About Us</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Contact</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Blog</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Careers</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold mb-4">Learning</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">Levels</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Practice</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Contests</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Certification</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold mb-4">Institution</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">Dashboard</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Batches</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Pricing</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Request Demo</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 pt-8">
                <p class="text-gray-400 text-sm">© 2025 abctyping. All rights reserved.</p>
            </div>
        </div>
    </footer>
@endsection
