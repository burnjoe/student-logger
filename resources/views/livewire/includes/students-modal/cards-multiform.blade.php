<div>
    {{-- Step 1: Upload Photo --}}
    {{-- Step 2: Select Emergency Contact Person --}}
    {{-- Step 3: Scan RFID --}}
    {{-- Step 4: Confirmation/Disable Current Active RFID --}}

    <div class="px-5">
        <div class="mb-1 text-base font-medium dark:text-white">Step {{$currentStep}} of {{$totalSteps}}</div>
        <div class="w-full bg-gray rounded-full h-2.5 mb-4">
            <div class="bg-lightGreen h-2.5 rounded-full transition-all duration-500"
                style="width: {{$currentStep/5*100}}%"></div>
        </div>
    </div>

    {{-- Step 1 --}}
    @if($currentStep === 1)
    <div class="pt-4 mb-3 px-5">
        <span class="text-lg font-bold">Select ID Issuance Reason</span>
    </div>

    {{-- ID Issuance Reason --}}
    <div class="flex flex-wrap pb-5 px-5">
        <div class="w-full md:w-1/2 mt-4">
            <x-input-label for="issuance_reason" :required="true">
                <small class="font-normal text-darkGray text-xs">ID Issuance Reason</small>
            </x-input-label>
            <x-input-select id="issuance_reason" wire:model="issuance_reason" class="mt-1"
                :messages="$errors->get('issuance_reason')">
                <option selected hidden>Select ID Issuance Reason</option>
                <option value="First Issue">First Issue</option>
                <option value="Renewal">Renewal</option>
                <option value="Reissue for Lost ID">Reissue for Lost ID</option>
            </x-input-select>
            <x-input-error :messages="$errors->get('issuance_reason')" />
        </div>
    </div>
    @endif

    {{-- Step 2 --}}
    @if($currentStep === 2)
    <div class="pt-4 mb-3 px-5">
        <span class="text-lg font-bold">Upload ID Picture</span>
    </div>

    <div class="flex flex-wrap pb-5 px-5">
        {{-- Profile Picture Wrapper --}}
        <div class="w-full text-center">
            <img class="object-cover object-center h-52 w-52 rounded-full border border-2 border-gray my-4 mx-auto"
                alt="Profile Picture" src="{{ $temporaryUrl ? $temporaryUrl : asset('img/user_icon.png') }}">

            <p class="text-darkGray text-lg font-semibold">{{ $first_name.' '.($middle_name ?
                strtoupper(substr($middle_name, 0, 1)).'.' : '').' '.$last_name }}</p>
        </div>

        {{-- Profile Photo --}}
        <div class="mx-auto w-full md:w-1/2 mt-4">
            <x-input-label for="profile_photo" :required="true">
                <small class="font-normal text-darkGray text-xs">ID Picture</small>
            </x-input-label>
            <x-input-text class="text-xs" id="profile_photo" wire:model="profile_photo" type="file"
                placeholder="{{ __('ID Picture') }}" class="mt-1 bg-lightGray"
                :messages="$errors->get('profile_photo')" />
            <x-input-error :messages="$errors->get('profile_photo')" />
            <small class="text-xs text-darkGray">Allowed file types: png, jpg | Maximum File Size: 2MB</small>
        </div>
    </div>
    @endif

    {{-- Step 3 --}}
    @if($currentStep === 3)
    <div class="pt-4 mb-3 px-5">
        <span class="text-lg font-bold">Select Emergency Contact Person</span>
    </div>

    {{-- Emergency Contact Person --}}
    <div class="flex flex-wrap pb-5 px-5">
        <div class="w-full md:w-1/2 mt-4">
            <x-input-label for="contact_person_id" :required="true">
                <small class="font-normal text-darkGray text-xs">Emergency Contact Person</small>
            </x-input-label>
            <x-input-select id="contact_person_id" wire:model="contact_person_id" class="mt-1"
                :messages="$errors->get('contact_person_id')">
                <option selected hidden>Select Emergency Contact Person</option>
                @foreach ($selectedStudent->family_members()->whereEncrypted('phone', '!==', null) as $family_member)
                <option value="{{$family_member->id}}">{{$family_member->relationship . ' - ' . $family_member->first_name . ' ' . $family_member->last_name}}</option>    
                @endforeach
            </x-input-select>
            <x-input-error :messages="$errors->get('contact_person_id')" />
        </div>
    </div>
    @endif

    {{-- Step 4 --}}
    @if($currentStep === 4)
    <div class="pt-4 mb-3 px-5">
        <span class="text-lg font-bold">Tap RFID on Reader</span>
    </div>

    <div class="w-full text-center border border-t-0 border-l-0 border-r-0 border-lightGray md:border-b-0"
        x-data="{ rfid: '', timer: null}" x-init="$watch('rfid', value => rfid = value)" @keydown.window="if ($event.key.match(/^[0-9A-Za-z]$/)) {
            rfid += $event.key;
            clearTimeout(timer);
            timer = setTimeout(() => {
                rfid = '';
            }, 50);
        } else if ($event.key.match(/\r|Enter/)) {
            $dispatch('validateRfid', {rfid: rfid});
        }">
        <p class="text-2xl font-bold text-center text-veryDarkGray">TAP ID ON READER</p>
        <img src="{{ asset('img/reader-icon.jpg') }}" alt="Tap RFID on Reader"
            class="rounded-full border border-3 border-lightGray mx-auto mt-2.5 pb-4 opacity-50"
            style="border-width: 3px !important;" width="250">

        <input type="text" x-model="rfid" hidden />
    </div>
    @endif

    {{-- Step 5 --}}
    @if($currentStep === 5)
    <div class="pt-4 mb-3 px-5">
        <span class="text-lg font-bold">Confirmation Before Saving</span>
    </div>

    <x-card class="mx-5 my-8" padding="px-6 pt-4 pb-8">
        <p class="font-bold mb-3">Card Information:</p>

        <div class="flex flex-col md:flex-row">
            <!-- Left Side  -->
            <div class="w-full md:w-1/4 text-center">
                <!-- Profile Picture -->
                <img class="object-cover object-center h-52 w-52 rounded-full border border-2 border-gray my-4 mx-auto"
                    alt="Profile Picture"
                    src="{{ $profile_photo ? $profile_photo->temporaryUrl() : asset('img/user_icon.png') }}" alt="">
            </div>

            <div class="w-full md:w-3/4">
                <div class="flex flex-wrap px-5">
                    {{-- Student Number --}}
                    <div class="w-full md:w-1/2">
                        <small class="font-normal text-darkGray text-xs">Student Number</small>
                        <h6 class="text-1rem font-medium leading-5 mb-2">{{ $selectedStudent->student_no }}</h6>
                    </div>
                    {{-- Student Name --}}
                    <div class="w-full md:w-1/2">
                        <small class="font-normal text-darkGray text-xs">Student</small>
                        <h6 class="text-1rem font-medium leading-5 mb-2">{{ $selectedStudent->first_name.' '.($selectedStudent->middle_name ?
                            strtoupper(substr($selectedStudent->middle_name, 0, 1)).'.' : '').' '.$selectedStudent->last_name }}</h6>
                    </div>
                    {{-- Program --}}
                    <div class="w-full md:w-1/2">
                        <small class="font-normal text-darkGray text-xs">Program</small>
                        <h6 class="text-1rem font-medium leading-5 mb-2">BSCS</h6>
                    </div>
                    {{-- Date of Birth --}}
                    <div class="w-full md:w-1/2">
                        <small class="font-normal text-darkGray text-xs">Date of Birth</small>
                        <h6 class="text-1rem font-medium leading-5 mb-2">{{ Carbon\Carbon::parse($selectedStudent->birthdate)->format('F
                            j, Y') }}</h6>
                    </div>
                    {{-- Address --}}
                    <div class="w-full">
                        <small class="font-normal text-darkGray text-xs">Address</small>
                        <h6 class="text-1rem font-medium leading-5 mb-2">{{ $selectedStudent->address }}</h6>
                    </div>
                    {{-- ID Expiration Date --}}
                    <div class="w-full md:w-1/2">
                        <small class="font-normal text-darkGray text-xs">ID Expiration Date</small>
                        <h6 class="text-1rem font-medium leading-5 mb-2">{{ now()->addYears(2)->format('F j, Y') }}</h6>
                    </div>
                    {{-- ID Status --}}
                    <div class="w-full md:w-1/2">
                        <small class="font-normal text-darkGray text-xs">RFID Status</small>
                        <p>
                            <x-badge class="bg-green text-white">ACTIVE</x-badge>
                        </p>
                    </div>
                </div>

                {{-- Emergency Contact --}}
                <div class="pt-4 px-5">
                    <span class="text-1rem font-bold">Emergency Contact</span>
                </div>

                @php
                    $contact_person = $selectedStudent->family_members->where('id', $contact_person_id)->first();
                @endphp

                <div class="flex flex-wrap px-5 pt-2.5">
                    {{-- Contact Person --}}
                    <div class="w-full md:w-1/2">
                        <small class="font-normal text-darkGray text-xs">Emergency Contact Person
                            (Parent/Guardian)</small>
                        <h6 class="text-1rem font-medium leading-5 mb-2">{{ $contact_person->first_name . ' ' . $contact_person->last_name }}</h6>
                    </div>
                    {{-- Contact No --}}
                    <div class="w-full md:w-1/2">
                        <small class="font-normal text-darkGray text-xs">Contact Number</small>
                        <h6 class="text-1rem font-medium leading-5 mb-2">{{ '0'.$contact_person->phone }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </x-card>
    @endif

    {{-- Prev and Next button --}}
    <div class="flex @if($currentStep === 1) justify-end @else justify-between @endif items-center mt-4 px-5">
        @if(in_array($currentStep, [2, 3, 4, 5]))
        <x-button wire:click.prevent="prevStep" btnType="secondary" wire:loading.attr="disabled">
            <i class="fa-solid fa-arrow-left me-1"></i>
            Back
        </x-button>
        @endif
        <div class="flex items-center space-x-4">
            <x-button x-on:click="$dispatch('close-modal')" btnType="secondary" wire:loading.attr="disabled">
                Cancel
            </x-button>
            @if(in_array($currentStep, [1, 2, 3]))
            <x-button wire:click.prevent="nextStep" btnType="success" wire:loading.attr="disabled">
                Next
                <i class="fa-solid fa-arrow-right ms-1"></i>
            </x-button>
            @endif
            @if($currentStep === 5)
            <x-button wire:click.prevent="storeCard" btnType="success" wire:loading.attr="disabled">
                Save
            </x-button>
            @endif
        </div>
    </div>

</div>