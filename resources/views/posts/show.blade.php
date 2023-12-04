<x-app-layout>
    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-10">
                <div>
                    <h1 class="font-black text-5xl text-gray-800">{{ $post->title }}</h1>
                </div>
                <div class="mt-5 flex items-center space-x-5">
                    <img
                        src="{{ $post->user->getFirstMediaUrl('profile_picture') }}"
                        alt="profile picture"
                        class="rounded-full object-contain h-20"
                    />
                    <div class="flex flex-col">
                        <div class="flex">
                            <p class="text-xl mr-3">{{ $post->user->name }}</p>
                            <x-primary-button>Follow</x-primary-button>
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

                <div class="mt-10 text-xl leading-10">
                    {!! $post->description !!}
                    <img src="{{ $post->getFirstMediaUrl('images') }}" class="mb-5">
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
