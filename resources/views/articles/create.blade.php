<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create an article
        </h2>
    </x-slot>

    <form method="post" action="{{ route('articles.store') }}" class="py-12">
        @csrf
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 ">
                   <!-- Input de titre de l'article -->
                   <input type="text" name="title" id="title" placeholder="Title of the article" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div class="p-6 text-gray-900 ">
                   <!-- Catégories de l'article -->
                    <label for="categories_multiple" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
                    <select multiple name="categories[]" id="countries_multiple" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option selected>Choose categories</option>
                        <option value="1">Technology</option>
                        <option value="2">Science</option>
                        <option value="3">Languages</option>
                        <option value="4">Culture</option>
                    </select>
                </div>

                <div class="p-6 pt-0 text-gray-900 ">
                   <!-- Contenu de l'article -->
                   <textarea rows="30" name="content" id="content" placeholder="Content of the article" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                </div>

                <div class="p-6 text-gray-900 flex items-center">
                    <!-- Action sur le formulaire -->
                    <div class="grow">
                        <input type="checkbox" name="draft" id="draft" class="rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <label for="draft">Article as draft</label>
                    </div>
                    <div>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Create article
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>