<div class="my-1">
    <div class="relative grid grid-cols-1 gap-4 p-4 mb-8 border rounded-lg bg-white shadow-lg">
        <div class="relative flex gap-4">
            @if ($comment->user->hasMedia('profile_picture'))
                <img src="{{ $comment->user->getFirstMediaUrl('profile_picture') }}" class="relative rounded-full -top-8 -mb-4 bg-gray-800 border object-contain h-20 w-20" alt="" loading="lazy">
            @else
                <img src="{{ asset('images/profile_image.jpg') }}" class="relative rounded-lg -top-8 -mb-4 bg-white border h-20 w-20" alt="" loading="lazy">
            @endif
            <div class="flex flex-col w-full">
                <div class="flex flex-row justify-between">
                    <p class="relative text-xl whitespace-nowrap truncate overflow-hidden">{{ $comment->user->name }}</p>
                    <a class="text-gray-500 text-xl" href="#"><i class="fa-solid fa-trash"></i></a>
                </div>
                <p class="text-gray-400 text-sm"><x-time-formatter :time="$comment->created_at" /> </p>
            </div>
        </div>
        <p class="-mt-4 text-gray-600">{{ $comment->content }}</p>
    </div>
</div>
