<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="flex flex-col items-center">
        <div class="px-12 pt-5">
            <img class="max-w-full" src="{{asset('img/ist_logo.png')}}" alt="">
        </div>
        <span class="text-sm text-center font-bold text-green pt-2">Student Centralized Logging System</span>
    </div>

    <div class="flex flex-col mx-8 my-6">
        <x-card shadow="shadow-none" rounded="rounded-md" bgColor="bg-veryLightGreen">
            <div class="flex flex-col items-center">
                <span class="text-sm text-center text-darkGreen font-bold">PARENT & GUARDIAN LOGIN</span>
            </div>
        </x-card>

        <form method="POST" action="{{ route('login') }}" class="flex flex-col space-y-4">
            @csrf
    
            {{-- Email Address --}}
            <div>
                <x-input-group>
                    <x-input-text type="email" name="email" :value="old('email')" required placeholder="Username" alignIcon="left">
                        <i class="fa-solid fa-user"></i>
                    </x-input-text>
                </x-input-group>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            
            {{-- Password --}}
            <div>
                <x-input-group>
                    <x-input-text type="password" name="password" required placeholder="Password" alignIcon="left">
                        <i class="fa-solid fa-lock"></i>
                    </x-input-text>
                </x-input-group>
                <x-input-error :messages="$errors->get('password')" />
            </div>

            <span class="flex justify-end font-bold text-green text-sm transition-all hover:text-darkGreen">
                {{-- if this current route has ability to request for password change --}}
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}"> {{__('Forgot Password?')}} </a>
                @endif
            </span>

            <div class="flex justify-center">
                <x-button type="submit">
                  <span class="text-md">LOGIN</span>
                </x-button>
            </div>
        </form>
    </div>
</x-guest-layout>
