<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Update Profile Picture') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile picture to stay updated.") }}
        </p>
    </header>

    @if (Auth::check() && Auth::user()->hasMedia('profile_picture'))
        <img src={{ Auth::user()->getFirstMediaUrl('profile_picture')  }} class="h-[120px] my-2 border border-white border-2 object-contain rounded mr-2" alt="" />
    @else
        <img src="{{ asset('images/profile_image.jpg') }}" class="h-[120px] my-2 border border-white border-2 object-contain rounded mr-2" alt="">
    @endif

    <form action="{{ route('profile.upload.image') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div>
            <x-input-label for="profile_picture" />
            <x-text-input id="profile_picture" name="profile_picture" type="file" class="mt-1 block w-full"/>
            <x-input-error class="mt-2" :messages="$errors->get('profile_picture')" />
        </div>

        <x-primary-button class="mt-3">Update Profile Picture</x-primary-button>
    </form>


</section>
