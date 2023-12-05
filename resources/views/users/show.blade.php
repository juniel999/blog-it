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
                            <p class="text-gray-600 text-sm mt-2">Followers: 12k Following: 1</p>
                        </div>
                        <h2 class="my-5 border-b-2 w-fit p-3">Blogs</h2>
                        @foreach ($posts as $post)
                            <x-post.card :post="$post" />
                        @endforeach
                    </div>
                    <div class="p-10 basis-2/6">
                        @if ($user->hasMedia('profile_picture'))
                            <img class="object-containt w-28 rounded-full" src="{{ $user->getFirstMediaUrl('profile_picture') }}" alt="profile picture">
                            <p class="font-bold mt-5">{{ $user->name }}</p>

                            @if ($user->id == Auth::id())
                                <x-link-secondary-button href="{{ route('profile.edit') }}">Edit Profile</x-link-secondary-button>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
