<div class="bg-white p-5 rounded-lg dark:border-gray-700 dark:bg-gray-800 shadow">
    <div class="flex items-center space-x-0">
        @if (Auth::user()->getFirstMediaUrl('profile_picture'))
            <img class="rounded-full w-8 h-8 object-fit" src="{{ Auth::user()->getFirstMediaUrl('profile_picture') }}" alt="profile pic">
        @endif
        <a href="" class="pl-2 font-bold">{{ $post->user->name }} <span class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</span></a>
    </div>
    <div class="flex flex-col justify-between items-center md:flex-row">
        <div class="flex flex-col justify-between p-2 leading-normal">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post->title }}</h5>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{!!Str::substr($post->description, 0, 350)!!}...</p>
        </div>
        @if ($post->getFirstMediaUrl('images'))
        <img class="object-cover flex-shrink-0 w-full rounded-t-lg h-96 md:h-36 md:w-48 md:rounded-none md:rounded-s-lg" src="{{ $post->getFirstMediaUrl('images') }}" >
        @endif
    </div>
    <div class="pl-2 flex items-center space-x-4">
        <img class="object-fit h-8 w-8 cursor-pointer" src="{{asset('assets/heart.svg')}}" alt="">
        <a  href="">Take a Read...</a>
    </div>
</div>
