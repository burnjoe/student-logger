<div>
    <form wire:submit.prevent="{{ $action }}">
        {{-- Student Number --}}
        <div>
            <x-input-label for="student_no" :value="__('Student Number')" :required="true" />
            <x-input-text 
                id="student_no"
                wire:model="student_no"
                name="student_no"
                type="text"
                placeholder="{{ __('Student Number') }}"
                class="mt-1 bg-lightGray"
                :messages="$errors->get('student_no')" />
            <x-input-error class="mt-2" :messages="$errors->get('student_no')" />
        </div>
        {{-- Last Name --}}
        <div class="mt-4">
            <x-input-label for="last_name" :value="__('Last Name')" :required="true" />
            <x-input-text 
                id="last_name"
                wire:model="last_name"
                name="last_name"
                type="text"
                placeholder="{{ __('Last Name') }}"
                class="mt-1 bg-lightGray"
                :messages="$errors->get('last_name')" />
            <x-input-error class="mt-2" :messages="$errors->get('last_name')" />
        </div>
        {{-- First Name --}}
        <div class="mt-4">
            <x-input-label for="first_name" :value="__('First Name')" :required="true" />
            <x-input-text 
                id="first_name"
                wire:model="first_name"
                name="first_name"
                type="text"
                placeholder="{{ __('First Name') }}"
                class="mt-1 bg-lightGray"
                :messages="$errors->get('first_name')" />
            <x-input-error class="mt-2" :messages="$errors->get('first_name')" />
        </div>
        {{-- Middle Name --}}
        <div class="mt-4">
            <x-input-label for="middle_name" :value="__('Middle Name')" />
            <x-input-text 
                id="middle_name"
                wire:model="middle_name"
                name="middle_name"
                type="text"
                placeholder="{{ __('Middle Name') }}"
                class="mt-1 bg-lightGray"
                :messages="$errors->get('middle_name')" />
            <x-input-error class="mt-2" :messages="$errors->get('middle_name')" />
        </div>
        {{-- Sex --}}
        <div class="mt-4 text-gray">
            <x-input-label for="sex" :value="__('Sex')" :required="true" />
            <x-input-select 
                id="sex" 
                wire:model="sex" 
                name="sex" 
                class="mt-1 bg-lightGray"
                :messages="$errors->get('sex')">
                <option selected hidden>Sex</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </x-input-select>
            <x-input-error class="mt-2" :messages="$errors->get('sex')" />
        </div>
        {{-- Civil Status --}}
        <div class="mt-4 text-gray">
            <x-input-label for="civil_status" :value="__('Civil Status')" :required="true" />
            <x-input-select 
                id="civil_status" 
                wire:model="civil_status" 
                name="civil_status" 
                class="mt-1 bg-lightGray"
                :messages="$errors->get('civil_status')">
                <option selected hidden>Civil Status</option>
                <option value="Single">Single</	option>
                <option value="Married">Married</option>
                <option value="Divorced">Divorced</option>
                <option value="Widowed">Widowed</option>
            </x-input-select>
            <x-input-error class="mt-2" :messages="$errors->get('civil_status')" />
        </div>
        {{-- Nationality --}}
        <div class="mt-4">
            <x-input-label for="nationality" :value="__('Nationality')" :required="true"/>
            <x-input-text 
                id="nationality"
                wire:model="nationality"
                name="nationality"
                type="text"
                placeholder="{{ __('Nationality') }}"
                class="mt-1 bg-lightGray"
                :messages="$errors->get('nationality')" />
            <x-input-error class="mt-2" :messages="$errors->get('nationality')" />
        </div>
        {{-- Birthdate --}}
        <div class="mt-4">
            <x-input-label for="birthdate" :value="__('Date of Birth')" :required="true"/>
            <x-input-text 
                id="birthdate"
                wire:model="birthdate"
                name="birthdate"
                type="date"
                class="mt-1 bg-lightGray"
                :messages="$errors->get('birthdate')" />
            <x-input-error class="mt-2" :messages="$errors->get('birthdate')" />
        </div>
        {{-- Birthplace --}}
        <div class="mt-4">
            <x-input-label for="birthplace" :value="__('Place of Birth')" :required="true"/>
            <x-input-text 
                id="birthplace"
                wire:model="birthplace"
                name="birthplace"
                type="text"
                placeholder="{{ __('Place of Birth') }}"
                class="mt-1 bg-lightGray"
                :messages="$errors->get('birthplace')" />
            <x-input-error class="mt-2" :messages="$errors->get('birthplace')" />
        </div>
        {{-- Address --}}
        <div class="mt-4">
            <x-input-label for="address" :value="__('Address')" :required="true"/>
            <x-input-text 
                id="address"
                wire:model="address"
                name="address"
                type="text"
                placeholder="{{ __('Address') }}"
                class="mt-1 bg-lightGray"
                :messages="$errors->get('address')" />
            <x-input-error class="mt-2" :messages="$errors->get('address')" />
        </div>
        {{-- Account Type --}}
        <div class="mt-4 text-gray">
            <x-input-label for="account_type" :value="__('Account Type')" :required="true" />
            <x-input-select 
                id="account_type" 
                wire:model="account_type" 
                name="account_type" 
                class="mt-1 bg-lightGray"
                :messages="$errors->get('account_type')">
                <option selected hidden>Account Type</option>
                <option value="Cabuyeño">Cabuyeño</option>
                <option value="Non-Cabuyeño">Non-Cabuyeño</option>
            </x-input-select>
            <x-input-error class="mt-2" :messages="$errors->get('account_type')" />
        </div>
        {{-- Phone --}}
        <div class="mt-4">
            <x-input-label for="phone" :value="__('Phone Number')" :required="true"/>
            <x-input-text 
                id="phone"
                wire:model="phone"
                name="phone"
                type="text"
                class="mt-1 bg-lightGray ps-12 flex items-center" 
                alignIcon="left" 
                :messages="$errors->get('phone')">
                <span class="text-darkGray">+63</span>
            </x-input-text>
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>
        {{-- Email --}}
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email Address')" :required="true"/>
            <x-input-text 
                id="email"
                wire:model="email"
                name="email"
                type="email"
                placeholder="{{ __('Email Address') }}"
                class="mt-1 bg-lightGray"
                :messages="$errors->get('email')" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>
        {{-- Submit --}}
        <div class="flex justify-end items-center mt-4 space-x-4">
            {{-- x-on:click.prevent="$dispatch('close-modal')" --}}
            <div class="flex space-x-4">
                <span wire:loading wire:target="{{ $action }}">
                    Saving...
                </span>
                <x-button 
                    x-on:click.prevent="$dispatch('close-modal')" 
                    btnType="secondary" 
                    wire:loading.class="cursor-not-allowed" 
                    wire:loading.attr="disabled">
                    Cancel
                </x-button>
                <x-button 
                    type="submit" 
                    btnType="success" 
                    wire:loading.class="cursor-wait" 
                    wire:loading.attr="disabled">
                    Save
                </x-button>
            </div>
        </div>
    </form>
</div>
