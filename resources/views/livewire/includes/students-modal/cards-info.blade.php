@if(isset($selectedCard))
<div>
    {{-- Student Information --}}
    <div class="flex flex-col md:flex-row">
        <!-- Left Side  -->
        <div class="w-full md:w-1/4 text-center border border-t-0 border-l-0 border-r-0 border-lightGray md:border-b-0">
            <!-- Profile Picture -->
            <img class="object-cover object-center h-52 w-52 rounded-full border border-2 border-gray my-4 mx-auto"
                    alt="Profile Picture"
                    src="{{ asset('storage'.$profile_photo) }}" alt="Profile Photo">
        </div>

        <div class="w-full md:w-3/4">
            <div class="flex flex-wrap px-5">
                {{-- Student Number --}}
                <div class="w-full md:w-1/2">
                    <small class="font-normal text-darkGray text-xs">Student Number</small>
                    <h6 class="text-1rem font-medium leading-5 mb-2">{{ $student_no }}</h6>
                </div>
                {{-- Student Name --}}
                <div class="w-full md:w-1/2">
                    <small class="font-normal text-darkGray text-xs">Student</small>
                    <h6 class="text-1rem font-medium leading-5 mb-2">{{ $first_name.' '.($middle_name ?
                        strtoupper(substr($middle_name, 0, 1)).'.' : '').' '.$last_name }}</h6>
                </div>
                {{-- Program --}}
                <div class="w-full md:w-1/2">
                    <small class="font-normal text-darkGray text-xs">Program</small>
                    <h6 class="text-1rem font-medium leading-5 mb-2">BSCS</h6>
                </div>
                {{-- Date of Birth --}}
                <div class="w-full md:w-1/2">
                    <small class="font-normal text-darkGray text-xs">Date of Birth</small>
                    <h6 class="text-1rem font-medium leading-5 mb-2">{{ Carbon\Carbon::parse($birthdate)->format('F j, Y') }}</h6>
                </div>
                {{-- Address --}}
                <div class="w-full">
                    <small class="font-normal text-darkGray text-xs">Address</small>
                    <h6 class="text-1rem font-medium leading-5 mb-2">{{ $address }}</h6>
                </div>
                {{-- ID Expiration Date --}}
                <div class="w-full md:w-1/2">
                    <small class="font-normal text-darkGray text-xs">ID Expiration Date</small>
                    <h6 class="text-1rem font-medium leading-5 mb-2">{{ Carbon\Carbon::parse(now())->format('F j, Y') }}</h6>
                </div>
                {{-- ID Status --}}
                <div class="w-full md:w-1/2">
                    <small class="font-normal text-darkGray text-xs">RFID Status</small>
                    <p>
                        @if($selectedCard->expires_at < now())
                        <x-badge class="bg-red text-white">EXPIRED</x-badge>
                        @else
                        <x-badge class="bg-green text-white">ACTIVE</x-badge>
                        @endif
                    </p>
                </div>
            </div>

            {{-- Emergency Contact --}}
            <div class="pt-4 px-5">
                <span class="text-1rem font-bold">Emergency Contact</span>
            </div>

            <div class="flex flex-wrap px-5 pt-2.5">
                {{-- Contact Person --}}
                <div class="w-full md:w-1/2">
                    <small class="font-normal text-darkGray text-xs">Emergency Contact Person
                        (Parent/Guardian)</small>
                    <h6 class="text-1rem font-medium leading-5 mb-2">Dela Cruz, Juan</h6>
                </div>
                {{-- Contact No --}}
                <div class="w-full md:w-1/2">
                    <small class="font-normal text-darkGray text-xs">Contact Number</small>
                    <h6 class="text-1rem font-medium leading-5 mb-2">09214150005</h6>
                </div>
            </div>
        </div>
    </div>

    {{-- Close button --}}
    <div class="flex justify-end items-center mt-4">
        <x-button x-on:click="$dispatch('close-modal')" btnType="secondary" wire:loading.attr="disabled">Close
        </x-button>
    </div>
</div>
@endif