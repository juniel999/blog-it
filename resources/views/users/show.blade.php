<x-app-layout>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-10">
                <h1 class="text-4xl font-bold text-gray-800">{{$user->name}}</h1>
                <h2 class="mt-5 border-b-2 w-fit p-3">Blogs</h2>

                @foreach ($user->posts as $post)
                    <x-post.card :post="$post" />
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
