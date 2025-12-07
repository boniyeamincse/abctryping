@extends('layouts.base')

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-blue-50 to-purple-50 py-20 fade-in-up">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
                    Terms of Service
                </h1>
                <p class="text-xl text-gray-600 mb-4">
                    Last Updated: {{ date('F j, Y') }}
                </p>
                <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4 rounded-md mt-6">
                    <p class="text-sm">
                        <strong>Important Note:</strong> These Terms of Service are a general template and do not constitute legal advice. Please consult a legal professional before using this in production.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-20 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="prose prose-lg max-w-none">
                <p class="text-lg text-gray-600 mb-8">
                    Welcome to abctyping! By accessing or using our typing learning platform, you agree to be bound by these Terms of Service. Please read them carefully.
                </p>

                <h2 class="text-3xl font-bold text-gray-900 mb-6 mt-12">Acceptance of Terms</h2>

                <p class="text-gray-600 mb-8">
                    By creating an account or using our services, you acknowledge that you have read, understood, and agree to be bound by these Terms of Service. If you do not agree with these terms, please do not use our platform.
                </p>

                <h2 class="text-3xl font-bold text-gray-900 mb-6 mt-12">Description of Service</h2>

                <p class="text-gray-600 mb-4">
                    abctyping provides an online typing learning platform that includes:
                </p>
                <ul class="list-disc list-inside space-y-2 text-gray-600 mb-8">
                    <li>Structured typing lessons from Beginner to Expert levels</li>
                    <li>Interactive typing practice and speed tests</li>
                    <li>Progress tracking and performance analytics</li>
                    <li>Badges, achievements, and certificates for completed milestones</li>
                    <li>Institution management tools for schools and training centers</li>
                    <li>Typing contests and leaderboards</li>
                </ul>

                <h2 class="text-3xl font-bold text-gray-900 mb-6 mt-12">User Accounts</h2>

                <p class="text-gray-600 mb-4">
                    To use certain features of our platform, you may need to create a user account. You agree to:
                </p>
                <ul class="list-disc list-inside space-y-2 text-gray-600 mb-8">
                    <li>Provide accurate and complete information during registration</li>
                    <li>Keep your account credentials secure and confidential</li>
                    <li>Not share your account with others</li>
                    <li>Update your information to keep it current and accurate</li>
                    <li>Be responsible for all activities that occur under your account</li>
                </ul>

                <h2 class="text-3xl font-bold text-gray-900 mb-6 mt-12">Use of the Platform</h2>

                <p class="text-gray-600 mb-4">
                    You agree to use abctyping only for lawful purposes and in accordance with these terms. You may not:
                </p>
                <ul class="list-disc list-inside space-y-2 text-gray-600 mb-8">
                    <li>Use the platform for any illegal or unauthorized purpose</li>
                    <li>Attempt to interfere with or disrupt the platform's functionality</li>
                    <li>Use automated scripts or bots to access or interact with the platform</li>
                    <li>Cheat or manipulate typing tests, contests, or leaderboards</li>
                    <li>Attempt to gain unauthorized access to any portion of the platform</li>
                    <li>Transmit any viruses, malware, or harmful code</li>
                    <li>Engage in any activity that could harm other users or the platform</li>
                </ul>

                <h2 class="text-3xl font-bold text-gray-900 mb-6 mt-12">Subscriptions & Payments</h2>

                <p class="text-gray-600 mb-4">
                    While we offer free basic functionality, some advanced features may require payment:
                </p>
                <ul class="list-disc list-inside space-y-2 text-gray-600 mb-8">
                    <li>We provide clear pricing information for premium features</li>
                    <li>Payments are processed through secure third-party payment processors</li>
                    <li>We reserve the right to change pricing with reasonable notice</li>
                    <li>Refunds are subject to our refund policy, which may vary by subscription type</li>
                    <li>You are responsible for all charges incurred under your account</li>
                </ul>

                <h2 class="text-3xl font-bold text-gray-900 mb-6 mt-12">Content & Intellectual Property</h2>

                <p class="text-gray-600 mb-4">
                    All content, design, logos, and intellectual property on abctyping are owned by us or our licensors. You agree that:
                </p>
                <ul class="list-disc list-inside space-y-2 text-gray-600 mb-8">
                    <li>You will not copy, reproduce, or distribute our content without permission</li>
                    <li>You will not use our trademarks or logos without authorization</li>
                    <li>You will not attempt to reverse engineer or copy our platform</li>
                    <li>You will not resell or redistribute our services</li>
                </ul>

                <h2 class="text-3xl font-bold text-gray-900 mb-6 mt-12">User-Generated Content</h2>

                <p class="text-gray-600 mb-4">
                    For any content you upload or create on our platform:
                </p>
                <ul class="list-disc list-inside space-y-2 text-gray-600 mb-8">
                    <li>You retain ownership of your content</li>
                    <li>You grant us a license to use, display, and distribute your content as needed to provide the service</li>
                    <li>You are responsible for ensuring your content doesn't violate others' rights</li>
                    <li>We may remove content that violates our policies</li>
                </ul>

                <h2 class="text-3xl font-bold text-gray-900 mb-6 mt-12">Limitation of Liability</h2>

                <p class="text-gray-600 mb-4">
                    To the fullest extent permitted by law, abctyping shall not be liable for:
                </p>
                <ul class="list-disc list-inside space-y-2 text-gray-600 mb-8">
                    <li>Any indirect, incidental, special, or consequential damages</li>
                    <li>Any interruption or cessation of service</li>
                    <li>Any loss of data or content</li>
                    <li>Any errors or omissions in content</li>
                    <li>Any third-party actions or content</li>
                </ul>
                <p class="text-gray-600 mb-8">
                    We do not guarantee that our platform will be error-free, uninterrupted, or completely secure. We strive to provide excellent service but cannot guarantee 100% uptime.
                </p>

                <h2 class="text-3xl font-bold text-gray-900 mb-6 mt-12">Termination</h2>

                <p class="text-gray-600 mb-4">
                    We may suspend or terminate your account or access to our platform if:
                </p>
                <ul class="list-disc list-inside space-y-2 text-gray-600 mb-8">
                    <li>You violate these Terms of Service</li>
                    <li>You engage in fraudulent or illegal activities</li>
                    <li>You fail to pay for premium services</li>
                    <li>We believe your use poses a risk to our platform or other users</li>
                </ul>
                <p class="text-gray-600 mb-8">
                    You may terminate your account at any time by contacting us or using the account deletion feature. Some data may be retained as required by law.
                </p>

                <h2 class="text-3xl font-bold text-gray-900 mb-6 mt-12">Governing Law</h2>

                <p class="text-gray-600 mb-8">
                    These Terms of Service are governed by and construed in accordance with the laws of the jurisdiction where abctyping operates. Any disputes arising from these terms will be subject to the exclusive jurisdiction of the courts in that jurisdiction.
                </p>

                <h2 class="text-3xl font-bold text-gray-900 mb-6 mt-12">Changes to These Terms</h2>

                <p class="text-gray-600 mb-8">
                    We may update these Terms of Service from time to time. We will notify you of significant changes by posting the updated terms on this page and updating the "Last Updated" date. Your continued use of the platform after such changes constitutes your acceptance of the new terms.
                </p>

                <h2 class="text-3xl font-bold text-gray-900 mb-6 mt-12">Contact Information</h2>

                <p class="text-gray-600 mb-4">
                    If you have any questions about these Terms of Service, please contact us at:
                </p>
                <p class="text-gray-600 mb-8">
                    <a href="mailto:legal@abctyping.com" class="text-blue-600 hover:text-blue-800 font-medium">
                        legal@abctyping.com
                    </a>
                </p>

                <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4 rounded-md mt-12">
                    <p class="text-sm">
                        <strong>Important Note:</strong> These Terms of Service are a general template and do not constitute legal advice. Please consult a legal professional before using this in production.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection