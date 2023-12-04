<x-app-layout>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-5">
                <form method="POST" action="{{ route('posts.store') }}" class="max-w-lg mx-auto" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-5">
                        <input type="text" name="title" placeholder="Title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div class="mb-5">
                        <textarea name="description" placeholder="dsf" class="focus:ring-blue-500"></textarea>
                    </div>
                    <div class="mb-5">
                        <input type="file" name="image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <x-primary-button>Publish</x-primary-button>
                </form>
            </div>
        </div>
    </div>
    <script>
      CKEDITOR.replace('description');
    </script>

</x-app-layout>
