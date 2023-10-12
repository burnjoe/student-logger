<div x-data="{ isOpen: true }">
    <div x-show="isOpen">
        <div class="flex">
            <!-- Left Side (Profile Picture and Full Name) -->
            <div class="w-1/4">
                <div class="mb-4 mt-4">
                    <!-- Profile Picture -->
                    <img src="{{ asset('img/male_default_profile.png') }}" alt="Profile Picture" class="w-28 h-28 rounded-full mx-auto mb-4">
                </div>
                <div class="text-center">
                    <!-- Full Name -->
                    {{ $first_name. ' ' .$middle_name. ' ' .$last_name }}
                </div>
            </div>
    
            <!-- Right Side (Student Information) -->
            <div class="w-3/4 pl-4">
                <div class="mt-4 space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <!-- Left Column -->
                        <div>
                            <div class="bg-white p-4 rounded-lg shadow-md flex justify-between mb-4">
                                <p class="font-semibold">Student Number:</p>
                                <p>{{ $student_no }}</p>
                            </div>
                            <div class="bg-white p-4 rounded-lg shadow-md flex justify-between mt-4 mb-4">
                                <p class="font-semibold">Sex:</p>
                                <p>{{ $sex }}</p>
                            </div>
                            <div class="bg-white p-4 rounded-lg shadow-md flex justify-between mt-4 mb-4">
                                <p class="font-semibold">Civil Status:</p>
                                <p>{{ $civil_status }}</p>
                            </div>
                            <div class="bg-white p-4 rounded-lg shadow-md flex justify-between mt-4">
                                <p class="font-semibold">Nationality:</p>
                                <p>{{ $nationality }}</p>
                            </div>
                        </div>
                        <!-- Right Column -->
                        <div>
                            <div class="bg-white p-4 rounded-lg shadow-md flex justify-between mb-4">
                                <p class="font-semibold">Date of Birth:</p>
                                <p>{{ $birthdate }}</p>
                            </div>
                            <div class="bg-white p-4 rounded-lg shadow-md flex justify-between mt-4 mb-4">
                                <p class="font-semibold">Place of Birth:</p>
                                <p>{{ $birthplace }}</p>
                            </div>
                            <div class="bg-white p-4 rounded-lg shadow-md flex justify-between mt-4 mb-4">
                                <p class="font-semibold">Account Type:</p>
                                <p>{{ $account_type }}</p>
                            </div>
                            <div class="bg-white p-4 rounded-lg shadow-md flex justify-between mt-4">
                                <p class="font-semibold">Phone Number:</p>
                                <p>{{ $phone }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white p-4 rounded-lg shadow-md flex justify-between">
                        <p class="font-semibold">Email:</p>
                        <p>{{ $email }}</p>
                    </div>
                    <div class="bg-white p-4 rounded-lg shadow-md flex justify-between">
                        <p class="font-semibold">Address:</p>
                        <p>{{ $address }}</p>
                    </div>
                </div>
            </div>
        </div>
        

        {{-- close button --}}
        <div class="flex justify-end items-center mt-4">
            <x-button 
                x-on:click="$dispatch('close-modal')"
                btnType="secondary"
                wire:loading.attr="disabled">
                Close
            </x-button>
        </div>
    </div>
</div>
