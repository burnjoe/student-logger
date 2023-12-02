@php
$eventNames = [
'created' => 'Created',
'updated' => 'Updated',
'deleted' => 'Deleted',
'restored' => 'Restored',
'force deleted' => 'Force Deleted',
]
@endphp

<div>
    <x-dropdown align="left" menuWidth="44" isFilter="true">
        @slot('trigger')
        <x-button btnType="success" class="flex space-x-2 items-center">
            <span style="text-transform: none;">Event</span>
            <i class="fa-solid fa-angle-down"></i>
        </x-button>
        @endslot

        @slot('content')
        @foreach ($eventNames as $key => $value)
        <x-dropdown-item fontSize="text-xs">
            <div class="flex flex-row">
                <div class="flex-1 flex items-center">
                    <input wire:model.live="selectedEvents" id="{{$key}}" type="checkbox" value="{{$key}}"
                        class="w-4 h-4 rounded text-primary-600 focus:ring-primary-500 focus:ring-2" />
                    <label for="{{$key}}" class="ml-2">
                        {{ $value }}
                    </label>
                </div>
            </div>
        </x-dropdown-item>
        @endforeach
        @endslot
    </x-dropdown>
</div>