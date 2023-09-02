<x-guest-layout>
    @php
        $portal = session('portal') ?? 'parent-guardian';
    @endphp

    <div class="flex flex-col items-center">
        <div class="px-12 pt-5">
            <img class="max-w-full" src="{{asset('img/ist_logo.png')}}" alt="">
        </div>
        <span class="text-sm text-center font-bold text-green pt-2">Student Centralized Logging System</span>
    </div>

    <div class="flex flex-col mx-8 my-6">
        @if($portal === 'parent-guardian')
            <x-card shadow="shadow-none" rounded="rounded-md" bgColor="bg-veryLightGreen">
                <div class="flex flex-col items-center">
                    <span class="text-sm text-center text-darkGreen font-bold">{{ $title }}</span>
                </div>
            </x-card>
        @elseif($portal === 'university')
            <x-card shadow="shadow-none" rounded="rounded-md" bgColor="bg-veryLightBlue">
                <div class="flex flex-col items-center">
                    <span class="text-sm text-center text-darkBlue font-bold">{{ $title }}</span>
                </div>
            </x-card>
        @endif

        <form method="POST" action="{{ route('login', ['portal' => $portal]) }}" class="flex flex-col space-y-4">
            @csrf
    
            {{-- Email Address --}}
            <div>
                <x-input-group>
                    <x-input-text type="email" name="email" :value="old('email')" required placeholder="Username" alignIcon="left">
                        <i class="fa-solid fa-user"></i>
                    </x-input-text>
                </x-input-group>
                {{-- <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs text-red" /> --}}
            </div>
            
            {{-- Password --}}
            <div>
                <x-input-group>
                    <x-input-text type="password" name="password" required placeholder="Password" alignIcon="left">
                        <i class="fa-solid fa-lock"></i>
                    </x-input-text>
                </x-input-group>
                {{-- <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs text-red" /> --}}
            </div>

            @if($portal === 'parent-guardian')
                <span class="flex justify-end font-bold text-green text-sm transition-all hover:text-darkGreen">
                    {{-- if this current route has ability to request for password change --}}
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request')}}"> {{__('Forgot Password?')}} </a>
                    @endif
                </span>
            @elseif($portal === 'university')
                <span class="flex justify-end font-bold text-blue text-sm transition-all hover:text-darkBlue">
                    {{-- if this current route has ability to request for password change --}}
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"> {{__('Forgot Password?')}} </a>
                    @endif
                </span>
            @endif

            <div class="flex justify-center">
                @if($portal === 'parent-guardian')
                    <x-button btnType="success" type="submit">
                        <span class="text-md">LOGIN</span>
                    </x-button>
                @elseif($portal === 'university')
                    <x-button btnType="primary" type="submit">
                        <span class="text-md">LOGIN</span>
                    </x-button>
                @endif
            </div>
        </form>
    </div>
</x-guest-layout>
