@extends('layouts.base')

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-blue-50 to-purple-50 py-20 fade-in-up">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
                    Privacy Policy
                </h1>
                <p class="text-xl text-gray-600 mb-4">
                    Last Updated: {{ date('F j, Y') }}
                </p>
                <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4 rounded-md mt-6">
                    <p class="text-sm">
                        <strong>Important Note:</strong> This Privacy Policy is a general template and does not constitute legal advice. Please consult a legal professional for compliance with your local laws.
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
                    At abctyping, we respect your privacy and are committed to protecting your personal information. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you use our typing learning platform and services.
                </p>

                <h2 class="text-3xl font-bold text-gray-900 mb-6 mt-12">Information We Collect</h2>

                <h3 class="text-xl font-semibold text-gray-900 mb-4">Account Information</h3>
                <ul class="list-disc list-inside space-y-2 text-gray-600 mb-6">
                    <li>Name and contact information (email address)</li>
                    <li>Account credentials (password is stored securely using industry-standard hashing)</li>
                    <li>Profile information (username, avatar, preferences)</li>
                </ul>

                <h3 class="text-xl font-semibold text-gray-900 mb-4">Usage Data</h3>
                <ul class="list-disc list-inside space-y-2 text-gray-600 mb-6">
                    <li>Typing lessons completed and progress data</li>
                    <li>Typing speed, accuracy, and performance statistics</li>
                    <li>Badges, achievements, and certificates earned</li>
                    <li>Time spent on the platform and activity logs</li>
                    <li>Device and browser information</li>
                </ul>

                <h3 class="text-xl font-semibold text-gray-900 mb-4">Institution-Related Data</h3>
                <ul class="list-disc list-inside space-y-2 text-gray-600 mb-8">
                    <li>Institution name and contact information (for school/organization accounts)</li>
                    <li>Batch and class information</li>
                    <li>Student progress reports and analytics</li>
                </ul>

                <h2 class="text-3xl font-bold text-gray-900 mb-6 mt-12">How We Use Your Information</h2>

                <ul class="list-disc list-inside space-y-4 text-gray-600 mb-8">
                    <li><strong>To provide and improve our services:</strong> We use your information to deliver the typing learning platform, personalize your experience, and enhance our features.</li>
                    <li><strong>To track progress and generate reports:</strong> We analyze your typing data to provide progress tracking, generate certificates, and create performance reports.</li>
                    <li><strong>To issue badges and certificates:</strong> We use your achievement data to award badges and generate certificates for completed levels and courses.</li>
                    <li><strong>For communication:</strong> We may send you emails regarding your account, platform updates, and important notices. You can opt out of non-essential communications.</li>
                    <li><strong>For platform analytics:</strong> We analyze usage patterns to improve our services and understand how users interact with our platform.</li>
                </ul>

                <h2 class="text-3xl font-bold text-gray-900 mb-6 mt-12">Cookies & Tracking Technologies</h2>

                <p class="text-gray-600 mb-4">
                    We use cookies and similar tracking technologies to enhance your experience on our platform. These technologies help us:
                </p>
                <ul class="list-disc list-inside space-y-2 text-gray-600 mb-6">
                    <li>Remember your preferences and settings</li>
                    <li>Maintain your logged-in session</li>
                    <li>Analyze platform usage and performance</li>
                    <li>Provide personalized content and recommendations</li>
                </ul>
                <p class="text-gray-600 mb-8">
                    You can control cookies through your browser settings, but some features may not function properly if cookies are disabled.
                </p>

                <h2 class="text-3xl font-bold text-gray-900 mb-6 mt-12">Data Sharing & Third Parties</h2>

                <p class="text-gray-600 mb-4">
                    We do not sell your personal information. We may share your data with:
                </p>
                <ul class="list-disc list-inside space-y-2 text-gray-600 mb-6">
                    <li><strong>Service providers:</strong> We may share information with third-party vendors who help us operate our platform (hosting, email delivery, analytics, etc.).</li>
                    <li><strong>Institutions:</strong> If you are part of a school or organization account, your progress data may be shared with your institution administrators.</li>
                    <li><strong>Legal compliance:</strong> We may disclose information when required by law or to protect our rights and safety.</li>
                </ul>

                <h2 class="text-3xl font-bold text-gray-900 mb-6 mt-12">Data Security</h2>

                <p class="text-gray-600 mb-4">
                    We implement reasonable security measures to protect your personal information, including:
                </p>
                <ul class="list-disc list-inside space-y-2 text-gray-600 mb-8">
                    <li>Encryption of sensitive data in transit and at rest</li>
                    <li>Access controls and authentication mechanisms</li>
                    <li>Regular security audits and vulnerability assessments</li>
                    <li>Secure data storage practices</li>
                </ul>

                <h2 class="text-3xl font-bold text-gray-900 mb-6 mt-12">Data Retention</h2>

                <p class="text-gray-600 mb-4">
                    We retain your personal information for as long as necessary to provide our services and fulfill the purposes described in this policy, unless a longer retention period is required by law.
                </p>
                <ul class="list-disc list-inside space-y-2 text-gray-600 mb-8">
                    <li>Account information is retained as long as your account is active</li>
                    <li>Typing progress data is retained to provide continuity of service</li>
                    <li>You can request account deletion, which will remove your personal data</li>
                </ul>

                <h2 class="text-3xl font-bold text-gray-900 mb-6 mt-12">Children's Privacy</h2>

                <p class="text-gray-600 mb-4">
                    Our platform is designed for users of all ages, including students. Depending on your jurisdiction, parental or institutional consent may be required for users under a certain age.
                </p>
                <ul class="list-disc list-inside space-y-2 text-gray-600 mb-8">
                    <li>We encourage parents and guardians to be involved in their children's online activities</li>
                    <li>Institutions using our platform are responsible for obtaining appropriate consent</li>
                    <li>We do not knowingly collect personal information from children without proper consent</li>
                </ul>

                <h2 class="text-3xl font-bold text-gray-900 mb-6 mt-12">Your Rights & Choices</h2>

                <p class="text-gray-600 mb-4">
                    You have certain rights regarding your personal information:
                </p>
                <ul class="list-disc list-inside space-y-2 text-gray-600 mb-8">
                    <li><strong>Access and update:</strong> You can access and update your account information through your profile settings.</li>
                    <li><strong>Data deletion:</strong> You can request deletion of your account and personal data.</li>
                    <li><strong>Communication preferences:</strong> You can opt out of non-essential communications.</li>
                    <li><strong>Data portability:</strong> You can request a copy of your data in a structured format.</li>
                </ul>

                <h2 class="text-3xl font-bold text-gray-900 mb-6 mt-12">Contact Information</h2>

                <p class="text-gray-600 mb-4">
                    If you have any questions about this Privacy Policy or our data practices, please contact us at:
                </p>
                <p class="text-gray-600 mb-8">
                    <a href="mailto:privacy@abctyping.com" class="text-blue-600 hover:text-blue-800 font-medium">
                        privacy@abctyping.com
                    </a>
                </p>

                <h2 class="text-3xl font-bold text-gray-900 mb-6 mt-12">Changes to This Policy</h2>

                <p class="text-gray-600 mb-8">
                    We may update this Privacy Policy from time to time. We will notify you of any significant changes by posting the new policy on this page and updating the "Last Updated" date. We encourage you to review this policy periodically.
                </p>

                <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4 rounded-md mt-12">
                    <p class="text-sm">
                        <strong>Important Note:</strong> This Privacy Policy is a general template and does not constitute legal advice. Please consult a legal professional for compliance with your local laws.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection