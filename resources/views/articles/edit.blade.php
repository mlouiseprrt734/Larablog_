<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-neutral-800 leading-tight dark:text-neutral-200">
            Modify Article {{ $article->id }}
        </h2>
    </x-slot>

    <form method="post" action="{{ route('articles.update', $article->id) }}" class="py-12">
        @csrf
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-neutral-50 dark:bg-neutral-800 shadow-sm sm:rounded-lg overflow-hidden border border-neutral-200 dark:border-neutral-700">
                <!-- Titre de l'article -->
                <div class="p-6">
                    <label for="title" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">Title</label>
                    <input 
                        type="text" 
                        value="{{ $article->title }}" 
                        name="title" 
                        id="title" 
                        placeholder="Title of the article" 
                        class="py-3 px-4 block w-full bg-neutral-100 border border-neutral-300 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-700 dark:border-neutral-500 dark:text-neutral-200 dark:placeholder-neutral-400 dark:focus:ring-neutral-600"
                    >
                </div>

                <!-- Catégories -->
                <div class="p-6 pt-0">
                    <label for="categories_multiple" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">Categories</label>
                    <!-- Champ de catégories inchangé avec présélection -->
                    <select 
                        multiple="" 
                        name="categories[]" 
                        data-hs-select='{
                        "placeholder": "Select multiple options...",
                        "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                        "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",
                        "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
                        "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
                        "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-blue-600 dark:text-blue-500 \" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
                        "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                        }' 
                        class="hidden"
                    >
                        <option value="">Choose</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" @if(in_array($category->id, $selectedArticlescat)) selected @endif>{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Contenu de l'article -->
                <div class="p-6 pt-0">
                    <label for="content" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">Content</label>
                    <textarea 
                        rows="10" 
                        name="content" 
                        id="content" 
                        placeholder="Content of the article" 
                        class="w-full rounded-lg border border-neutral-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-700 dark:border-neutral-500 dark:text-neutral-200 dark:placeholder-neutral-400 dark:focus:ring-neutral-600"
                    >{{ $article->content }}</textarea>
                </div>

                <!-- Actions -->
                <div class="p-6 border-t border-neutral-200 dark:border-neutral-700 flex justify-between items-center">
                    <div class="flex items-center">
                        <input 
                            type="checkbox" 
                            name="draft" 
                            id="draft" 
                            {{ $article->draft ? 'checked' : '' }} 
                            class="rounded border-neutral-300 focus:ring-blue-500 dark:border-neutral-500 dark:focus:ring-neutral-600"
                        >
                        <label for="draft" class="ml-2 text-sm text-neutral-700 dark:text-neutral-300">Article as draft</label>
                    </div>
                    <button 
                        type="submit" 
                        class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-neutral-800"
                    >
                        Edit the article
                    </button>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>
