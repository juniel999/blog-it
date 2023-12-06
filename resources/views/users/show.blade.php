<x-app-layout>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-10">
                <div class="flex justify-between px-10 p-5">
                    <div class="basis-4/6">
                        <a href="{{ route('users.show', $user) }}">
                            <h1 class="text-4xl font-bold text-gray-800">{{$user->name}}</h1>
                        </a>
                        <div>
                            @if (Auth::check() && Auth::id() != $user->id)
                                <form action="{{ route('users.follow', $user) }}" method="POST">
                                    @csrf
                                    @if (Auth::user()->isFollowing($user))
                                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">Following</button>
                                    @else
                                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Follow</button>
                                    @endif
                                </form>
                            @endif
                            <div class="flex space-x-2">
                                <a href="{{ route('users.followers', $user) }}" class="text-gray-600 text-sm mt-2">Followers: {{$followers}}</a>
                                {{-- <a href="{{ route('users.followers', $user) }}" class="text-gray-600 text-sm mt-2">Followers: {{$followers}}</a> --}}
                            </div>
                            {{-- <p class="text-gray-600 text-sm mt-2">Followers: {{$followers}} Following: {{$followings}}</p> --}}
                        </div>
                        <h2 class="my-5 border-b-2 w-fit p-3">Blogs</h2>

                        @if($posts->isEmpty())
                            <p class="text-gray-700">No blogs yet.</p>
                        @endif
                        @foreach ($posts as $post)
                            <x-post.card :post="$post" />
                        @endforeach
                    </div>
                    <div class="p-10 basis-2/6">
                        @if ($user->hasMedia('profile_picture'))
                            <img class="object-containt w-28 rounded-full" src="{{ $user->getFirstMediaUrl('profile_picture') }}" alt="profile picture">
                        @else
                        <img class="object-containt w-28 rounded-full" src="{{ asset('images/profile_image.jpg') }}" alt="profile picture">
                        @endif
                            <p class="font-bold mt-5">{{ $user->name }}</p>
                        @if ($user->id == Auth::id())
                            <x-link-secondary-button href="{{ route('profile.edit') }}">Edit Profile</x-link-secondary-button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
