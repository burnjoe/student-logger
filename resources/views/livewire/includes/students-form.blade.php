<div>
    <form wire:submit.prevent="{{ $action }}">
        <div class="flex flex-col md:flex-row">
            {{-- Left Side --}}
            <div class="w-full md:w-1/4 text-center">
                <!-- Profile Picture -->
                <img src="{{ asset('img/user_icon.png') }}" alt="Profile Picture"
                    class="rounded-full border border-3 border-lightGray mx-auto mb-4 mt-4"
                    style="border-width: 3px !important;" width="150">
                <h6 class="text-1rem font-medium leading-5">Profile Picture</h6>
                <div class="pt-2.5">
                    <x-button btnType="warning" textSize="text-xs">
                        Change Picture
                    </x-button>
                </div>
            </div>
            {{-- Right Side --}}
            <div class="w-full md:w-3/4">
                <div class="flex flex-wrap pb-5">
                    <div class="w-full md:w-1/2 px-5">
                        {{-- Last Name --}}
                        <div class="mt-4">
                            <x-input-label for="last_name" :required="true">
                                <small class="font-normal text-darkGray text-xs">Last Name</small>
                            </x-input-label>
                            <x-input-text id="last_name" wire:model="last_name" name="last_name" type="text"
                                placeholder="{{ __('Last Name') }}" class="mt-1 bg-lightGray"
                                :messages="$errors->get('last_name')" />
                            <x-input-error class="absolute" :messages="$errors->get('last_name')" />
                        </div>
                        {{-- First Name --}}
                        <div class="mt-4">
                            <x-input-label for="first_name" :required="true">
                                <small class="font-normal text-darkGray text-xs">First Name</small>
                            </x-input-label>
                            <x-input-text id="first_name" wire:model="first_name" name="first_name" type="text"
                                placeholder="{{ __('First Name') }}" class="mt-1 bg-lightGray"
                                :messages="$errors->get('first_name')" />
                            <x-input-error class="absolute" :messages="$errors->get('first_name')" />
                        </div>
                        {{-- Middle Name --}}
                        <div class="mt-4">
                            <x-input-label for="middle_name">
                                <small class="font-normal text-darkGray text-xs">Middle Name</small>
                            </x-input-label>
                            <x-input-text id="middle_name" wire:model="middle_name" name="middle_name" type="text"
                                placeholder="{{ __('Middle Name') }}" class="mt-1 bg-lightGray"
                                :messages="$errors->get('middle_name')" />
                            <x-input-error class="absolute" :messages="$errors->get('middle_name')" />
                        </div>
                        {{-- Student Number --}}
                        <div class="mt-4">
                            <x-input-label for="student_no" :required="true">
                                <small class="font-normal text-darkGray text-xs">Student Number</small>
                            </x-input-label>
                            <x-input-text id="student_no" wire:model="student_no" name="student_no" type="text"
                                placeholder="{{ __('Student Number') }}" class="mt-1 bg-lightGray"
                                :messages="$errors->get('student_no')" />
                            <x-input-error class="absolute" :messages="$errors->get('student_no')" />
                        </div>
                        {{-- Account Type --}}
                        <div class="mt-4 text-gray">
                            <x-input-label for="account_type" :required="true">
                                <small class="font-normal text-darkGray text-xs">Account Type</small>
                            </x-input-label>
                            <x-input-select id="account_type" wire:model="account_type" name="account_type"
                                class="mt-1 bg-lightGray" :messages="$errors->get('account_type')">
                                <option selected hidden>Account Type</option>
                                <option value="Cabuyeño">Cabuyeño</option>
                                <option value="Non-Cabuyeño">Non-Cabuyeño</option>
                            </x-input-select>
                            <x-input-error class="absolute" :messages="$errors->get('account_type')" />
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 px-5">
                        {{-- Sex --}}
                        <div class="mt-4 text-gray">
                            <x-input-label for="sex" :required="true">
                                <small class="font-normal text-darkGray text-xs">Sex</small>
                            </x-input-label>
                            <x-input-select id="sex" wire:model="sex" name="sex" class="mt-1 bg-lightGray"
                                :messages="$errors->get('sex')">
                                <option selected hidden>Sex</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </x-input-select>
                            <x-input-error class="absolute" :messages="$errors->get('sex')" />
                        </div>
                        {{-- Phone Number --}}
                        <div class="mt-4">
                            <x-input-label for="phone" :required="true">
                                <small class="font-normal text-darkGray text-xs">Phone Number</small>
                            </x-input-label>
                            <x-input-text id="phone" wire:model="phone" name="phone" type="text"
                                class="mt-1 bg-lightGray ps-12 flex items-center" alignIcon="left"
                                :messages="$errors->get('phone')">
                                <span>+63</span>
                            </x-input-text>
                            <x-input-error class="absolute" :messages="$errors->get('phone')" />
                        </div>
                        {{-- Civil Status --}}
                        <div class="mt-4 text-gray">
                            <x-input-label for="civil_status" :required="true">
                                <small class="font-normal text-darkGray text-xs">Civil Status</small>
                            </x-input-label>
                            <x-input-select id="civil_status" wire:model="civil_status" name="civil_status"
                                class="mt-1 bg-lightGray" :messages="$errors->get('civil_status')">
                                <option selected hidden>Civil Status</option>
                                <option value="Single">Single</ option>
                                <option value="Married">Married</option>
                                <option value="Divorced">Divorced</option>
                                <option value="Widowed">Widowed</option>
                            </x-input-select>
                            <x-input-error class="absolute" :messages="$errors->get('civil_status')"
                                class="font-normal text-50">
                                <small class="font-normal text-darkGray text-xs">Last Name</small>
                                </x-input-label>
                        </div>
                        {{-- Nationality --}}
                        <div class="mt-4">
                            <x-input-label for="nationality" :required="true">
                                <small class="font-normal text-darkGray text-xs">Nationality</small>
                            </x-input-label>
                            <x-input-text id="nationality" wire:model="nationality" name="nationality" type="text"
                                placeholder="{{ __('Nationality') }}" class="mt-1 bg-lightGray"
                                :messages="$errors->get('nationality')" />
                            <x-input-error class="absolute" :messages="$errors->get('nationality')" />
                        </div>
                        {{-- Birthdate --}}
                        <div class="mt-4">
                            <x-input-label for="birthdate" :required="true">
                                <small class="font-normal text-darkGray text-xs">Birthdate</small>
                            </x-input-label>
                            <x-input-text id="birthdate" wire:model="birthdate" name="birthdate" type="date"
                                class="mt-1 bg-lightGray" :messages="$errors->get('birthdate')" />
                            <x-input-error class="absolute" :messages="$errors->get('birthdate')" />
                        </div>
                    </div>
                    {{-- Birthplace --}}
                    <div class="mt-4 w-full px-5">
                        <x-input-label for="birthplace" :required="true">
                            <small class="font-normal text-darkGray text-xs">Birthplace</small>
                        </x-input-label>
                        <x-input-text id="birthplace" wire:model="birthplace" name="birthplace" type="text"
                            placeholder="{{ __('Place of Birth') }}" class="mt-1 bg-lightGray"
                            :messages="$errors->get('birthplace')" />
                        <x-input-error class="absolute" :messages="$errors->get('birthplace')" />
                    </div>
                    {{-- Email --}}
                    <div class="mt-4 w-full px-5">
                        <x-input-label for="email" :required="true">
                            <small class="font-normal text-darkGray text-xs">Email</small>
                        </x-input-label>
                        <x-input-text id="email" wire:model="email" name="email" type="email"
                            placeholder="{{ __('Email Address') }}" class="mt-1 bg-lightGray"
                            :messages="$errors->get('email')" />
                        <x-input-error class="absolute" :messages="$errors->get('email')" />
                    </div>
                    {{-- Address --}}
                    <div class="mt-4 w-full px-5">
                        <x-input-label for="address" :required="true">
                            <small class="font-normal text-darkGray text-xs">Address</small>
                        </x-input-label>
                        <x-input-text id="address" wire:model="address" name="address" type="text"
                            placeholder="{{ __('Address') }}" class="mt-1 bg-lightGray"
                            :messages="$errors->get('address')" />
                        <x-input-error class="absolute" :messages="$errors->get('address')" />
                    </div>
                </div>
            </div>
        </div>
        {{-- Family Background --}}
        <div class="border border-t-0 border-l-0 border-r-0 border-lightGray border-lightGray">
            <span class="text-1rem font-bold">Family Background</span>
        </div>
        <div class="flex flex-wrap pb-5">
            {{-- Father's Name --}}
            <div class="mt-4 w-full md:w-1/2 px-5">
                <x-input-label for="email" :required="true">
                    <small class="font-normal text-darkGray text-xs">Father's Name</small>
                </x-input-label>
                <x-input-text id="email" wire:model="email" name="email" type="email"
                    placeholder="{{ __('Father\'s Name') }}" class="mt-1 bg-lightGray"
                    :messages="$errors->get('email')" />
                <x-input-error class="absolute" :messages="$errors->get('email')" />
            </div>
            {{-- Father's Occupation --}}
            <div class="mt-4 w-full md:w-1/2 px-5">
                <x-input-label for="email" :required="true">
                    <small class="font-normal text-darkGray text-xs">Father's Occupation</small>
                </x-input-label>
                <x-input-text id="email" wire:model="email" name="email" type="email"
                    placeholder="{{ __('Father\'s Occupation') }}" class="mt-1 bg-lightGray"
                    :messages="$errors->get('email')" />
                <x-input-error class="absolute" :messages="$errors->get('email')" />
            </div>
            {{-- Mother's Name --}}
            <div class="mt-4 w-full md:w-1/2 px-5">
                <x-input-label for="email" :required="true">
                    <small class="font-normal text-darkGray text-xs">Mother's Name</small>
                </x-input-label>
                <x-input-text id="email" wire:model="email" name="email" type="email"
                    placeholder="{{ __('Mother\'s Name') }}" class="mt-1 bg-lightGray"
                    :messages="$errors->get('email')" />
                <x-input-error class="absolute" :messages="$errors->get('email')" />
            </div>
            {{-- Mother's Occupation --}}
            <div class="mt-4 w-full md:w-1/2 px-5">
                <x-input-label for="email" :required="true">
                    <small class="font-normal text-darkGray text-xs">Mother's Occupation</small>
                </x-input-label>
                <x-input-text id="email" wire:model="email" name="email" type="email"
                    placeholder="{{ __('Mother\'s Occupation') }}" class="mt-1 bg-lightGray"
                    :messages="$errors->get('email')" />
                <x-input-error class="absolute" :messages="$errors->get('email')" />
            </div>
            {{-- Guardian's Name --}}
            <div class="mt-4 w-full md:w-1/2 px-5">
                <x-input-label for="email" :required="true">
                    <small class="font-normal text-darkGray text-xs">Guardian's Name</small>
                </x-input-label>
                <x-input-text id="email" wire:model="email" name="email" type="email"
                    placeholder="{{ __('Guardian\'s Name') }}" class="mt-1 bg-lightGray"
                    :messages="$errors->get('email')" />
                <x-input-error class="absolute" :messages="$errors->get('email')" />
            </div>
            {{-- Relation to Guardian --}}
            <div class="mt-4 w-full md:w-1/2 px-5">
                <x-input-label for="email" :required="true">
                    <small class="font-normal text-darkGray text-xs">Relation to Guardian</small>
                </x-input-label>
                <x-input-text id="email" wire:model="email" name="email" type="email"
                    placeholder="{{ __('Relation to Guardian') }}" class="mt-1 bg-lightGray"
                    :messages="$errors->get('email')" />
                <x-input-error class="absolute" :messages="$errors->get('email')" />
                {{-- Guardian's Contact Number --}}
                <x-input-label for="email" :required="true" class="mt-4">
                    <small class="font-normal text-darkGray text-xs">Guardian's Contact Number</small>
                </x-input-label>
                <x-input-text id="email" wire:model="email" name="email" type="email"
                    placeholder="{{ __('Guardian\'s Contact Number') }}" class="mt-1 bg-lightGray"
                    :messages="$errors->get('email')" />
                <x-input-error class="absolute" :messages="$errors->get('email')" />
            </div>
        </div>
        {{-- Educational Background --}}
        <div class="border border-t-0 border-l-0 border-r-0 border-lightGray border-lightGray">
            <span class="text-1rem font-bold">Educational Background</span>
        </div>
        <div class="flex flex-wrap pb-5">
            {{-- Last School Attended --}}
            <div class="mt-4 w-full px-5">
                <x-input-label for="email" :required="true">
                    <small class="font-normal text-darkGray text-xs">Last School Attended</small>
                </x-input-label>
                <x-input-text id="email" wire:model="email" name="email" type="email"
                    placeholder="{{ __('Last School Attended') }}" class="mt-1 bg-lightGray"
                    :messages="$errors->get('email')" />
                <x-input-error class="absolute" :messages="$errors->get('email')" />
            </div>
            {{-- Last Year Attended --}}
            <div class="mt-4 w-full md:w-1/2 px-5">
                <x-input-label for="email" :required="true">
                    <small class="font-normal text-darkGray text-xs">Last Year Attended</small>
                </x-input-label>
                <x-input-text id="email" wire:model="email" name="email" type="email"
                    placeholder="{{ __('Last Year Attended') }}" class="mt-1 bg-lightGray"
                    :messages="$errors->get('email')" />
                <x-input-error class="absolute" :messages="$errors->get('email')" />
            </div>
            {{-- Learner Reference Number (LRN) --}}
            <div class="mt-4 w-full md:w-1/2 px-5">
                <x-input-label for="email" :required="true">
                    <small class="font-normal text-darkGray text-xs">Learner Reference Number
                        (LRN)</small>
                </x-input-label>
                <x-input-text id="email" wire:model="email" name="email" type="email"
                    placeholder="{{ __('Learner Reference Number (LRN)') }}" class="mt-1 bg-lightGray"
                    :messages="$errors->get('email')" />
                <x-input-error class="absolute" :messages="$errors->get('email')" />
            </div>
        </div>
        {{-- Enrolment Details --}}
        <div class="border border-t-0 border-l-0 border-r-0 border-lightGray border-lightGray">
            <span class="text-1rem font-bold">Enrolment Details</span>
        </div>
        <div class="flex flex-wrap pb-5">
            <div class="w-full">
                {{-- College --}}
                <div class="mt-4 w-full px-5">
                    <x-input-label for="email" :required="true">
                        <small class="font-normal text-darkGray text-xs">College</small>
                    </x-input-label>
                    <x-input-text id="email" wire:model="email" name="email" type="email"
                        placeholder="{{ __('College') }}" class="mt-1 bg-lightGray" :messages="$errors->get('email')" />
                    <x-input-error class="absolute" :messages="$errors->get('email')" />
                </div>
                {{-- Program --}}
                <div class="mt-4 w-full px-5">
                    <x-input-label for="email" :required="true">
                        <small class="font-normal text-darkGray text-xs">Program</small>
                    </x-input-label>
                    <x-input-text id="email" wire:model="email" name="email" type="email"
                        placeholder="{{ __('Program') }}" class="mt-1 bg-lightGray" :messages="$errors->get('email')" />
                    <x-input-error class="absolute" :messages="$errors->get('email')" />
                </div>
            </div>
            {{-- Curriculum --}}
            <div class="w-full md:w-1/2 px-5">
                <div class="mt-4">
                    <x-input-label for="email" :required="true">
                        <small class="font-normal text-darkGray text-xs">Curriculum</small>
                    </x-input-label>
                    <x-input-text id="email" wire:model="email" name="email" type="email"
                        placeholder="{{ __('Curriculum') }}" class="mt-1 bg-lightGray"
                        :messages="$errors->get('email')" />
                    <x-input-error class="absolute" :messages="$errors->get('email')" />
                </div>
            </div>
            {{-- Year Level --}}
            <div class="w-full md:w-1/4 px-5">
                <div class="mt-4">
                    <x-input-label for="email" :required="true">
                        <small class="font-normal text-darkGray text-xs">Year Level</small>
                    </x-input-label>
                    <x-input-text id="email" wire:model="email" name="email" type="email"
                        placeholder="{{ __('Year Level') }}" class="mt-1 bg-lightGray"
                        :messages="$errors->get('email')" />
                    <x-input-error class="absolute" :messages="$errors->get('email')" />
                </div>
            </div>
            {{-- Section --}}
            <div class="w-full md:w-1/4 px-5">
                <div class="mt-4">
                    <x-input-label for="email" :required="true">
                        <small class="font-normal text-darkGray text-xs">Section</small>
                    </x-input-label>
                    <x-input-text id="email" wire:model="email" name="email" type="email"
                        placeholder="{{ __('Section') }}" class="mt-1 bg-lightGray" :messages="$errors->get('email')" />
                    <x-input-error class="absolute" :messages="$errors->get('email')" />
                </div>
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