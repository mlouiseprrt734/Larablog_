<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

                <div class="max-w-2xl text-center mx-auto mt-10 mb-10 lg:mb-14">
                    <h2 class="text-2xl font-bold md:text-4xl md:leading-tight dark:text-white">Create or edit your articles</h2>
                    <p class="mt-1 text-gray-600 dark:text-neutral-400">Inspire people with your articles</p>
                </div>
                @if ($articles->isEmpty())
                    <p class="text-center text-gray-500 dark:text-neutral-400">No articles available. Start by creating some!</p>
                @endif

                <!-- Message flash Success-->
                @if (session('success'))
                    <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
                        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                            <span class="font-medium">Success alert!</span> {{ session('success') }}
                        </div>
                    </div>
                @endif

                <!-- Message flash Error -->
                @if (session('error'))
                    <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
                        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <span class="sr-only">Alert</span>
                        <div>
                            <span class="font-medium">{{ session('error') }}</span> 
                        </div>
                    </div>
                @endif

        @foreach ($articles as $article)                
        <div class="max-w-2xl mx-auto bg-white border rounded-lg shadow-sm sm:flex sm:items-center dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
            <!-- Image Section -->
            <div class="relative shrink-0 w-24 h-24 rounded-l-lg overflow-hidden sm:w-32 sm:h-32">
                <img class="absolute top-0 left-0 w-full h-full object-cover" src="{{$article->link_image}}" alt="Card Image">
            </div>

            <!-- Content Section -->
            <div class="flex flex-col justify-between p-3 space-y-2 sm:space-y-0 sm:flex-1">
                <!-- Title and Content -->
                <div>
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-white truncate">
                        {{$article->title}}
                    </h3>
                    <p class="text-base text-gray-500 dark:text-neutral-400 line-clamp-2">
                        {{ substr($article->content, 0, 80) }}...
                    </p>
                </div>

                <!-- Action Buttons -->
                <div class="flex space-x-4 text-base">
                    <a href="{{ route('articles.edit', $article->id) }}" class="text-purple-500 hover:underline dark:text-purple-400">
                        Update
                    </a>
                    <a href="{{ route('articles.remove', $article->id) }}" class="text-red-500 hover:underline dark:text-red-400">
                        Delete
                    </a>
                </div>
            </div>
        </div>
        <br>
        @endforeach
</x-app-layout>
