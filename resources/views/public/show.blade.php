<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- Blog Article -->
    <div class="max-w-3xl px-4 pt-6 lg:pt-10 pb-12 sm:px-6 lg:px-8 mx-auto">
        <div class="max-w-2xl">
            <!-- Avatar Media -->
            <div class="flex justify-between items-center mb-6">
                <div class="grow">
                    <div class="flex justify-between items-center gap-x-2">
                        <div>
                            <!-- Tooltip -->
                            <div class="hs-tooltip [--trigger:hover] [--placement:bottom] inline-block">
                                <div class="hs-tooltip-toggle sm:mb-1 block text-start cursor-pointer">
                                    <a href="{{ route('public.index', $article->user->id) }}" class="text-blue-500 hover:underline">{{ $article->user->name }}</a>
                                </div>
                            </div>
                            <!-- End Tooltip -->

                            <ul class="text-xs text-gray-500 dark:text-neutral-500">
                                <li class="inline-block relative pe-6 last:pe-0 last-of-type:before:hidden before:absolute before:top-1/2 before:end-2 before:-translate-y-1/2 before:size-1 before:bg-gray-300 before:rounded-full dark:text-neutral-400 dark:before:bg-neutral-600">
                                    {{ $article->created_at->format('Y/m/d') }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Avatar Media -->

            <!-- Content -->
            <div class="space-y-5 md:space-y-8">
                <div class="space-y-3">
                    <h2 class="text-2xl font-bold md:text-3xl dark:text-white">{{ $article->title }}</h2>
                    @foreach($article->categories as $category)
                        <span class="bg-pink-100 text-pink-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-pink-900 dark:text-pink-300">{{$category->name}}</span>
                    @endforeach

                    <p class="text-lg text-gray-800 dark:text-neutral-200">{{ $article->content }}</p>
                </div>

                <figure>
                    <img class="w-full object-cover rounded-xl" src="{{$article->link_image}}" alt="Blog Image">
                </figure>
            </div>
            <!-- End Content -->
        </div>
    </div>
    <!-- End Blog Article -->
    
    <!-- Liste des commentaires -->
    <div class="space-y-4">
        @foreach ($article->comments as $comment)
           <div class="flex items-start gap-4 max-w-3xl mx-auto bg-gray-100 p-4 rounded-lg dark:bg-gray-700">
                <div>
                    <span class="block text-sm font-semibold text-gray-900 dark:text-white">{{ $comment->user->name }}</span>
                    <span class="block text-xs text-gray-500 dark:text-gray-400">{{ $comment->created_at->format('Y/m/d') }}</span>
                </div>
                <p class="text-sm text-gray-700 dark:text-gray-300">{{ $comment->content }}</p>
            </div>
        @endforeach
    </div>
    <br>

    <!-- Formulaire d'ajout de commentaire -->
    @auth
        <div class="max-w-3xl mx-auto">
            <form action="{{ route('comments.store') }}" method="post" class="bg-gray-50 p-6 rounded-lg shadow dark:bg-gray-800">
                @csrf
                <input type="hidden" name="articleId" value="{{ $article->id }}">
                <textarea rows="3" name="content" id="content" placeholder="Add a comment" 
                    class="w-full p-3 mb-4 rounded-md border border-gray-300 shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-300 dark:bg-gray-700 dark:text-white"></textarea>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Send</button>
            </form>
        </div>
    @endauth

    <!-- Ajout de likes -->
    @auth
        <div class="max-w-3xl mx-auto mt-8 flex justify-between items-center">
            <a href="{{ route('article.like', $article->id) }}" class="inline-flex items-center gap-x-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.719,17.073l-6.562-6.51c-0.27-0.268-0.504-0.567-0.696-0.888C1.385,7.89,1.67,5.613,3.155,4.14c0.864-0.856,2.012-1.329,3.233-1.329c1.924,0,3.115,1.12,3.612,1.752c0.499-0.634,1.689-1.752,3.612-1.752c1.221,0,2.369,0.472,3.233,1.329c1.484,1.473,1.771,3.75,0.693,5.537c-0.19,0.32-0.425,0.618-0.695,0.887l-6.562,6.51C10.125,17.229,9.875,17.229,9.719,17.073 M6.388,3.61C5.379,3.61,4.431,4,3.717,4.707C2.495,5.92,2.259,7.794,3.145,9.265c0.158,0.265,0.351,0.51,0.574,0.731L10,16.228l6.281-6.232c0.224-0.221,0.416-0.466,0.573-0.729c0.887-1.472,0.651-3.346-0.571-4.56C15.57,4,14.621,3.61,13.612,3.61c-1.43,0-2.639,0.786-3.268,1.863c-0.154,0.264-0.536,0.264-0.69,0C9.029,4.397,7.82,3.61,6.388,3.61" clip-rule="evenodd" />
                </svg>
                <p class="ms-2 text-sm font-bold text-gray-900 dark:text-white">{{ $article->nbLikes }}</p>
            </a>
            
        </div>
    @endauth
</x-app-layout>
