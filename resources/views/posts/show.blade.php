<x-app-layout>
    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-10">
                <div>
                    <h1 class="font-black text-5xl text-gray-800">{{ $post->title }}</h1>
                </div>
                <div class="mt-5 flex items-center space-x-5">
                    @if($post->user->hasMedia('profile_picture'))
                        <img
                            src="{{ $post->user->getFirstMediaUrl('profile_picture') }}"
                            alt="profile picture"
                            class="rounded-full object-contain h-20 w-20 bg-gray-800 "
                        />
                    @else
                        <img
                            src="{{ asset('images/profile_image.jpg') }}"
                            alt="profile picture"
                            class="rounded-full object-contain h-20"
                        />
                    @endif
                    <div class="flex flex-col">
                        <div class="flex">
                            <a class="text-xl mr-3" href="{{ route('users.show', $post->user) }}">{{ $post->user->name }}</a>
                            @if (Auth::check() && Auth::id() != $post->user->id)
                                <form action="{{ route('users.follow', $post->user) }}" method="POST">
                                    @csrf
                                    @if (Auth::user()->isFollowing($post->user))
                                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">Following</button>
                                    @else
                                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Follow</button>
                                    @endif
                                </form>
                            @endif
                        </div>
                        <p>Published <x-time-formatter :time="$post->created_at" /></p>
                        @if (Auth::id() == $post->user->id)
                            <div class="flex space-x-1">
                                <x-link-secondary-button href="{{ route('posts.edit', $post) }}">Edit</x-link-secondary-button>
                                <form action="{{ route('posts.destroy', $post) }}" method="POST" >
                                    @csrf
                                    @method('DELETE')
                                    <x-danger-button onclick="return confirm('Are you sure you want to delete?')">Delete</x-danger-button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="mt-10 text-xl leading-10 border-t-2">
                    <img src="{{ $post->getFirstMediaUrl('images') }}" class="mb-5">
                    {!! $post->description !!}
                    <div class="flex items-center border-b-2">
                        <form id="add-like" class="m-3" action="{{ route('posts.add-like', $post) }}" method="POST">
                            @csrf
                            <button type="submit">
                                <img class="object-contain h-10 w-10 cursor-pointer" src="{{asset('assets/like.svg')}}" alt="">
                            </button>
                        </form>
                        <div id="{{ $post->id }}">
                            <p class="font-bold text-gray-600 text-xs">{{ $post->viaLoveReactant()->getReactionCounterOfType('Like')->getCount() }} likes </p>
                        </div>
                    </div>
                </div>

                <div class="mt-2">
                    <h3 class="text-3xl pt-2 my-5">Comments</h3>
                    @if ($post->comments->isEmpty())
                        <p class="my-3 pl-2">No comments yet.</p>
                    @endif
                    @foreach ($paginatedComments as $comment)
                        <x-comment.card :comment="$comment" />
                    @endforeach

                    {{ $paginatedComments->links() }}

                    <form method="POST" action="{{ route('posts.comments.store', $post) }}" class="mt-3 flex flex-col">
                        @csrf
                        <x-text-input name="content" autocomplete=off placeholder="Add a comment" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        <x-primary-button class="w-fit mt-2">Comment</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
