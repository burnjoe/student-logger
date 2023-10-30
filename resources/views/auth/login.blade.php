<x-guest-layout>
    <div class="flex flex-col items-center">
        <div class="px-12 pt-5">
            <img class="max-w-full" src="{{asset('img/ist_logo.png')}}" alt="">
        </div>
        <span class="text-sm text-center font-bold text-green pt-2">Student Centralized Logging System</span>
    </div>

    <div class="flex flex-col mx-8 my-6">
        <x-card class="max-w-sm" shadow="shadow-none" rounded="rounded-md" bgColor="bg-veryLightGreen">
            <div class="flex flex-col items-center">
                <span class="text-sm text-center text-darkGreen font-bold">UNIVERSITY LOGIN</span>
            </div>
        </x-card>

        <form method="POST" action="{{ route('login.store') }}" class="flex flex-col space-y-4">
            @csrf

            {{-- Email Address --}}
            <div>
                <x-input-text type="email" name="email" :value="old('email')" required placeholder="Username"
                    alignIcon="left">
                    <i class="fa-solid fa-user"></i>
                </x-input-text>
                {{--
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs text-red" /> --}}
            </div>

            {{-- Password --}}
            <div>
                <x-input-text type="password" name="password" required placeholder="Password" alignIcon="left">
                    <i class="fa-solid fa-lock"></i>
                </x-input-text>
                {{--
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs text-red" /> --}}
            </div>

            <span class="flex justify-end font-bold text-green text-sm transition-all hover:text-darkGreen">
                {{-- if this current route has ability to request for password change --}}
                @if (Route::has('password.request'))
                <a href="{{ route('password.request')}}"> {{__('Forgot Password?')}} </a>
                @endif
            </span>

            <div class="flex justify-center">
                <x-button btnType="success" textSize="text-md" type="submit">
                    LOGIN
                </x-button>
            </div>
        </form>
    </div>
</x-guest-layout>