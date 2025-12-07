<!-- Footer Component -->
<footer class="bg-gray-900 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
            <!-- Product Column -->
            <div>
                <h3 class="text-xl font-bold mb-4">Product</h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('home') }}" class="text-gray-400 hover:text-white transition-colors duration-200">Home</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-200">Levels</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-200">Practice</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-200">Contests</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-200">Certification</a></li>
                </ul>
            </div>

            <!-- Company Column -->
            <div>
                <h3 class="text-xl font-bold mb-4">Company</h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('about') }}" class="text-gray-400 hover:text-white transition-colors duration-200">About</a></li>
                    <li><a href="{{ route('contact') }}" class="text-gray-400 hover:text-white transition-colors duration-200">Contact</a></li>
                    <li><a href="{{ route('privacy-policy') }}" class="text-gray-400 hover:text-white transition-colors duration-200">Privacy Policy</a></li>
                    <li><a href="{{ route('terms-of-service') }}" class="text-gray-400 hover:text-white transition-colors duration-200">Terms of Service</a></li>
                </ul>
            </div>

            <!-- Social Column -->
            <div>
                <h3 class="text-xl font-bold mb-4">Social</h3>
                <ul class="space-y-2">
                    <li>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors duration-200 flex items-center gap-2">
                            <span>📘</span> Facebook
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors duration-200 flex items-center gap-2">
                            <span>💼</span> LinkedIn
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="border-t border-gray-800 pt-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="flex items-center gap-2 mb-4 md:mb-0">
                    <span class="w-8 h-8 bg-gradient-primary rounded-lg flex items-center justify-center text-white font-bold">AT</span>
                    <span class="text-xl font-bold">abctyping</span>
                </div>
                <p class="text-gray-400 text-sm text-center md:text-right">
                    © {{ date('Y') }} abctyping. All rights reserved.
                </p>
            </div>
            <p class="text-gray-500 text-xs mt-4 text-center">
                Learn. Practice. Master Typing — Step by Step.
            </p>
        </div>
    </div>
</footer>