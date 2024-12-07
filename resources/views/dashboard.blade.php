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
                            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                            </svg>
                            <span class="sr-only">Alert</span>
                            <div>
                                <span class="font-medium">{{ session('error') }}</span> 
                            </div>
                        </div>
                        @endif

                        @foreach ($articles as $article)
                                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4">
                                    <div class="p-6 text-gray-900">
                                        <h2 class="text-2xl font-bold">{{ $article->title }}</h2>
                                        <p class="text-gray-700">{{ substr($article->content, 0, 30) }}...</p>
                                        <div class="text-right">
                                            <a href="{{ route('articles.edit', $article->id) }}" class="text-purple-600 hover:text-purple-700">Edit</a>
                                        </div>
                                        <div class="text-right">
                                            <a href="{{ route('articles.remove', $article->id) }}" class="text-red-600 hover:text-red-700">Delete</a>
                                        </div>
                                    </div>
                                </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</x-app-layout>
