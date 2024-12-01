<x-guest-layout>
    <div class="text-center">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            List of articles published by {{ $user->name }}
        </h2>
    </div>

    <div>
        <!-- Articles -->
        @foreach ($articles as $article)
        <div>
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h2 class="text-2xl font-bold">{{ $article->title }}</h2>
                <p class="text-gray-700 dark:text-gray-300">{{ substr($article->content, 0, 30) }}...</p>
                
                <a href="{{ route('public.show', [$article->user_id, $article->id]) }}" class="text-red-500 hover:text-red-700">View more ...</a>
            </div>
        </div>
        <hr>
        @endforeach
    </div>
</x-guest-layout>