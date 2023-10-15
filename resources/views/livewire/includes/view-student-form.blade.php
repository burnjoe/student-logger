<div x-data="{ isOpen: true }">
    <div x-show="isOpen">
        {{-- Student Information --}}
        <div class="flex flex-col md:flex-row">
            <!-- Left Side  -->
            <div class="card-body w-full md:w-1/4 text-center">
                <!-- Profile Picture -->
                <img src="{{ asset('img/user_icon.png') }}" alt="Profile Picture" class="rounded-full border border-3 border-lightGray mx-auto mb-4 mt-2.5" style="border-width: 3px !important;" width="150">
                <h6 class="text-1rem font-medium leading-5">{{ $first_name. ' ' .$middle_name. ' ' .$last_name }}</h6>
                
                <small class="font-normal text-50 text-darkGray mb-2.5" style="font-size: 80%;">Full Name</small>
            </div>
            {{-- Right Side --}}
            <div class="card-body w-full md:w-3/4">
                <div class="flex flex-wrap px-5 pb-5 pt-2.5">
                    <div class="w-full md:w-1/2">
                        <small class="font-normal text-darkGray pt-2.5" style="font-size: 65%;">Student Number</small>
                        <h6 class="text-1rem font-medium leading-5 mb-2">{{ $student_no }}</h6>
                        <small class="font-normal text-darkGray pt-2.5" style="font-size: 65%;">Student Account Type</small>
                        <h6 class="text-1rem font-medium leading-5 mb-2">{{ $account_type }}</h6>
                        <small class="font-normal text-darkGray pt-2.5" style="font-size: 65%;">Sex</small>
                        <h6 class="text-1rem font-medium leading-5 mb-2">{{ $sex }}</h6>
                        <small class="font-normal text-darkGray pt-2.5" style="font-size: 65%;">Phone Number</small>
                        <h6 class="text-1rem font-medium leading-5 mb-2">{{ $phone }}</h6>
                    </div>
                    <div class="w-full md:w-1/2">
                        <small class="font-normal text-darkGray pt-2.5" style="font-size: 65%;">Civil Status</small>
                        <h6 class="text-1rem font-medium leading-5 mb-2">{{ $civil_status }}</h6>
                        <small class="font-normal text-darkGray pt-2.5" style="font-size: 65%;">Nationality</small>
                        <h6 class="text-1rem font-medium leading-5 mb-2">{{ $nationality }}</h6>
                        <small class="font-normal text-darkGray pt-2.5" style="font-size: 65%;">Date of Birth</small>
                        <h6 class="text-1rem font-medium leading-5 mb-2">{{ $birthdate }}</h6>
                        <small class="font-normal text-darkGray pt-2.5" style="font-size: 65%;">Place of Birth</small>
                        <h6 class="text-1rem font-medium leading-5 mb-2">{{ $birthplace }}</h6>
                    </div>
                    <div class="w-full">
                        <small class="font-normal text-darkGray pt-2.5" style="font-size: 65%;">Email Address</small>
                        <h6 class="text-1rem font-medium leading-5 mb-2">{{ $email }}</h6>
                    </div>
                    <div class="w-full">
                        <small class="font-normal text-darkGray pt-2.5" style="font-size: 65%;">Home Address</small>
                        <h6 class="text-1rem font-medium leading-5 mb-2">{{ $address }}</h6>
                    </div>
                </div>
            </div>
        </div>
        {{-- Family Background --}}
        <div class="card-header border border-t-0 border-l-0 border-r-0 border-lightGray border-lightGray">
            <span class="text-1rem font-bold">Family Background</span>
        </div>
        <div class="card-body">
            <div class="flex flex-wrap px-5 pb-5 pt-2.5">
                <div class="w-full md:w-1/2">
                    <small class="font-normal text-darkGray pt-2.5" style="font-size: 65%;">Father's Name</small>
                    <h6 class="text-1rem font-medium leading-5 mb-2">Alvin Turian E. Ferreras III</h6>
                </div>
                <div class="w-full md:w-1/2">
                    <small class="font-normal text-darkGray pt-2.5" style="font-size: 65%;">Father's Occupation</small>
                    <h6 class="text-1rem font-medium leading-5 mb-2">Father's Occupation</h6>
                </div>
                <div class="w-full md:w-1/2">
                    <small class="font-normal text-darkGray pt-2.5" style="font-size: 65%;">Mother's Name</small>
                    <h6 class="text-1rem font-medium leading-5 mb-2">Mother's Name</h6>
                </div>
                <div class="w-full md:w-1/2">
                    <small class="font-normal text-darkGray pt-2.5" style="font-size: 65%;">Mother's Occupation</small>
                    <h6 class="text-1rem font-medium leading-5 mb-2">Mother's Occupation</h6>
                </div>
                <div class="w-full md:w-1/2">
                    <small class="font-normal text-darkGray pt-2.5" style="font-size: 65%;">Guardian's Name</small>
                    <h6 class="text-1rem font-medium leading-5 mb-2">Guardian's Name</h6>
                </div>
                <div class="w-full md:w-1/2">
                    <small class="font-normal text-darkGray pt-2.5" style="font-size: 65%;">Relation to Guardian</small>
                    <h6 class="text-1rem font-medium leading-5 mb-2">Relation to Guardian</h6>
                    <small class="font-normal text-darkGray pt-2.5" style="font-size: 65%;">Guardian's Contact Number</small>
                    <h6 class="text-1rem font-medium leading-5 mb-2">Guardian's Contact Number</h6>
                </div>
            </div>
        </div>
        {{-- Educational Background --}}
        <div class="card-header border border-t-0 border-l-0 border-r-0 border-lightGray">
            <span class="text-1rem font-bold">Educational Background</span>
        </div>
        <div class="card-body">
            <div class="flex flex-wrap px-5 pb-5 pt-2.5">
                <div class="w-full">
                    <small class="font-normal text-darkGray pt-2.5" style="font-size: 65%;">Last School Attended</small>
                    <h6 class="text-1rem font-medium leading-5 mb-2">Last School Attended</h6>
                </div>
                <div class="w-full md:w-1/2">
                    <small class="font-normal text-darkGray pt-2.5" style="font-size: 65%;">Last Year Attended</small>
                    <h6 class="text-1rem font-medium leading-5 mb-2">Last Year Attended</h6>
                </div>
                <div class="w-full md:w-1/2">
                    <small class="font-normal text-darkGray pt-2.5" style="font-size: 65%;">Learner Reference Number (LRN)</small>
                    <h6 class="text-1rem font-medium leading-5 mb-2">Learner Reference Number (LRN)</h6>
                </div>
            </div>
        </div>
        {{-- Enrolment Details --}}
        <div class="card-header border border-t-0 border-l-0 border-r-0 border-lightGray">
            <span class="text-1rem font-bold">Enrolment Details</span>
        </div>
        <div class="card-body">
            <div class="flex flex-wrap px-5 pb-5 pt-2.5">
                <div class="w-full">
                    <small class="font-normal text-darkGray pt-2.5" style="font-size: 65%;">College</small>
                    <h6 class="text-1rem font-medium leading-5 mb-2">College</h6>
                    <small class="font-normal text-darkGray pt-2.5" style="font-size: 65%;">Program</small>
                    <h6 class="text-1rem font-medium leading-5 mb-2">Program</h6>
                </div>
                <div class="w-full md:w-1/2">
                    <small class="font-normal text-darkGray pt-2.5" style="font-size: 65%;">Curriculum</small>
                    <h6 class="text-1rem font-medium leading-5 mb-2">Curriculum</h6>
                </div>
                <div class="w-full md:w-1/4">
                    <small class="font-normal text-darkGray pt-2.5" style="font-size: 65%;">Year Level</small>
                    <h6 class="text-1rem font-medium leading-5 mb-2">Year Level</h6>
                </div>
                <div class="w-full md:w-1/4">
                    <small class="font-normal text-darkGray pt-2.5" style="font-size: 65%;">Section</small>
                    <h6 class="text-1rem font-medium leading-5 mb-2">Section</h6>
                </div>
            </div>
        </div>
        {{-- Close button --}}
        <div class="flex justify-end items-center mt-4">
            <x-button x-on:click="$dispatch('close-modal')" btnType="secondary" wire:loading.attr="disabled">Close</x-button>
        </div>
    </div>
</div>
