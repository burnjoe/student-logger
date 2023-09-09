<x-guest-layout>
    @php
        $portal = session('portal') ?? 'parent-guardian';
    @endphp

    <div class="mx-2 my-4">
        <div class="flex justify-center text-md mb-2 font-semibold">
            {{__('Reset Password')}}
        </div>

        <form method="POST" action="{{ route('password.store') }}">
            @csrf

             <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div>
                <x-input-label class="mb-1" for="email" :value="__('Email')" />
                <x-input-text id="email" type="email" name="email" :value="old('email', $request->email)" required placeholder="Email" alignIcon="left">
                    <i class="fa-solid fa-envelope"></i>
                </x-input-text>
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs text-red" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label class="mb-1" for="password" :value="__('New Password')" />
                <x-input-text id="password" type="password" name="password" required alignIcon="left" autocomplete="new-password" placeholder="New Password">
                    <i class="fa-solid fa-lock"></i>
                </x-input-text>
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs text-red" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label class="mb-1" for="password_confirmation" :value="__('Confirm New Password')" />
                <x-input-text id="password_confirmation" type="password" name="password_confirmation" required  alignIcon="left" autocomplete="new-password" placeholder="Confirm New Password">
                    <i class="fa-solid fa-lock"></i>
                </x-input-text>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-xs text-red" />
            </div>

            <!-- Reset Password Button -->
            <div class="flex justify-center mt-4">
            <x-button btnType="success" textSize="text-md" type="submit">
                    Reset Password
                </x-button>
            </div>
        </form>
    </div>

    {{-- Back Button --}}
    <x-button btnType="secondary" element="a" :href="route('login', ['portal' => $portal])" class="absolute top-8 left-8" rounded="rounded-md">
        <i class="fa-solid fa-arrow-left"></i>
    </x-button>
</x-guest-layout>
