<div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 relative">
        @if ($selectedLog)
        @if (in_array($selectedLog->event, ['created', 'restored', 'deleted', 'forceDeleted']))
        <div class="rounded-lg col-span-2 overflow-hidden">
            <div class="bg-light{{ ucwords($eventColors[$selectedLog->event]) }} px-6 py-4">
                <p class="text-sm font-bold text-white">{{ $eventNames[$selectedLog->event].' '.$selectedLog->log_name }}</p>
            </div>

            <div class="h-full bg-veryLight{{ ucwords($eventColors[$selectedLog->event]) }} px-6 py-4">
                @if(isset($properties['old']))
                @foreach ($properties['old'] as $key => $value)
                <p class="text-sm">
                    <span class="font-bold">{{ str_replace('_', ' ', ucwords($key)) }}:</span> {{ $value }}
                </p>
                @endforeach
                @endif

                @if(isset($properties['attributes']))
                @foreach ($properties['attributes'] as $key => $value)
                <p class="text-sm">
                    <span class="font-bold">{{ str_replace('_', ' ', ucwords($key)) }}:</span> {{ $value }}
                </p>
                @endforeach
                @endif
            </div>
        </div>


        @elseif ($selectedLog->event === 'updated')
        {{-- Arrow Icon --}}
        <div class="absolute w-full h-full flex justify-center items-center">
            <i class="fa-solid fa-arrow-right text-darkGray hidden md:block"></i>
        </div>

        {{-- Old Values --}}
        <div class="rounded-lg overflow-hidden">
            <div class="bg-lightRed px-6 py-4">
                <p class="text-sm font-bold text-white">Old Values</p>
            </div>
            <div class="h-full bg-veryLightRed px-6 py-4">
                @if(isset($properties['old']))
                @foreach ($properties['old'] as $key => $value)
                <p class="text-sm">
                    <span class="font-bold">{{ str_replace('_', ' ', ucwords($key)) }}:</span> {{ $value }}
                </p>
                @endforeach
                @endif
            </div>
        </div>

        {{-- New Values --}}
        <div class="rounded-lg overflow-hidden">
            <div class="bg-lightGreen px-6 py-4">
                <p class="text-sm font-bold text-white">Updated Values</p>
            </div>

            <div class="h-full bg-veryLightGreen px-6 py-4">
                @if(isset($properties['attributes']))
                @foreach ($properties['attributes'] as $key => $value)
                <p class="text-sm">
                    <span class="font-bold">{{ str_replace('_', ' ', ucwords($key)) }}:</span> {{ $value }}
                </p>
                @endforeach
                @endif
            </div>
        </div>
        @endif
        @endif
    </div>

    {{-- Close button --}}
    <div class="flex justify-end items-center mt-4">
        <x-button x-on:click="$dispatch('close-modal')" btnType="secondary" wire:loading.attr="disabled">Close
        </x-button>
    </div>
</div>