@if(isset($selectedCard))
<div>
    {{-- Student Information --}}
    <div class="flex flex-col md:flex-row">
        <!-- Left Side  -->
        <div class="w-full md:w-1/4 text-center border border-t-0 border-l-0 border-r-0 border-lightGray md:border-b-0">
            <!-- Profile Picture -->
            <img src="{{ asset('img/user_icon.png') }}" alt="Profile Picture"
                class="rounded-full border border-3 border-lightGray mx-auto mb-4 mt-2.5"
                style="border-width: 3px !important;" width="150">
        </div>

        <div class="w-full md:w-3/4">
            <div class="flex flex-wrap px-5">
                {{-- Student Number --}}
                <div class="w-full md:w-1/2">
                    <small class="font-normal text-darkGray">Student Number</small>
                    <h6 class="text-1rem font-medium leading-5 mb-2 text-xs">{{ $student_no }}</h6>
                </div>
                {{-- Student Name --}}
                <div class="w-full md:w-1/2">
                    <small class="font-normal text-darkGray">Student</small>
                    <h6 class="text-1rem font-medium leading-5 mb-2 text-xs">{{ $last_name.', '.$first_name }}</h6>
                </div>
                {{-- Program --}}
                <div class="w-full md:w-1/2">
                    <small class="font-normal text-darkGray">Program</small>
                    <h6 class="text-1rem font-medium leading-5 mb-2 text-xs">BSCS</h6>
                </div>
                {{-- Date of Birth --}}
                <div class="w-full md:w-1/2">
                    <small class="font-normal text-darkGray">Date of Birth</small>
                    <h6 class="text-1rem font-medium leading-5 mb-2 text-xs">{{ Carbon\Carbon::parse($birthdate)->format('F j, Y') }}</h6>
                </div>
                {{-- Address --}}
                <div class="w-full">
                    <small class="font-normal text-darkGray">Address</small>
                    <h6 class="text-1rem font-medium leading-5 mb-2 text-xs">{{ $address }}</h6>
                </div>
                {{-- ID Expiration Date --}}
                <div class="w-full md:w-1/2">
                    <small class="font-normal text-darkGray">ID Expiration Date</small>
                    <h6 class="text-1rem font-medium leading-5 mb-2 text-xs">{{ Carbon\Carbon::parse(now())->format('F j, Y') }}</h6>
                </div>
                {{-- ID Status --}}
                <div class="w-full md:w-1/2">
                    <small class="font-normal text-darkGray">Status</small>
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
            <div class="px-5">
                <span class="text-1rem font-bold">Emergency Contact</span>
            </div>

            <div class="flex flex-wrap px-5 pt-2.5">
                {{-- Contact Person --}}
                <div class="w-full md:w-1/2">
                    <small class="font-normal text-darkGray">Emergency Contact Person
                        (Parent/Guardian)</small>
                    <h6 class="text-1rem font-medium leading-5 mb-2 text-xs">SABANA, JOCELYN</h6>
                </div>
                {{-- Contact No --}}
                <div class="w-full md:w-1/2">
                    <small class="font-normal text-darkGray">Contact Number</small>
                    <h6 class="text-1rem font-medium leading-5 mb-2 text-xs">09214150005</h6>
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