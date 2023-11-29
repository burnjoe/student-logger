<div>
    <form wire:submit.prevent="{{ $action }}">
        {{-- Personal Information --}}
        <div class="border border-t-0 border-l-0 border-r-0 border-lightGray border-lightGray px-5">
            <span class="text-1rem font-bold">Personal Information</span>
        </div>

        <div class="flex flex-wrap pb-5">
            {{-- Last Name --}}
            <div class="mt-4 w-full md:w-1/3 px-5">
                <x-input-label for="last_name" :required="true">
                    <small class="font-normal text-darkGray text-xs">Last Name</small>
                </x-input-label>
                <x-input-text id="last_name" wire:model="last_name" type="text" placeholder="{{ __('Last Name') }}"
                    class="mt-1 bg-lightGray" :messages="$errors->get('last_name')" />
                <x-input-error class="absolute" :messages="$errors->get('last_name')" />
            </div>
            {{-- First Name --}}
            <div class="mt-4 w-full md:w-1/3 px-5">
                <x-input-label for="first_name" :required="true">
                    <small class="font-normal text-darkGray text-xs">First Name</small>
                </x-input-label>
                <x-input-text id="first_name" wire:model="first_name" type="text" placeholder="{{ __('First Name') }}"
                    class="mt-1 bg-lightGray" :messages="$errors->get('first_name')" />
                <x-input-error class="absolute" :messages="$errors->get('first_name')" />
            </div>
            {{-- First Name --}}
            <div class="mt-4 w-full md:w-1/3 px-5">
                <x-input-label for="middle_name">
                    <small class="font-normal text-darkGray text-xs">Middle Name</small>
                </x-input-label>
                <x-input-text id="middle_name" wire:model="middle_name" type="text"
                    placeholder="{{ __('Middle Name') }}" class="mt-1 bg-lightGray"
                    :messages="$errors->get('middle_name')" />
                <x-input-error class="absolute" :messages="$errors->get('middle_name')" />
            </div>

            {{-- Sex --}}
            <div class="mt-4 w-full md:w-1/3 px-5">
                <x-input-label for="sex" :required="true">
                    <small class="font-normal text-darkGray text-xs">Sex</small>
                </x-input-label>
                <x-input-select id="sex" wire:model="sex" class="mt-1 bg-lightGray" :messages="$errors->get('sex')">
                    <option selected hidden>Sex</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </x-input-select>
                <x-input-error class="absolute" :messages="$errors->get('sex')" />
            </div>
            {{-- Date of Birth --}}
            <div class="mt-4 w-full md:w-1/3 px-5">
                <x-input-label for="birthdate" :required="true">
                    <small class="font-normal text-darkGray text-xs">Date of Birth</small>
                </x-input-label>
                <x-input-text id="birthdate" wire:model="birthdate" type="date" class="mt-1 bg-lightGray"
                    :messages="$errors->get('birthdate')" />
                <x-input-error class="absolute" :messages="$errors->get('birthdate')" />
            </div>
            {{-- Phone Number --}}
            <div class="mt-4 w-full md:w-1/3 px-5">
                <x-input-label for="phone" :required="true">
                    <small class="font-normal text-darkGray text-xs">Phone Number</small>
                </x-input-label>
                <x-input-text id="phone" wire:model="phone" type="text"
                    class="mt-1 bg-lightGray ps-12 flex items-center" alignIcon="left"
                    :messages="$errors->get('phone')">
                    <span>+63</span>
                </x-input-text>
                <x-input-error class="absolute" :messages="$errors->get('phone')" />
            </div>

            {{-- Address --}}
            <div class="mt-4 w-full px-5">
                <x-input-label for="address" :required="true">
                    <small class="font-normal text-darkGray text-xs">Address</small>
                </x-input-label>
                <x-input-text id="address" wire:model="address" name="address" type="text"
                    placeholder="{{ __('Address') }}" class="mt-1 bg-lightGray" :messages="$errors->get('address')" />
                <x-input-error class="absolute" :messages="$errors->get('address')" />
            </div>
        </div>

        {{-- User Account Information --}}
        <div class="border border-t-0 border-l-0 border-r-0 border-lightGray border-lightGray px-5">
            <span class="text-1rem font-bold">User Account Information</span>
        </div>

        <div class="flex flex-wrap pb-5">
            {{-- Email --}}
            <div class="mt-4 w-full md:w-1/3 px-5">
                <x-input-label for="email" :required="true">
                    <small class="font-normal text-darkGray text-xs">Email</small>
                </x-input-label>
                <x-input-text id="email" wire:model="email" type="email" placeholder="{{ __('Email Address') }}"
                    class="mt-1 bg-lightGray" :messages="$errors->get('email')" />
                <x-input-error class="absolute" :messages="$errors->get('email')" />
            </div>
            {{-- Role Status --}}
            <div class="mt-4 w-full md:w-1/3 px-5">
                <x-input-label for="role" :required="true">
                    <small class="font-normal text-darkGray text-xs">Role</small>
                </x-input-label>
                <x-input-select id="role" wire:model="role" class="mt-1 bg-lightGray"
                    :messages="$errors->get('role')">
                    <option selected hidden>Role</option>
                    @foreach ($roles as $role)
                    <option value="{{ $role->name }}">{{ ucwords($role->name) }}</option>    
                    @endforeach
                </x-input-select>
                <x-input-error class="absolute" :messages="$errors->get('sex')" />
            </div>
            {{-- User Account Status --}}
            <div class="mt-4 w-full md:w-1/3 px-5">
                <x-input-label for="status" :required="true">
                    <small class="font-normal text-darkGray text-xs">Status</small>
                </x-input-label>
                <x-input-select id="status" wire:model="status" class="mt-1 bg-lightGray"
                    :messages="$errors->get('status')">
                    <option selected hidden>Account Status</option>
                    <option value="ACTIVE">ACTIVE</option>
                    <option value="INACTIVE">INACTIVE</option>
                </x-input-select>
                <x-input-error class="absolute" :messages="$errors->get('sex')" />
            </div>
        </div>

        {{-- Submit --}}
        <div class="flex justify-end items-center space-x-4 mt-6">
            <x-button x-on:click.prevent="$dispatch('close-modal')" btnType="secondary"
                wire:loading.class="cursor-not-allowed">
                Cancel
            </x-button>
            <x-button type="submit" btnType="success" wire:loading.class="cursor-wait">
                <span wire:loading.remove>
                    Save
                </span>
                <span wire:loading>
                    <i class="fa-solid fa-circle-notch animate-spin-slow mr-2"></i>
                    Saving...
                </span>
            </x-button>
        </div>
    </form>
</div>