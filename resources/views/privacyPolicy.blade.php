<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-6 py-12">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg rounded-lg">
            <div class="p-6">
                <h1 class="text-3xl font-semibold text-gray-900 dark:text-gray-100">Privacy Policy</h1>
                <p class="mt-4 text-lg text-gray-700 dark:text-gray-300">
                    This Privacy Policy explains how I collect, use, and protect your personal information when you visit my website and interact with my services.
                </p>

                <div class="mt-8 space-y-6">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">1. Information I Collect</h2>
                    <p class="text-gray-700 dark:text-gray-300">
                        I collect personal information that you provide when you use the website, such as:
                    </p>
                    <ul class="list-disc pl-6 text-gray-700 dark:text-gray-300">
                        <li>Your name</li>
                        <li>Your email address</li>
                    </ul>

                    <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">2. How I Use Your Information</h2>
                    <p class="text-gray-700 dark:text-gray-300">
                        The information I collect is used to:
                    </p>
                    <ul class="list-disc pl-6 text-gray-700 dark:text-gray-300">
                        <li>Respond to inquiries or messages you send via the contact form</li>
                        <li>Provide you with updates and information regarding my services</li>
                        <li>Improve the overall user experience on my website</li>
                    </ul>

                    <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">3. Data Security</h2>
                    <p class="text-gray-700 dark:text-gray-300">
                        I take the security of your personal information seriously. I implement reasonable technical and organizational measures to protect your data from unauthorized access, alteration, or disclosure.
                    </p>

                    <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">4. Third-Party Services</h2>
                    <p class="text-gray-700 dark:text-gray-300">
                        I do not share your personal information with third-party services except as required by law or in cases where you have explicitly consented to such sharing.
                    </p>

                    <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">5. Your Rights</h2>
                    <p class="text-gray-700 dark:text-gray-300">
                        You have the right to:
                    </p>
                    <ul class="list-disc pl-6 text-gray-700 dark:text-gray-300">
                        <li>Access and correct your personal information</li>
                        <li>Request the deletion of your personal information</li>
                        <li>Object to or restrict the processing of your data</li>
                    </ul>

                    <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">6. Changes to This Policy</h2>
                    <p class="text-gray-700 dark:text-gray-300">
                        I reserve the right to update this Privacy Policy at any time. Any changes will be reflected on this page, and I encourage you to review it periodically.
                    </p>

                    <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">7. Contact Information</h2>
                    <p class="text-gray-700 dark:text-gray-300">
                        If you have any questions or concerns regarding this Privacy Policy, please feel free to contact me at <p class="text-blue-500">contach@larablog.com</a>.
                    </p>
                    
                    <p class="mt-6 text-gray-500 text-sm dark:text-gray-400">
                    Last updated: {{ date('F j, Y') }}
                </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>