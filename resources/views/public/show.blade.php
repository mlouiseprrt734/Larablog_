<x-guest-layout>
    <!-- Conteneur principal -->
    <div class="container mx-auto p-6 space-y-6">
        
        <!-- Détail de l'article -->
        <div class="block p-6 bg-white border border-gray-200 rounded-lg shadow max-w-4xl mx-auto dark:bg-gray-800 dark:border-gray-700">
            <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $article->title }}</h2>
            @foreach($article->categories as $category)
                    <span class="bg-pink-100 text-pink-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-pink-900 dark:text-pink-300">{{$category->name}}</span>
            @endforeach
            <h5 class="mb-2 mt-2 text-sm font-medium text-gray-900 dark:text-white">
                Published on {{ $article->created_at->format('Y/m/d') }} by 
                <a href="{{ route('public.index', $article->user->id) }}" class="text-blue-500 hover:underline">{{ $article->user->name }}</a>
            </h5>
            <p class="font-normal text-gray-700 dark:text-gray-400">{{ $article->content }}</p>
        </div>

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

    </div>
</x-guest-layout>
