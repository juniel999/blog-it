<div class="bg-white py-5 px-10 rounded-lg dark:border-gray-700 dark:bg-gray-800 shadow">
    <div class="flex items-center space-x-0">
        @if ($post->user->hasMedia('profile_picture'))
            <img class="rounded-full w-8 h-8 object-contain" src="{{ $post->user->getFirstMediaUrl('profile_picture') }}" alt="profile pic">
        @endif
        <a href="" class="pl-2 font-bold">{{ $post->user->name }} <x-time-formatter :time="$post->created_at" /></a>
    </div>
    <div class="flex flex-col space-x-10 justify-between items-center md:flex-row">
        <div class="flex flex-col justify-between p-2 leading-normal">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post->title }}</h5>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{!!Str::substr($post->description, 0, 350)!!}...</p>
        </div>
        @if ($post->getFirstMediaUrl('images'))
        <img class="object-cover flex-shrink-0 w-full h-96 md:h-36 md:w-36" src="{{ $post->getFirstMediaUrl('images') }}" >
        @endif
    </div>
    <div class="pl-2 flex items-center space-x-2">
        <div class="flex items-center">
            <img class="object-fit h-8 w-8 cursor-pointer" src="{{asset('assets/like.svg')}}" alt="">
            <p class="font-bold text-gray-600 text-sm">23</p>
        </div>
        <a  href="{{ route('posts.show', $post) }}">Take a Read...</a>
    </div>
</div>
