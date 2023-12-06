<x-app-layout>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-5 flex justify-between">
                <div class="mb-2 basis-4/6 p-5">
                    <div class=" w-fit">
                        <ul class="flex text-sm">
                            <li>
                                <x-nav-link class="border-b-2 p-2" :href="route('posts.index')" :active="request()->routeIs('posts.index')">
                                    {{ __('For you') }}
                                </x-nav-link>
                            </li>
                            <x-nav-link class="border-b-2 p-2" :href="route('posts.index')" :active="request()->routeIs('posts.create')">
                                {{ __('Following') }}
                            </x-nav-link>
                        </ul>
                    </div>
                    <div class="mt-10 flex space-y-2 flex-col">
                        @foreach ($posts as $post)
                            <x-post.card :post="$post" />
                        @endforeach
                        {{$posts->links()}}
                    </div>
                </div>
                <div class="basis-2/6">
                    <div class="p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex items-center justify-between mb-4">
                            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Top 5 Most Liked</h5>
                    </div>
                    <div class="flow-root">
                            <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach ($suggested_blogs as $post)
                                <x-post.most-liked-card :post="$post"/>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
