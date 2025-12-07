@extends('layouts.app')

@section('content')
    <div class="space-y-8">
        <!-- Dashboard Header -->
        <div class="bg-white rounded-2xl shadow-lg p-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Institution Admin Dashboard</h1>
            <p class="text-gray-600">Manage your institution's typing program and track student progress.</p>
        </div>

        <!-- Key Metrics -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Total Students -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-900">Total Students</h3>
                    <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                        <span class="text-xl">👥</span>
                    </div>
                </div>
                <div class="text-3xl font-bold text-gray-900">148</div>
                <div class="text-sm text-green-600 flex items-center gap-1">
                    <span>↗</span> 12% from last month
                </div>
            </div>

            <!-- Total Batches -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-900">Total Batches</h3>
                    <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center">
                        <span class="text-xl">📚</span>
                    </div>
                </div>
                <div class="text-3xl font-bold text-gray-900">8</div>
                <div class="text-sm text-blue-600 flex items-center gap-1">
                    <span>→</span> 2 active batches
                </div>
            </div>

            <!-- Average WPM -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-900">Avg WPM</h3>
                    <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                        <span class="text-xl">⚡</span>
                    </div>
                </div>
                <div class="text-3xl font-bold text-gray-900">38</div>
                <div class="text-sm text-gray-600">Across all students</div>
            </div>

            <!-- Average Accuracy -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-900">Avg Accuracy</h3>
                    <div class="w-10 h-10 bg-orange-100 rounded-full flex items-center justify-center">
                        <span class="text-xl">🎯</span>
                    </div>
                </div>
                <div class="text-3xl font-bold text-gray-900">89%</div>
                <div class="text-sm text-gray-600">Overall typing accuracy</div>
            </div>
        </div>

        <!-- Quick Actions & Recent Activity -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Quick Actions -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h3>
                <div class="space-y-3">
                    <a href="#" class="block w-full text-center px-6 py-3 border border-transparent rounded-full font-semibold text-white uppercase tracking-widest bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Create New Batch
                    </a>
                    <a href="#" class="block w-full text-center px-6 py-3 border border-gray-300 rounded-full font-semibold text-gray-700 uppercase tracking-widest bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Add Students
                    </a>
                    <a href="#" class="block w-full text-center px-6 py-3 border border-gray-300 rounded-full font-semibold text-gray-700 uppercase tracking-widest bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Generate Reports
                    </a>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Recent Activity</h3>
                <div class="space-y-4">
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <span>👥</span>
                        </div>
                        <div>
                            <div class="text-sm font-medium text-gray-900">New student registered</div>
                            <div class="text-sm text-gray-600">Sarah Johnson joined Batch A</div>
                            <div class="text-xs text-gray-400">2 hours ago</div>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <span>🏆</span>
                        </div>
                        <div>
                            <div class="text-sm font-medium text-gray-900">Certificate issued</div>
                            <div class="text-sm text-gray-600">John Doe completed Intermediate level</div>
                            <div class="text-xs text-gray-400">5 hours ago</div>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <span>📊</span>
                        </div>
                        <div>
                            <div class="text-sm font-medium text-gray-900">Progress update</div>
                            <div class="text-sm text-gray-600">Batch B average WPM improved to 42</div>
                            <div class="text-xs text-gray-400">1 day ago</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Batch Overview -->
        <div class="bg-white rounded-2xl shadow-lg p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Batch Overview</h3>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">Batch Name</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">Students</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">Avg WPM</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">Avg Accuracy</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">Progress</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <tr>
                            <td class="px-4 py-3 text-sm text-gray-900">Batch A (Beginner)</td>
                            <td class="px-4 py-3 text-sm text-gray-600">32</td>
                            <td class="px-4 py-3 text-sm font-medium text-blue-600">35 WPM</td>
                            <td class="px-4 py-3 text-sm font-medium text-green-600">88%</td>
                            <td class="px-4 py-3">
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-blue-500 h-2 rounded-full" style="width: 45%"></div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-sm text-gray-900">Batch B (Intermediate)</td>
                            <td class="px-4 py-3 text-sm text-gray-600">28</td>
                            <td class="px-4 py-3 text-sm font-medium text-blue-600">42 WPM</td>
                            <td class="px-4 py-3 text-sm font-medium text-green-600">91%</td>
                            <td class="px-4 py-3">
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-purple-500 h-2 rounded-full" style="width: 65%"></div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-sm text-gray-900">Batch C (Advanced)</td>
                            <td class="px-4 py-3 text-sm text-gray-600">15</td>
                            <td class="px-4 py-3 text-sm font-medium text-blue-600">58 WPM</td>
                            <td class="px-4 py-3 text-sm font-medium text-green-600">94%</td>
                            <td class="px-4 py-3">
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-green-500 h-2 rounded-full" style="width: 85%"></div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection