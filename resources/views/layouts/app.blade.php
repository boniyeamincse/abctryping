<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ABC Typing') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gradient-to-br from-gray-50 to-blue-50">
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50">
        <!-- Top Navbar -->
        <nav class="bg-white border-b border-gray-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                            <a href="{{ route('home') }}" class="text-xl font-bold text-gray-800 flex items-center gap-2">
                                <span class="w-8 h-8 bg-gradient-primary rounded-lg flex items-center justify-center text-white font-bold">AT</span>
                                <span>ABC Typing</span>
                            </a>
                        </div>

                        <!-- Navigation Links -->
                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                            @auth
                                @php
                                    $user = Auth::user();
                                @endphp

                                @if($user->role === 'user')
                                    <a href="{{ route('dashboard.user') }}" class="text-sm font-medium text-gray-600 hover:text-primary-600 transition-colors duration-200 {{ request()->routeIs('dashboard.user') ? 'text-primary-600 font-semibold' : '' }}">
                                        Dashboard
                                    </a>
                                    <a href="#" class="text-sm font-medium text-gray-600 hover:text-primary-600 transition-colors duration-200">
                                        Levels
                                    </a>
                                    <a href="#" class="text-sm font-medium text-gray-600 hover:text-primary-600 transition-colors duration-200">
                                        Practice
                                    </a>
                                    <a href="#" class="text-sm font-medium text-gray-600 hover:text-primary-600 transition-colors duration-200">
                                        Badges
                                    </a>
                                    <a href="#" class="text-sm font-medium text-gray-600 hover:text-primary-600 transition-colors duration-200">
                                        Certificates
                                    </a>
                                @elseif($user->role === 'institution_admin')
                                    <a href="{{ route('dashboard.institution-admin') }}" class="text-sm font-medium text-gray-600 hover:text-primary-600 transition-colors duration-200 {{ request()->routeIs('dashboard.institution-admin') ? 'text-primary-600 font-semibold' : '' }}">
                                        Dashboard
                                    </a>
                                    <a href="#" class="text-sm font-medium text-gray-600 hover:text-primary-600 transition-colors duration-200">
                                        Batches
                                    </a>
                                    <a href="#" class="text-sm font-medium text-gray-600 hover:text-primary-600 transition-colors duration-200">
                                        Students
                                    </a>
                                    <a href="#" class="text-sm font-medium text-gray-600 hover:text-primary-600 transition-colors duration-200">
                                        Reports
                                    </a>
                                @elseif($user->role === 'teacher')
                                    <a href="{{ route('dashboard.teacher') }}" class="text-sm font-medium text-gray-600 hover:text-primary-600 transition-colors duration-200 {{ request()->routeIs('dashboard.teacher') ? 'text-primary-600 font-semibold' : '' }}">
                                        Dashboard
                                    </a>
                                    <a href="#" class="text-sm font-medium text-gray-600 hover:text-primary-600 transition-colors duration-200">
                                        My Batches
                                    </a>
                                    <a href="#" class="text-sm font-medium text-gray-600 hover:text-primary-600 transition-colors duration-200">
                                        My Students
                                    </a>
                                @elseif($user->role === 'super_admin')
                                    <a href="{{ route('dashboard.super-admin') }}" class="text-sm font-medium text-gray-600 hover:text-primary-600 transition-colors duration-200 {{ request()->routeIs('dashboard.super-admin') ? 'text-primary-600 font-semibold' : '' }}">
                                        Dashboard
                                    </a>
                                    <a href="#" class="text-sm font-medium text-gray-600 hover:text-primary-600 transition-colors duration-200">
                                        Institutions
                                    </a>
                                    <a href="#" class="text-sm font-medium text-gray-600 hover:text-primary-600 transition-colors duration-200">
                                        Users
                                    </a>
                                    <a href="#" class="text-sm font-medium text-gray-600 hover:text-primary-600 transition-colors duration-200">
                                        Packages
                                    </a>
                                    <a href="#" class="text-sm font-medium text-gray-600 hover:text-primary-600 transition-colors duration-200">
                                        System Settings
                                    </a>
                                @endif
                            @else
                                <a href="{{ route('home') }}" class="text-sm font-medium text-gray-600 hover:text-gray-900 {{ request()->routeIs('home') ? 'text-gray-900' : '' }}">
                                    Home
                                </a>
                            @endauth
                        </div>
                    </div>

                    <!-- Auth Links -->
                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        @guest
                            <a href="{{ route('login') }}" class="text-sm font-medium text-gray-600 hover:text-gray-900">
                                Login
                            </a>
                            <a href="{{ route('register') }}" class="ml-4 text-sm font-medium text-gray-600 hover:text-primary-600 transition-colors duration-200">
                                Register
                            </a>
                        @else
                            <div class="flex items-center">
                                <span class="text-sm font-medium text-gray-600 mr-4">
                                    Welcome, {{ Auth::user()->name }}
                                </span>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="text-sm font-medium text-gray-600 hover:text-gray-900">
                                        Logout
                                    </button>
                                </form>
                            </div>
                        @endguest
                    </div>

                    <!-- Mobile menu button -->
                    <div class="-me-2 flex items-center sm:hidden">
                        <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out" aria-controls="mobile-menu" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile menu, show/hide based on menu state. -->
            <div class="sm:hidden" id="mobile-menu">
                <div class="pt-2 pb-3 space-y-1">
                    @auth
                        @php
                            $user = Auth::user();
                        @endphp

                        @if($user->role === 'user')
                            <a href="{{ route('dashboard.user') }}" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 transition duration-150 ease-in-out {{ request()->routeIs('dashboard.user') ? 'border-primary-500 text-primary-700 bg-primary-50' : '' }}">
                                Dashboard
                            </a>
                            <a href="#" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 transition duration-150 ease-in-out">
                                Levels
                            </a>
                            <a href="#" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 transition duration-150 ease-in-out">
                                Practice
                            </a>
                            <a href="#" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 transition duration-150 ease-in-out">
                                Badges
                            </a>
                            <a href="#" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 transition duration-150 ease-in-out">
                                Certificates
                            </a>
                        @elseif($user->role === 'institution_admin')
                            <a href="{{ route('dashboard.institution-admin') }}" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 transition duration-150 ease-in-out {{ request()->routeIs('dashboard.institution-admin') ? 'border-primary-500 text-primary-700 bg-primary-50' : '' }}">
                                Dashboard
                            </a>
                            <a href="#" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 transition duration-150 ease-in-out">
                                Batches
                            </a>
                            <a href="#" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 transition duration-150 ease-in-out">
                                Students
                            </a>
                            <a href="#" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 transition duration-150 ease-in-out">
                                Reports
                            </a>
                        @elseif($user->role === 'teacher')
                            <a href="{{ route('dashboard.teacher') }}" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 transition duration-150 ease-in-out {{ request()->routeIs('dashboard.teacher') ? 'border-primary-500 text-primary-700 bg-primary-50' : '' }}">
                                Dashboard
                            </a>
                            <a href="#" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 transition duration-150 ease-in-out">
                                My Batches
                            </a>
                            <a href="#" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 transition duration-150 ease-in-out">
                                My Students
                            </a>
                        @elseif($user->role === 'super_admin')
                            <a href="{{ route('dashboard.super-admin') }}" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 transition duration-150 ease-in-out {{ request()->routeIs('dashboard.super-admin') ? 'border-primary-500 text-primary-700 bg-primary-50' : '' }}">
                                Dashboard
                            </a>
                            <a href="#" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 transition duration-150 ease-in-out">
                                Institutions
                            </a>
                            <a href="#" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 transition duration-150 ease-in-out">
                                Users
                            </a>
                            <a href="#" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 transition duration-150 ease-in-out">
                                Packages
                            </a>
                            <a href="#" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 transition duration-150 ease-in-out">
                                System Settings
                            </a>
                        @endif

                        <div class="border-t border-gray-200 pt-4 pb-3">
                            <div class="flex items-center px-4">
                                <div class="flex-shrink-0">
                                    <span class="text-sm font-medium text-gray-500">{{ Auth::user()->name }}</span>
                                </div>
                            </div>
                            <div class="mt-3 space-y-1">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 transition duration-150 ease-in-out">
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('home') }}" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 transition duration-150 ease-in-out {{ request()->routeIs('home') ? 'border-primary-500 text-primary-700 bg-primary-50' : '' }}">
                            Home
                        </a>
                        <a href="{{ route('login') }}" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 transition duration-150 ease-in-out">
                            Login
                        </a>
                        <a href="{{ route('register') }}" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 transition duration-150 ease-in-out">
                            Register
                        </a>
                    @endguest
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @yield('content')
            </div>
        </main>

        <!-- Footer -->
        @include('components.footer')
    </div>
</body>
</html>
