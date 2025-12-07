@extends('layouts.app')

@section('content')
    <div class="space-y-8">
        <!-- Dashboard Header -->
        <div class="bg-white rounded-2xl shadow-lg p-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Teacher Dashboard</h1>
            <p class="text-gray-600">Monitor your students' progress and manage your assigned batches.</p>
        </div>

        <!-- Key Metrics -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Assigned Batches -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-900">Assigned Batches</h3>
                    <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                        <span class="text-xl">📚</span>
                    </div>
                </div>
                <div class="text-3xl font-bold text-gray-900">3</div>
                <div class="text-sm text-gray-600">Active batches</div>
            </div>

            <!-- Total Students -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-900">Total Students</h3>
                    <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center">
                        <span class="text-xl">👥</span>
                    </div>
                </div>
                <div class="text-3xl font-bold text-gray-900">48</div>
                <div class="text-sm text-gray-600">Across all batches</div>
            </div>

            <!-- Average Progress -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-900">Avg Progress</h3>
                    <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                        <span class="text-xl">📈</span>
                    </div>
                </div>
                <div class="text-3xl font-bold text-gray-900">58%</div>
                <div class="text-sm text-gray-600">Overall completion rate</div>
            </div>
        </div>

        <!-- Quick Actions & Student Performance -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Quick Actions -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h3>
                <div class="space-y-3">
                    <a href="#" class="block w-full text-center px-6 py-3 border border-transparent rounded-full font-semibold text-white uppercase tracking-widest bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        View My Batches
                    </a>
                    <a href="#" class="block w-full text-center px-6 py-3 border border-gray-300 rounded-full font-semibold text-gray-700 uppercase tracking-widest bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Check Assignments
                    </a>
                    <a href="#" class="block w-full text-center px-6 py-3 border border-gray-300 rounded-full font-semibold text-gray-700 uppercase tracking-widest bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Generate Reports
                    </a>
                </div>
            </div>

            <!-- Student Performance -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Student Performance</h3>
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                <span class="text-sm">👤</span>
                            </div>
                            <div>
                                <div class="text-sm font-medium text-gray-900">Sarah J.</div>
                                <div class="text-xs text-gray-600">Batch A</div>
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="text-sm font-medium text-blue-600">52 WPM</div>
                            <div class="text-xs text-green-600">96% Acc</div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center">
                                <span class="text-sm">👤</span>
                            </div>
                            <div>
                                <div class="text-sm font-medium text-gray-900">Mike C.</div>
                                <div class="text-xs text-gray-600">Batch B</div>
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="text-sm font-medium text-blue-600">45 WPM</div>
                            <div class="text-xs text-green-600">92% Acc</div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                                <span class="text-sm">👤</span>
                            </div>
                            <div>
                                <div class="text-sm font-medium text-gray-900">Emma W.</div>
                                <div class="text-xs text-gray-600">Batch A</div>
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="text-sm font-medium text-blue-600">48 WPM</div>
                            <div class="text-xs text-green-600">94% Acc</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Batch Progress Overview -->
        <div class="bg-white rounded-2xl shadow-lg p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Batch Progress Overview</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-blue-50 rounded-xl p-4">
                    <div class="flex items-center justify-between mb-2">
                        <h4 class="font-semibold text-gray-900">Batch A (Beginner)</h4>
                        <span class="text-sm text-gray-600">18 students</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2 mb-2">
                        <div class="bg-blue-500 h-2 rounded-full" style="width: 45%"></div>
                    </div>
                    <div class="text-sm text-gray-600">45% completion</div>
                </div>
                <div class="bg-purple-50 rounded-xl p-4">
                    <div class="flex items-center justify-between mb-2">
                        <h4 class="font-semibold text-gray-900">Batch B (Intermediate)</h4>
                        <span class="text-sm text-gray-600">12 students</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2 mb-2">
                        <div class="bg-purple-500 h-2 rounded-full" style="width: 65%"></div>
                    </div>
                    <div class="text-sm text-gray-600">65% completion</div>
                </div>
                <div class="bg-green-50 rounded-xl p-4">
                    <div class="flex items-center justify-between mb-2">
                        <h4 class="font-semibold text-gray-900">Batch C (Advanced)</h4>
                        <span class="text-sm text-gray-600">8 students</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2 mb-2">
                        <div class="bg-green-500 h-2 rounded-full" style="width: 85%"></div>
                    </div>
                    <div class="text-sm text-gray-600">85% completion</div>
                </div>
            </div>
        </div>

        <!-- Upcoming Tasks -->
        <div class="bg-white rounded-2xl shadow-lg p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Upcoming Tasks</h3>
            <div class="space-y-3">
                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                            <span>📅</span>
                        </div>
                        <div>
                            <div class="text-sm font-medium text-gray-900">Grade Batch A assignments</div>
                            <div class="text-xs text-gray-600">Due: Dec 15, 2024</div>
                        </div>
                    </div>
                    <a href="#" class="text-sm text-blue-600 hover:text-blue-800">View</a>
                </div>
                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center">
                            <span>📊</span>
                        </div>
                        <div>
                            <div class="text-sm font-medium text-gray-900">Generate monthly progress report</div>
                            <div class="text-xs text-gray-600">Due: Dec 20, 2024</div>
                        </div>
                    </div>
                    <a href="#" class="text-sm text-blue-600 hover:text-blue-800">View</a>
                </div>
                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                            <span>🏆</span>
                        </div>
                        <div>
                            <div class="text-sm font-medium text-gray-900">Prepare typing contest</div>
                            <div class="text-xs text-gray-600">Due: Jan 5, 2025</div>
                        </div>
                    </div>
                    <a href="#" class="text-sm text-blue-600 hover:text-blue-800">View</a>
                </div>
            </div>
        </div>
    </div>
@endsection