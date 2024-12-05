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

        <!--Ajout de likes-->
        @auth
            <a href="{{ route('article.like', $article->id) }}" class="block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.719,17.073l-6.562-6.51c-0.27-0.268-0.504-0.567-0.696-0.888C1.385,7.89,1.67,5.613,3.155,4.14c0.864-0.856,2.012-1.329,3.233-1.329c1.924,0,3.115,1.12,3.612,1.752c0.499-0.634,1.689-1.752,3.612-1.752c1.221,0,2.369,0.472,3.233,1.329c1.484,1.473,1.771,3.75,0.693,5.537c-0.19,0.32-0.425,0.618-0.695,0.887l-6.562,6.51C10.125,17.229,9.875,17.229,9.719,17.073 M6.388,3.61C5.379,3.61,4.431,4,3.717,4.707C2.495,5.92,2.259,7.794,3.145,9.265c0.158,0.265,0.351,0.51,0.574,0.731L10,16.228l6.281-6.232c0.224-0.221,0.416-0.466,0.573-0.729c0.887-1.472,0.651-3.346-0.571-4.56C15.57,4,14.621,3.61,13.612,3.61c-1.43,0-2.639,0.786-3.268,1.863c-0.154,0.264-0.536,0.264-0.69,0C9.029,4.397,7.82,3.61,6.388,3.61" clip-rule="evenodd" />
                </svg>
                <p class="ms-2 text-sm font-bold text-gray-900 dark:text-white">{{$article->like}}</p>
            </a>
        @endauth

    </div>
</x-guest-layout>
