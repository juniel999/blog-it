<x-app-layout>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-10">
                <!-- component -->
                <div class="flex flex-col w-full flex-wrap">
                    <div class="flex items-center  justify-between">
                        <span class="text-lg text-tial-800 font-semibold ">Followers</span>
                    </div>
                    @foreach ($followers as $follower)
                        <x-user.follower-card :follower="$follower" />
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
