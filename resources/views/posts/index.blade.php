<x-app-layout>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-5 flex justify-between">
                <div class="mb-2 w-full p-5">
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
                <div>
                    <div class="w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex items-center justify-between mb-4">
                            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Most Liked</h5>
                            <a href="#" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                                View all
                            </a>
                    </div>
                    <div class="flow-root">
                            <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach ($suggested_blogs as $post)
                                <x-post.suggested-card :post="$post"/>
                                @endforeach
                                {{-- <li class="py-3 sm:py-4">
                                    <div class="flex items-center ">
                                        <div class="flex-shrink-0">
                                            <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-3.jpg" alt="Bonnie image">
                                        </div>
                                        <div class="flex-1 min-w-0 ms-4">
                                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                Bonnie Green
                                            </p>
                                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                email@windster.com
                                            </p>
                                        </div>
                                        <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                            <p class="font-bold text-gray-600 text-sm">{{ $post->viaLoveReactant()->getReactionCounterOfType('Like')->getCount() }}Likes</p>
                                        </div>
                                    </div>
                                </li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
