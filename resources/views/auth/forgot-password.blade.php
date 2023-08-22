<x-guest-layout>
 
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
                <x-input-group>
                    <x-input-text type="email" name="email" :value="old('email')" required placeholder="Email" alignIcon="left">
                        <i class="fa-solid fa-envelope"></i>
                    </x-input-text>
                </x-input-group>
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red text-xs" />
            </div>
    
            <div class="flex justify-center mt-4">
                <x-button type="submit">
                    Send Request
                </x-button>
            </div>
        </form>
    </div>


    <form method="GET" action="{{ route('root') }}">
        @csrf
        <x-button class="absolute top-8 left-8" type="submit" rounded="rounded-md" bgColor="bg-darkGray" onHover="hover:bg-gray">
            <i class="fa-solid fa-arrow-left"></i>
        </x-button>
    </form>
</x-guest-layout>
