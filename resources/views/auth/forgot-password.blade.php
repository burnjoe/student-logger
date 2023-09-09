<x-guest-layout>
    @php
        $portal = session('portal') ?? 'parent-guardian';
    @endphp

    <div class="mx-2 my-4">
        <div class="flex justify-center text-md mb-2 font-semibold">
            {{__('Request Password Reset Link')}}
        </div>

        <div class="text-justify mb-4 text-sm text-gray-600">
            {{ __('Let us know your email address and we will send you a password reset link that will allow you to change your password.') }}
        </div>
    
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
    
            <!-- Email Address -->
            <div>
                <x-input-text type="email" name="email" :value="old('email')" required placeholder="Email" alignIcon="left">
                    <i class="fa-solid fa-envelope"></i>
                </x-input-text>
                {{-- <x-input-error :messages="$errors->get('email')" class="mt-2 text-red text-xs" /> --}}
            </div>
    
            <div class="flex justify-center mt-4">
                <x-button btnType="success" textSize="text-md" type="submit">
                    Send Request
                </x-button>
            </div>
        </form>
    </div>

    {{-- Back Button --}}
    <x-button btnType="secondary" element="a" :href="route('login', ['portal' => $portal])" class="absolute top-8 left-8" rounded="rounded-md">
        <i class="fa-solid fa-arrow-left"></i>
    </x-button>
</x-guest-layout>
