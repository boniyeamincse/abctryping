@extends('layouts.app')

@section('content')
    <div class="space-y-8">
        <!-- Dashboard Header -->
        <div class="bg-white rounded-2xl shadow-lg p-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">User Dashboard</h1>
            <p class="text-gray-600">Welcome back, {{ Auth::user()->name }}! Continue your typing journey.</p>
        </div>

        <!-- Current Level & Progress -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Current Level Card -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Current Level</h3>
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center">
                        <span class="text-2xl">🏆</span>
                    </div>
                    <div>
                        <div class="text-2xl font-bold text-gray-900">Intermediate</div>
                        <div class="text-sm text-gray-600">Step 8 of 12</div>
                    </div>
                </div>
            </div>

            <!-- Progress Card -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Overall Progress</h3>
                <div class="mb-4">
                    <div class="flex justify-between text-sm text-gray-600 mb-1">
                        <span>Beginner</span>
                        <span>Expert</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-gradient-to-r from-blue-500 to-purple-600 h-2 rounded-full" style="width: 65%"></div>
                    </div>
                    <div class="text-right text-sm text-gray-600 mt-1">65% Complete</div>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Stats</h3>
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Current WPM</span>
                        <span class="font-semibold text-gray-900">48 WPM</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Accuracy</span>
                        <span class="font-semibold text-gray-900">94%</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Badges Earned</span>
                        <span class="font-semibold text-gray-900">12/24</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activity & Quick Actions -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Recent Activity -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Recent Typing Attempts</h3>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">Date</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">Lesson</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">WPM</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">Accuracy</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">Time</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <tr>
                                <td class="px-4 py-3 text-sm text-gray-600">Today, 2:30 PM</td>
                                <td class="px-4 py-3 text-sm text-gray-900">Advanced Paragraphs</td>
                                <td class="px-4 py-3 text-sm font-medium text-blue-600">48 WPM</td>
                                <td class="px-4 py-3 text-sm font-medium text-green-600">94%</td>
                                <td class="px-4 py-3 text-sm text-gray-600">1:23</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-3 text-sm text-gray-600">Yesterday, 11:15 AM</td>
                                <td class="px-4 py-3 text-sm text-gray-900">Number Practice</td>
                                <td class="px-4 py-3 text-sm font-medium text-blue-600">45 WPM</td>
                                <td class="px-4 py-3 text-sm font-medium text-green-600">92%</td>
                                <td class="px-4 py-3 text-sm text-gray-600">0:48</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-3 text-sm text-gray-600">Dec 5, 2024</td>
                                <td class="px-4 py-3 text-sm text-gray-900">Symbol Practice</td>
                                <td class="px-4 py-3 text-sm font-medium text-blue-600">42 WPM</td>
                                <td class="px-4 py-3 text-sm font-medium text-green-600">90%</td>
                                <td class="px-4 py-3 text-sm text-gray-600">1:15</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h3>
                <div class="space-y-3">
                    <a href="#" class="block w-full text-center px-6 py-3 border border-transparent rounded-full font-semibold text-white uppercase tracking-widest bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Continue Learning
                    </a>
                    <a href="#" class="block w-full text-center px-6 py-3 border border-gray-300 rounded-full font-semibold text-gray-700 uppercase tracking-widest bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Practice Now
                    </a>
                    <a href="#" class="block w-full text-center px-6 py-3 border border-gray-300 rounded-full font-semibold text-gray-700 uppercase tracking-widest bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        View Badges
                    </a>
                </div>
            </div>
        </div>

        <!-- Learning Progress -->
        <div class="bg-white rounded-2xl shadow-lg p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Learning Progress</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="text-center">
                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-2">
                        <span class="text-xl">✓</span>
                    </div>
                    <div class="text-sm text-gray-600">Beginner</div>
                </div>
                <div class="text-center">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-2">
                        <span class="text-xl">🏃</span>
                    </div>
                    <div class="text-sm text-gray-600">Intermediate</div>
                </div>
                <div class="text-center">
                    <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-2">
                        <span class="text-xl">🔒</span>
                    </div>
                    <div class="text-sm text-gray-400">Advanced</div>
                </div>
                <div class="text-center">
                    <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-2">
                        <span class="text-xl">🔒</span>
                    </div>
                    <div class="text-sm text-gray-400">Expert</div>
                </div>
            </div>
        </div>
    </div>
@endsection