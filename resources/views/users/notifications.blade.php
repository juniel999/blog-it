<x-app-layout>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-10">
                <h1 class="text-3xl">Notifications</h1>
                @if ($notifications->isEmpty())
                    <p class="mt-3 text-gray-800">No new notifications yet.</p>
                @endif
                @foreach ($notifications as $notification)
                    <x-user.notification-card :notification="$notification" />
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
