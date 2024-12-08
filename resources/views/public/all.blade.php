<x-guest-layout>

            <div class="max-w-[20rem] bg-white border border-gray-200 shadow-sm rounded-xl p-4 md:p-5 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 flex items-center gap-x-4">
                <form method="POST" action="{{ route('public.index') }}" class="flex w-full">
                    @csrf    
                    <select name="user" id="hs-select-label" class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                        <option selected="">Select a writer</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="py-3 px-4 ml-2 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-100 text-blue-800 hover:bg-blue-200 focus:outline-none focus:bg-blue-200 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-400 dark:bg-blue-800/30 dark:hover:bg-blue-800/20 dark:focus:bg-blue-800/20">
                        Search
                    </button>
                </form>
            </div>

            <!-- Card Blog -->
            <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
                <!-- Title -->
                <div class="max-w-2xl text-center mx-auto mb-10 lg:mb-14">
                    <h2 class="text-2xl font-bold md:text-4xl md:leading-tight dark:text-white">Read all of our best articles</h2>
                    <p class="mt-1 text-gray-600 dark:text-neutral-400">You can read inspiring articles from many writters</p>
                </div>
                <!-- End Title -->

                <!-- Grid -->
                <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10 lg:mb-14">
                    @foreach ($articles as $article)
                        <!-- Card -->
                        <a href="{{ route('public.show', [$article->user_id, $article->id]) }}" class="group flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md focus:outline-none focus:shadow-md transition dark:bg-neutral-900 dark:border-neutral-800">
                        <div class="aspect-w-16 aspect-h-9">
                            <img class="w-full object-cover rounded-t-xl" src="{{$article->link_image}}" alt="Blog Image">
                        </div>
                        <div class="p-4 md:p-5">
                            @foreach($article->categories as $category)
                                <span class="bg-pink-100 text-pink-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-pink-900 dark:text-pink-300">{{$category->name}}</span>
                            @endforeach
                            <h3 class="mt-2 text-lg font-medium text-gray-800 group-hover:text-blue-600 dark:text-neutral-300 dark:group-hover:text-white">
                            {{ $article->title }}
                            </h3>
                        </div>
                        </a>
                        <!-- End Card -->
                    @endforeach
                </div>
                {{ $articles->links() }}
                <!-- End Grid -->
            </div>
            <!-- End Card Blog -->
</x-guest-layout>