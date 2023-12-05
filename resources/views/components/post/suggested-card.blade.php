<li class="py-3 sm:py-4">
    <div class="flex items-center">
        <div class="flex-shrink-0">
            @if ($post->hasMedia('images'))
                <img class="w-8 h-8 rounded-full" src="{{ $post->getFirstMediaUrl('images') }}" alt="{{ $post->title }} image">
                @else
                <img class="w-8 h-8 rounded-full" src="{{ asset('images/profile_image.jpg') }}" alt="{{ $post->title }} image">
            @endif
        </div>
        <div class="flex-1 min-w-0 ms-4">
            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                {{ $post->user->name }}
            </p>
            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                {{ substr($post->title, 0,50) }}...
            </p>
        </div>
        <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
            <p class="font-bold text-gray-600 text-sm">{{ $post->viaLoveReactant()->getReactionCounterOfType('Like')->getCount() }}Likes</p>
        </div>
    </div>
</li>
