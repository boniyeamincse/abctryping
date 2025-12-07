@extends('layouts.base')

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-blue-50 to-purple-50 py-20 fade-in-up">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
                    Contact Us
                </h1>
                <p class="text-xl text-gray-600 mb-8 max-w-3xl mx-auto">
                    Have questions, feedback, or want an institution demo? We'd love to hear from you.
                </p>
            </div>
        </div>
    </section>

    <!-- Contact Info Cards -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Email Support -->
                <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100 text-center">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-2xl">📧</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Email Support</h3>
                    <p class="text-gray-600 mb-4">For general inquiries and support</p>
                    <a href="mailto:support@abctyping.com" class="text-blue-600 hover:text-blue-800 font-medium">
                        support@abctyping.com
                    </a>
                </div>

                <!-- Institution Inquiries -->
                <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100 text-center">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-2xl">🏫</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Institution / Business Inquiries</h3>
                    <p class="text-gray-600 mb-4">For schools, training centers, and organizations</p>
                    <a href="mailto:institution@abctyping.com" class="text-purple-600 hover:text-purple-800 font-medium">
                        institution@abctyping.com
                    </a>
                </div>

                <!-- Phone Support -->
                <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100 text-center">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-2xl">📞</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Phone Support</h3>
                    <p class="text-gray-600 mb-4">Available Monday - Friday, 9AM - 5PM</p>
                    <p class="font-medium text-gray-800">+1 (555) 123-4567</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">Get in Touch</h2>
                    <p class="text-lg text-gray-600 mb-8">
                        Fill out the form below and we'll get back to you as soon as possible. Whether you have questions about our platform, need technical support, or want to discuss institution partnerships, we're here to help.
                    </p>

                    <!-- Success/Error Messages -->
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-md mb-6" role="alert">
                            <strong class="font-bold">Success!</strong>
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-md mb-6" role="alert">
                            <strong class="font-bold">Oops!</strong>
                            <span class="block sm:inline">Please fix the following errors:</span>
                            <ul class="mt-2 list-disc list-inside">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-lg">
                    <form method="POST" action="{{ route('contact.submit') }}" class="space-y-6">
                        @csrf

                        <!-- Name Field -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name *</label>
                            <input type="text" name="name" id="name" required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150"
                                   placeholder="Your full name" value="{{ old('name') }}">
                        </div>

                        <!-- Email Field -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                            <input type="email" name="email" id="email" required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150"
                                   placeholder="your@email.com" value="{{ old('email') }}">
                        </div>

                        <!-- Subject Dropdown -->
                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Subject *</label>
                            <select name="subject" id="subject" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150">
                                <option value="" disabled selected>Select a subject</option>
                                <option value="General" {{ old('subject') == 'General' ? 'selected' : '' }}>General Inquiry</option>
                                <option value="Technical Issue" {{ old('subject') == 'Technical Issue' ? 'selected' : '' }}>Technical Issue</option>
                                <option value="Institution Demo" {{ old('subject') == 'Institution Demo' ? 'selected' : '' }}>Institution Demo</option>
                                <option value="Other" {{ old('subject') == 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>

                        <!-- Message Field -->
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Message *</label>
                            <textarea name="message" id="message" rows="5" required
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150"
                                      placeholder="How can we help you?">{{ old('message') }}</textarea>
                        </div>

                        <!-- Submit Button -->
                        <div>
                            <button type="submit"
                                    class="w-full inline-flex items-center justify-center px-8 py-3 border border-transparent rounded-full font-semibold text-white uppercase tracking-widest bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Location / Map Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">Where We Are</h2>
                    <p class="text-lg text-gray-600 mb-6">
                        While we serve learners and institutions worldwide through our online platform, our team is based in:
                    </p>
                    <div class="bg-gray-50 p-6 rounded-2xl">
                        <h3 class="font-semibold text-gray-900 mb-2">abctyping Headquarters</h3>
                        <p class="text-gray-600 mb-1">123 Education Street</p>
                        <p class="text-gray-600 mb-1">Tech City, TC 10001</p>
                        <p class="text-gray-600 mb-4">United States</p>
                        <p class="text-gray-600">Our platform is available 24/7 for learners worldwide.</p>
                    </div>
                </div>
                <div class="bg-gray-100 rounded-2xl h-64 flex items-center justify-center">
                    <div class="text-center text-gray-500">
                        <div class="text-4xl mb-2">🗺️</div>
                        <p class="text-lg">Interactive Map Placeholder</p>
                        <p class="text-sm">Google Maps integration would be displayed here</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Teaser Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Frequently Asked Questions</h2>
                <p class="text-xl text-gray-600">Quick answers to common questions</p>
            </div>
            <div class="max-w-4xl mx-auto space-y-4">
                <!-- FAQ Item 1 -->
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <button class="w-full flex justify-between items-center text-left faq-toggle">
                        <h3 class="text-lg font-semibold text-gray-900">How do I get started with abctyping?</h3>
                        <span class="text-2xl text-gray-400 faq-icon">+</span>
                    </button>
                    <div class="faq-content hidden mt-4">
                        <p class="text-gray-600">Getting started is easy! Simply create a free account, choose your starting level, and begin your typing journey. Our structured lessons will guide you from Beginner to Expert.</p>
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <button class="w-full flex justify-between items-center text-left faq-toggle">
                        <h3 class="text-lg font-semibold text-gray-900">What are the pricing options for institutions?</h3>
                        <span class="text-2xl text-gray-400 faq-icon">+</span>
                    </button>
                    <div class="faq-content hidden mt-4">
                        <p class="text-gray-600">We offer custom pricing for educational institutions based on the number of students and features required. Please contact us for a personalized demo and quote.</p>
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <button class="w-full flex justify-between items-center text-left faq-toggle">
                        <h3 class="text-lg font-semibold text-gray-900">Can I use abctyping on multiple devices?</h3>
                        <span class="text-2xl text-gray-400 faq-icon">+</span>
                    </button>
                    <div class="faq-content hidden mt-4">
                        <p class="text-gray-600">Yes! abctyping is fully responsive and works on desktops, laptops, tablets, and mobile devices. Your progress is synced across all devices when you're logged in.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    // Simple FAQ accordion functionality
    document.addEventListener('DOMContentLoaded', function() {
        const faqToggles = document.querySelectorAll('.faq-toggle');

        faqToggles.forEach(toggle => {
            toggle.addEventListener('click', function() {
                const content = this.nextElementSibling;
                const icon = this.querySelector('.faq-icon');

                // Toggle current FAQ
                if (content.classList.contains('hidden')) {
                    content.classList.remove('hidden');
                    icon.textContent = '−';
                } else {
                    content.classList.add('hidden');
                    icon.textContent = '+';
                }
            });
        });
    });
</script>
@endpush