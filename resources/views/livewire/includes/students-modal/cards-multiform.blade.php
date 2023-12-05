<div>
    {{-- Step 1:  Upload Photo --}}
    {{-- Step 2:  Select Emergency Contact Person --}}
    {{-- Step 3:  Scan RFID --}}
    {{-- Step 4:  Confirmation/Disable Current Active RFID --}}

    <div class="flex flex-wrap pb-5 px-5">

    </div>

    <div class="px-5">
        <div class="mb-1 text-base font-medium dark:text-white">Step 1 of 4</div>
        <div class="w-full bg-gray rounded-full h-2.5 mb-4">
            <div class="bg-lightGreen h-2.5 rounded-full" style="width: 33%"></div>
        </div>
    </div>

    {{-- Prev and Next button --}}
    <div class="flex justify-between items-center mt-4 px-5">
        <x-button x-on:click="$dispatch('close-modal')" btnType="secondary" wire:loading.attr="disabled">
            <i class="fa-solid fa-arrow-left me-1"></i>
            Back
        </x-button>
        <div class="flex items-center space-x-4">
            <x-button x-on:click="$dispatch('close-modal')" btnType="secondary" wire:loading.attr="disabled">
                Cancel
            </x-button>
            <x-button x-on:click="$dispatch('close-modal')" btnType="success" wire:loading.attr="disabled">
                Next
                <i class="fa-solid fa-arrow-right ms-1"></i>
            </x-button>
            <x-button x-on:click="$dispatch('close-modal')" btnType="success" wire:loading.attr="disabled">
                Save
            </x-button>
        </div>
    </div>

</div>