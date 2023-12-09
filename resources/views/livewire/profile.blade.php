<div>
    <x-card class="flex flex-col" padding="">
        <!-- Left Side  -->
        <div class="w-full text-center"
            style="background-image: url('/img/pnc_bg.png'); background-size: cover; background-position: top;">
            <!-- Profile Picture -->
            <img class="object-cover object-center h-36 w-36 rounded-full border border-2 border-gray mt-8 mb-2 mx-auto"
                alt="Profile Picture" src="{{ asset('img/user_icon.png') }}" alt="Profile Photo">
            {{-- Employee Name --}}
            <div class="w-full mb-8">
                <h6 class="text-xl leading-5 text-white font-semibold">{{ $user->employee->first_name.'
                    '.($user->employee->middle_name ?
                    strtoupper(substr($user->employee->middle_name, 0, 1)).'.' : '').'
                    '.$user->employee->last_name }}</h6>
                <small class="font-light text-white text-sm">{{ ucwords($user->roles->first()->name) }}</small>
            </div>
        </div>

        <div class="w-full">
            <div class="flex flex-wrap px-6 py-4">
                {{-- Sex --}}
                <div class="w-full md:w-1/2">
                    <small class="font-normal text-darkGray text-xs">Sex</small>
                    <h6 class="text-1rem font-medium leading-5 mb-2">{{ $user->employee->sex }}</h6>
                </div>
                {{-- Email --}}
                <div class="w-full md:w-1/2">
                    <small class="font-normal text-darkGray text-xs">Email</small>
                    <h6 class="text-1rem font-medium leading-5 mb-2">{{ $user->email }}</h6>
                </div>
                {{-- Phone --}}
                <div class="w-full md:w-1/2">
                    <small class="font-normal text-darkGray text-xs">Phone Number</small>
                    <h6 class="text-1rem font-medium leading-5 mb-2">{{ '0'.$user->employee->phone }}</h6>
                </div>
                {{-- Date of Birth --}}
                <div class="w-full md:w-1/2">
                    <small class="font-normal text-darkGray text-xs">Date of Birth</small>
                    <h6 class="text-1rem font-medium leading-5 mb-2">{{
                        Carbon\Carbon::parse($user->employee->birthdate)->format('F j, Y') }}</h6>
                </div>
                {{-- Address --}}
                <div class="w-full">
                    <small class="font-normal text-darkGray text-xs">Address</small>
                    <h6 class="text-1rem font-medium leading-5 mb-2">{{ $user->employee->address }}</h6>
                </div>
            </div>
        </div>
    </x-card>
</div>