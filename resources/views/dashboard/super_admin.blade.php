@extends('layouts.app')

@section('content')
    <div class="space-y-8">
        <!-- Dashboard Header -->
        <div class="bg-white rounded-2xl shadow-lg p-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Super Admin Dashboard</h1>
            <p class="text-gray-600">Manage the entire abctyping platform and monitor system performance.</p>
        </div>

        <!-- System Metrics -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Total Users -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-900">Total Users</h3>
                    <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                        <span class="text-xl">👥</span>
                    </div>
                </div>
                <div class="text-3xl font-bold text-gray-900">1,248</div>
                <div class="text-sm text-green-600 flex items-center gap-1">
                    <span>↗</span> 8% growth
                </div>
            </div>

            <!-- Total Institutions -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-900">Institutions</h3>
                    <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center">
                        <span class="text-xl">🏫</span>
                    </div>
                </div>
                <div class="text-3xl font-bold text-gray-900">42</div>
                <div class="text-sm text-blue-600 flex items-center gap-1">
                    <span>→</span> 5 premium
                </div>
            </div>

            <!-- Active Subscriptions -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-900">Active Subscriptions</h3>
                    <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                        <span class="text-xl">💳</span>
                    </div>
                </div>
                <div class="text-3xl font-bold text-gray-900">87</div>
                <div class="text-sm text-gray-600">$4,250 MRR</div>
            </div>

            <!-- System Health -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-900">System Health</h3>
                    <div class="w-10 h-10 bg-orange-100 rounded-full flex items-center justify-center">
                        <span class="text-xl">⚡</span>
                    </div>
                </div>
                <div class="text-3xl font-bold text-green-600">98%</div>
                <div class="text-sm text-gray-600">Uptime: 30 days</div>
            </div>
        </div>

        <!-- Quick Actions & System Stats -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Quick Actions -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h3>
                <div class="space-y-3">
                    <a href="#" class="block w-full text-center px-6 py-3 border border-transparent rounded-full font-semibold text-white uppercase tracking-widest bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Manage Institutions
                    </a>
                    <a href="#" class="block w-full text-center px-6 py-3 border border-gray-300 rounded-full font-semibold text-gray-700 uppercase tracking-widest bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        User Management
                    </a>
                    <a href="#" class="block w-full text-center px-6 py-3 border border-gray-300 rounded-full font-semibold text-gray-700 uppercase tracking-widest bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        System Settings
                    </a>
                    <a href="#" class="block w-full text-center px-6 py-3 border border-gray-300 rounded-full font-semibold text-gray-700 uppercase tracking-widest bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        View Analytics
                    </a>
                </div>
            </div>

            <!-- System Statistics -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">System Statistics</h3>
                <div class="space-y-4">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                <span>📊</span>
                            </div>
                            <span class="text-sm text-gray-600">Total Lessons Completed</span>
                        </div>
                        <span class="font-semibold text-gray-900">18,452</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center">
                                <span>🏆</span>
                            </div>
                            <span class="text-sm text-gray-600">Certificates Issued</span>
                        </div>
                        <span class="font-semibold text-gray-900">2,348</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                                <span>⚡</span>
                            </div>
                            <span class="text-sm text-gray-600">Avg System WPM</span>
                        </div>
                        <span class="font-semibold text-gray-900">42 WPM</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 bg-orange-100 rounded-full flex items-center justify-center">
                                <span>👥</span>
                            </div>
                            <span class="text-sm text-gray-600">Active Users (30d)</span>
                        </div>
                        <span class="font-semibold text-gray-900">842</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Institution Overview -->
        <div class="bg-white rounded-2xl shadow-lg p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Institution Overview</h3>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">Institution</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">Students</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">Plan</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">Status</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">Join Date</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <tr>
                            <td class="px-4 py-3 text-sm text-gray-900">Tech High School</td>
                            <td class="px-4 py-3 text-sm text-gray-600">128</td>
                            <td class="px-4 py-3 text-sm font-medium text-green-600">Premium</td>
                            <td class="px-4 py-3 text-sm font-medium text-green-600">Active</td>
                            <td class="px-4 py-3 text-sm text-gray-600">Jan 15, 2023</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-sm text-gray-900">City College</td>
                            <td class="px-4 py-3 text-sm text-gray-600">87</td>
                            <td class="px-4 py-3 text-sm font-medium text-blue-600">Standard</td>
                            <td class="px-4 py-3 text-sm font-medium text-green-600">Active</td>
                            <td class="px-4 py-3 text-sm text-gray-600">Mar 10, 2023</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-sm text-gray-900">Global Training Center</td>
                            <td class="px-4 py-3 text-sm text-gray-600">45</td>
                            <td class="px-4 py-3 text-sm font-medium text-purple-600">Enterprise</td>
                            <td class="px-4 py-3 text-sm font-medium text-green-600">Active</td>
                            <td class="px-4 py-3 text-sm text-gray-600">Jun 5, 2023</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-sm text-gray-900">Bright Future Academy</td>
                            <td class="px-4 py-3 text-sm text-gray-600">62</td>
                            <td class="px-4 py-3 text-sm font-medium text-blue-600">Standard</td>
                            <td class="px-4 py-3 text-sm font-medium text-yellow-600">Trial</td>
                            <td class="px-4 py-3 text-sm text-gray-600">Nov 18, 2023</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- User Growth Chart -->
        <div class="bg-white rounded-2xl shadow-lg p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">User Growth (Last 6 Months)</h3>
            <div class="h-64 bg-gray-50 rounded-lg flex items-center justify-center">
                <div class="text-center text-gray-500">
                    <div class="text-4xl mb-2">📈</div>
                    <p class="text-lg">Interactive Chart Placeholder</p>
                    <p class="text-sm">Chart.js or similar library integration</p>
                </div>
            </div>
        </div>

        <!-- System Alerts -->
        <div class="bg-white rounded-2xl shadow-lg p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">System Alerts</h3>
            <div class="space-y-3">
                <div class="flex items-center justify-between p-3 bg-blue-50 rounded-lg border-l-4 border-blue-500">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                            <span>ℹ️</span>
                        </div>
                        <div>
                            <div class="text-sm font-medium text-blue-800">System update available</div>
                            <div class="text-xs text-blue-600">Version 2.1.3 ready for deployment</div>
                        </div>
                    </div>
                    <a href="#" class="text-sm text-blue-600 hover:text-blue-800 font-medium">Update</a>
                </div>
                <div class="flex items-center justify-between p-3 bg-green-50 rounded-lg border-l-4 border-green-500">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                            <span>✅</span>
                        </div>
                        <div>
                            <div class="text-sm font-medium text-green-800">All systems operational</div>
                            <div class="text-xs text-green-600">No critical issues detected</div>
                        </div>
                    </div>
                    <a href="#" class="text-sm text-green-600 hover:text-green-800 font-medium">View</a>
                </div>
                <div class="flex items-center justify-between p-3 bg-yellow-50 rounded-lg border-l-4 border-yellow-500">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-yellow-100 rounded-full flex items-center justify-center">
                            <span>⚠️</span>
                        </div>
                        <div>
                            <div class="text-sm font-medium text-yellow-800">3 pending institution requests</div>
                            <div class="text-xs text-yellow-600">Requires admin approval</div>
                        </div>
                    </div>
                    <a href="#" class="text-sm text-yellow-600 hover:text-yellow-800 font-medium">Review</a>
                </div>
            </div>
        </div>
    </div>
@endsection