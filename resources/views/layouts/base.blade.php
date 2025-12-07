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
                            <a href="{{ route('home') }}" class="text-sm font-medium text-gray-600 hover:text-gray-900 {{ request()->routeIs('home') ? 'text-gray-900' : '' }}">
                                Home
                            </a>
                            <a href="{{ route('about') }}" class="text-sm font-medium text-gray-600 hover:text-primary-600 transition-colors duration-200 {{ request()->routeIs('about') ? 'text-primary-600 font-semibold' : '' }}">
                                About
                            </a>
                            <a href="{{ route('contact') }}" class="text-sm font-medium text-gray-600 hover:text-primary-600 transition-colors duration-200 {{ request()->routeIs('contact') ? 'text-primary-600 font-semibold' : '' }}">
                                Contact
                            </a>
                            @auth
                                <a href="{{ route('dashboard') }}" class="text-sm font-medium text-gray-600 hover:text-primary-600 transition-colors duration-200 {{ request()->routeIs('dashboard') ? 'text-primary-600 font-semibold' : '' }}">
                                    Dashboard
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