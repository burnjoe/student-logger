<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />

            <x-input-text id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex justify-end mt-4">
            <x-button btnType="success">
                {{ __('Confirm') }}
            </x-button>
        </div>
    </form>
    {{-- Back Button --}}
    <x-button btnType="secondary" element="a" :href="url()->previous()" class="absolute top-8 left-8" rounded="rounded-md">
        <i class="fa-solid fa-arrow-left"></i>
    </x-button>
</x-guest-layout>
