<x-guest-layout>
    <form method="POST" action="{{ route('platform.store') }}" enctype="multipart/form-data">
        @csrf

        <!-- Platform Name -->
        <div>
            <x-input-label for="platform_name" :value="__('Platform Name')" />
            <x-text-input id="platform_name" class="block mt-1 w-full" type="text" name="platform_name"
                placeholder="Enter platform name" required autofocus />
            <x-input-error :messages="$errors->get('platform_name')" class="mt-2" />
        </div>

        <!-- Platform Image -->
        <div class="mt-4">
            <x-input-label for="background_image" :value="__('Platform Image')" />
            <input id="background_image" class="block mt-1 w-full" type="file" name="background_image"
                accept="image/*" required />
            <x-input-error :messages="$errors->get('background_image')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                {{ __('Add Platform') }}
            </x-primary-button>
        </div>

    </form>
</x-guest-layout>
