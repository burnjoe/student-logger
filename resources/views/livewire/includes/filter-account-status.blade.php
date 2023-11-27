<div>
    <x-dropdown align="left" menuWidth="44" isFilter="true">
        @slot('trigger')
        <x-button btnType="success" class="flex space-x-2 items-center">
            <span style="text-transform: none;">Status</span>
            <i class="fa-solid fa-angle-down"></i>
        </x-button>
        @endslot

        @slot('content')
        <x-dropdown-item fontSize="text-xs">
            <div class="flex flex-row">
                <div class="flex-1 flex items-center">
                    <input wire:model.live="selectedStatuses" id="active" type="checkbox" value="ACTIVE"
                        class="w-4 h-4 rounded text-primary-600 focus:ring-primary-500 focus:ring-2" />
                    <label for="active" class="ml-2">
                        ACTIVE
                    </label>
                </div>
            </div>
        </x-dropdown-item>

        <x-dropdown-item fontSize="text-xs">
            <div class="flex flex-row">
                <div class="flex-1 flex items-center">
                    <input wire:model.live="selectedStatuses" id="inactive" type="checkbox" value="INACTIVE"
                        class="w-4 h-4 rounded text-primary-600 focus:ring-primary-500 focus:ring-2" />
                    <label for="inactive" class="ml-2">
                        INACTIVE
                    </label>
                </div>
            </div>
        </x-dropdown-item>
        @endslot
    </x-dropdown>
</div>