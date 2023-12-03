<div>
    {{-- Personal Information --}}
    <div class="border border-t-0 border-l-0 border-r-0 border-lightGray border-lightGray px-5">
        <span class="text-1rem font-bold">Personal Information</span>
    </div>

    <div class="flex flex-wrap px-5 pb-5 pt-2.5">
        <div class="w-full md:w-1/3">
            <small class="font-normal text-darkGray pt-2.5 text-xs">Last Name</small>
            <p class="text-1rem font-medium leading-5 mb-2">{{ $last_name }}</p>
        </div>
        <div class="w-full md:w-1/3">
            <small class="font-normal text-darkGray pt-2.5 text-xs">First Name</small>
            <p class="text-1rem font-medium leading-5 mb-2">{{ $first_name }}</p>
        </div>
        <div class="w-full md:w-1/3">
            <small class="font-normal text-darkGray pt-2.5 text-xs">Middle Name</small>
            <p class="text-1rem font-medium leading-5 mb-2">{{ $middle_name ?? 'N/A' }}</p>
        </div>

        <div class="w-full md:w-1/3">
            <small class="font-normal text-darkGray pt-2.5 text-xs">Sex</small>
            <p class="text-1rem font-medium leading-5 mb-2">{{ $sex }}</p>
        </div>
        <div class="w-full md:w-1/3">
            <small class="font-normal text-darkGray pt-2.5 text-xs">Date of Birth</small>
            <p class="text-1rem font-medium leading-5 mb-2">{{ \Carbon\Carbon::parse($birthdate)->format('F j, Y') }}</p>
        </div>
        <div class="w-full md:w-1/3">
            <small class="font-normal text-darkGray pt-2.5 text-xs">Phone Number</small>
            <p class="text-1rem font-medium leading-5 mb-2">{{ '0'.$phone }}</p>
        </div>

        <div class="w-full">
            <small class="font-normal text-darkGray pt-2.5 text-xs">Address</small>
            <p class="text-1rem font-medium leading-5 mb-2">{{ $address }}</p>
        </div>
    </div>

    {{-- User Account Information --}}
    <div class="border border-t-0 border-l-0 border-r-0 border-lightGray border-lightGray px-5">
        <span class="text-1rem font-bold">User Account Information</span>
    </div>

    <div class="flex flex-wrap px-5 pb-5 pt-2.5">
        <div class="w-full md:w-1/3">
            <small class="font-normal text-darkGray pt-2.5 text-xs">Email</small>
            <p class="text-1rem font-medium leading-5 mb-2">{{ $email }}</p>
        </div>
        <div class="w-full md:w-1/3">
            <small class="font-normal text-darkGray pt-2.5 text-xs">Role</small>
            <p class="text-1rem font-medium leading-5 mb-2">{{ ucwords($role) }}</p>
        </div>
        <div class="w-full md:w-1/3">
            <small class="font-normal text-darkGray pt-2.5 text-xs">Account Status</small>
            <p class="text-1rem font-medium leading-5 mb-2">{{ $status }}</p>
        </div>
    </div>

    {{-- Close button --}}
    <div class="flex justify-end items-center mt-4">
        <x-button x-on:click="$dispatch('close-modal')" btnType="secondary" wire:loading.attr="disabled">Close
        </x-button>
    </div>
</div>