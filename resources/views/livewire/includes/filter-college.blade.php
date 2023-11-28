<div>
    <x-dropdown align="left" menuWidth="44" isFilter="true">
        @slot('trigger')
        <x-button btnType="success" class="flex space-x-2 items-center">
            <span style="text-transform: none;">College</span>
            <i class="fa-solid fa-angle-down"></i>
        </x-button>
        @endslot

        @slot('content')
        @foreach ($colleges as $college)
        <x-dropdown-item wire:key="{{ $college->id }}" fontSize="text-xs">
            <div class="flex flex-row">
                <div class="flex-1 flex items-center">
                    <input wire:model.live="selectedColleges" id="{{ $college->abbreviation }}" type="checkbox"
                        value="{{ $college->id }}" class="w-4 h-4 rounded focus:ring-2" />
                    <label for="{{ $college->abbreviation }}" class="ml-2">
                        {{ $college->name }}
                    </label>
                </div>
            </div>
        </x-dropdown-item>
        @endforeach
        @endslot
    </x-dropdown>
</div>