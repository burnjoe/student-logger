<div>
    <form wire:submit.prevent="{{ $action }}">
        <div class="px-5">
            <span class="text-1rem font-bold">Personal Information</span>
        </div>
        <div class="flex flex-wrap pb-5">
            {{-- Last Name --}}
            <div class="w-full md:w-1/3 px-5 mt-4">
                <x-input-label for="last_name" :required="true">
                    <small class="font-normal text-darkGray text-xs">Last Name</small>
                </x-input-label>
                <x-input-text id="last_name" wire:model="last_name" name="last_name" type="text"
                    placeholder="{{ __('Last Name') }}" class="mt-1"
                    :messages="$errors->get('last_name')" />
                <x-input-error :messages="$errors->get('last_name')" />
            </div>
            {{-- First Name --}}
            <div class="w-full md:w-1/3 px-5 mt-4">
                <x-input-label for="first_name" :required="true">
                    <small class="font-normal text-darkGray text-xs">First Name</small>
                </x-input-label>
                <x-input-text id="first_name" wire:model="first_name" name="first_name" type="text"
                    placeholder="{{ __('First Name') }}" class="mt-1"
                    :messages="$errors->get('first_name')" />
                <x-input-error :messages="$errors->get('first_name')" />
            </div>
            {{-- Middle Name --}}
            <div class="w-full md:w-1/3 px-5 mt-4">
                <x-input-label for="middle_name">
                    <small class="font-normal text-darkGray text-xs">Middle Name</small>
                </x-input-label>
                <x-input-text id="middle_name" wire:model="middle_name" name="middle_name" type="text"
                    placeholder="{{ __('Middle Name') }}" class="mt-1"
                    :messages="$errors->get('middle_name')" />
                <x-input-error :messages="$errors->get('middle_name')" />
            </div>

            {{-- Student Number --}}
            <div class="w-full md:w-1/2 px-5 mt-4">
                <x-input-label for="student_no" :required="true">
                    <small class="font-normal text-darkGray text-xs">Student Number</small>
                </x-input-label>
                <x-input-text id="student_no" wire:model="student_no" name="student_no" type="text"
                    placeholder="{{ __('Student Number') }}" class="mt-1"
                    :messages="$errors->get('student_no')" />
                <x-input-error :messages="$errors->get('student_no')" />
            </div>
            {{-- Account Type --}}
            <div class="w-full md:w-1/2 px-5 mt-4">
                <x-input-label for="account_type" :required="true">
                    <small class="font-normal text-darkGray text-xs">Account Type</small>
                </x-input-label>
                <x-input-select id="account_type" wire:model="account_type" name="account_type"
                    class="mt-1" :messages="$errors->get('account_type')">
                    <option selected hidden>Account Type</option>
                    <option value="Cabuyeño">Cabuyeño</option>
                    <option value="Non-Cabuyeño">Non-Cabuyeño</option>
                </x-input-select>
                <x-input-error :messages="$errors->get('account_type')" />
            </div>

            {{-- Sex --}}
            <div class="w-full md:w-1/3 px-5 mt-4">
                <x-input-label for="sex" :required="true">
                    <small class="font-normal text-darkGray text-xs">Sex</small>
                </x-input-label>
                <x-input-select id="sex" wire:model="sex" name="sex" class="mt-1"
                    :messages="$errors->get('sex')">
                    <option selected hidden>Sex</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </x-input-select>
                <x-input-error :messages="$errors->get('sex')" />
            </div>
            {{-- Nationality --}}
            <div class="w-full md:w-1/3 px-5 mt-4">
                <x-input-label for="nationality" :required="true">
                    <small class="font-normal text-darkGray text-xs">Nationality</small>
                </x-input-label>
                <x-input-text id="nationality" wire:model="nationality" name="nationality" type="text"
                    placeholder="{{ __('Nationality') }}" class="mt-1"
                    :messages="$errors->get('nationality')" />
                <x-input-error :messages="$errors->get('nationality')" />
            </div>
            {{-- Civil Status --}}
            <div class="w-full md:w-1/3 px-5 mt-4">
                <x-input-label for="civil_status" :required="true">
                    <small class="font-normal text-darkGray text-xs">Civil Status</small>
                </x-input-label>
                <x-input-select id="civil_status" wire:model="civil_status" name="civil_status"
                    class="mt-1" :messages="$errors->get('civil_status')">
                    <option selected hidden>Civil Status</option>
                    <option value="Single">Single</ option>
                    <option value="Married">Married</option>
                    <option value="Divorced">Divorced</option>
                    <option value="Widowed">Widowed</option>
                </x-input-select>
                <x-input-error :messages="$errors->get('civil_status')" />
            </div>

            {{-- Date of Birth --}}
            <div class="w-full md:w-1/2 px-5 mt-4">
                <x-input-label for="birthdate" :required="true">
                    <small class="font-normal text-darkGray text-xs">Date of Birth</small>
                </x-input-label>
                <x-input-text id="birthdate" wire:model="birthdate" name="birthdate" type="date"
                    class="mt-1" :messages="$errors->get('birthdate')" />
                <x-input-error :messages="$errors->get('birthdate')" />
            </div>
            {{-- Place of Birth --}}
            <div class="w-full md:w-1/2 px-5 mt-4">
                <x-input-label for="birthplace" :required="true">
                    <small class="font-normal text-darkGray text-xs">Place of Birth</small>
                </x-input-label>
                <x-input-text id="birthplace" wire:model="birthplace" name="birthplace" type="text"
                    placeholder="{{ __('Place of Birth') }}" class="mt-1"
                    :messages="$errors->get('birthplace')" />
                <x-input-error :messages="$errors->get('birthplace')" />
            </div>
        </div>

        <div class="px-5">
            <span class="text-1rem font-bold">Contact Information</span>
        </div>
        <div class="flex flex-wrap pb-5">
            {{-- Address --}}
            <div class="mt-4 w-full px-5">
                <x-input-label for="address" :required="true">
                    <small class="font-normal text-darkGray text-xs">Home Address</small>
                </x-input-label>
                <x-input-text id="address" wire:model="address" name="address" type="text"
                    placeholder="{{ __('Address') }}" class="mt-1" :messages="$errors->get('address')" />
                <x-input-error :messages="$errors->get('address')" />
            </div>

            {{-- Phone Number --}}
            <div class="w-full md:w-1/2 px-5 mt-4">
                <x-input-label for="phone" :required="true">
                    <small class="font-normal text-darkGray text-xs">Phone Number</small>
                </x-input-label>
                <x-input-text id="phone" wire:model="phone" name="phone" type="text"
                    class="mt-1 ps-12 flex items-center" alignIcon="left"
                    :messages="$errors->get('phone')">
                    <span>+63</span>
                </x-input-text>
                <x-input-error :messages="$errors->get('phone')" />
            </div>
            {{-- Email --}}
            <div class="mt-4 w-full md:w-1/2 px-5">
                <x-input-label for="email" :required="true">
                    <small class="font-normal text-darkGray text-xs">Email</small>
                </x-input-label>
                <x-input-text id="email" wire:model="email" name="email" type="email"
                    placeholder="{{ __('Email Address') }}" class="mt-1"
                    :messages="$errors->get('email')" />
                <x-input-error :messages="$errors->get('email')" />
            </div>
        </div>

        {{-- Submit --}}
        <div class="flex justify-end items-center space-x-4 mt-6 pe-5">
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