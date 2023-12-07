<div class="flex flex-wrap flex-col md:flex-row">
    <div class="flex flex-wrap bg-white border-b border-blue-tial-100 md:w-1/2 lg:w-1/3">
        <div class="flex w-full m-4">
            <div class="flex items-center">
                @if ($follower->hasMedia('profile_picture'))
                    <img class="h-20 w-20 bg-gray-800 rounded-full object-contain" src="{{ $follower->getFirstMediaUrl('profile_picture') }}" />
                @else
                    <img class="h-20 rounded-full object-contain" src="{{ asset('images/profile_image.jpg') }}" />
                @endif
                <div class="flex flex-col p-4">
                    <a href="{{ route('users.show', $follower) }}" class="font-bold text-md text-tial-400">{{ $follower->name }}</a>
                    {{-- <span class="font-light text-sm">{{$follower->followers()->count()}} followers</span> --}}
                </div>
            </div>
        </div>
    </div>
</div>
