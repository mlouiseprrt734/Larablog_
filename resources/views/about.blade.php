<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-6 py-12">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg rounded-lg">
            <div class="p-6">
                <h1 class="text-3xl font-semibold text-gray-900 dark:text-gray-100">About Us</h1>
                <p class="mt-4 text-lg text-gray-700 dark:text-gray-300">
                    Welcome to Creative Blog, a space designed to inspire creators and help them share their work. Our platform is dedicated to fostering creativity and connecting like-minded individuals.
                </p>
                <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-gray-100">Our Purpose</h2>
                <p class="mt-4 text-lg text-gray-700 dark:text-gray-300">
                    Creative Blog is built with the purpose of sharing stories, articles, and projects that inspire our readers. Our mission is to empower creators by providing them a platform to showcase their work and connect with others.
                </p>

                <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-gray-100">What We Offer</h2>
                <p class="mt-4 text-lg text-gray-700 dark:text-gray-300">
                    We offer a place where writers, designers, developers, and other creatives can submit their work, gain feedback, and inspire one another. Whether you're looking for inspiration, feedback, or simply want to share your creations, Creative Blog is here for you.
                </p>
            </div>
        </div>
    </div>
</x-app-layout>