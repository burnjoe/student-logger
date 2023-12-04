<div>
    <x-dropdown align="right" menuWidth="44" isFilter="true">
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
                    <input wire:model.live="selectedStatuses" id="in" type="checkbox" value="IN"
                        class="w-4 h-4 rounded text-primary-600 focus:ring-primary-500 focus:ring-2" />
                    <label for="in" class="ml-2">
                        IN
                    </label>
                </div>
            </div>
        </x-dropdown-item>

        <x-dropdown-item fontSize="text-xs">
            <div class="flex flex-row">
                <div class="flex-1 flex items-center">
                    <input wire:model.live="selectedStatuses" id="out" type="checkbox" value="OUT"
                        class="w-4 h-4 rounded text-primary-600 focus:ring-primary-500 focus:ring-2" />
                    <label for="out" class="ml-2">
                        OUT
                    </label>
                </div>
            </div>
        </x-dropdown-item>

        <x-dropdown-item fontSize="text-xs">
            <div class="flex flex-row">
                <div class="flex-1 flex items-center">
                    <input wire:model.live="selectedStatuses" id="3" type="checkbox" value="MISSED"
                        class="w-4 h-4 rounded text-primary-600 focus:ring-primary-500 focus:ring-2" />
                    <label for="3" class="ml-2">
                        MISSED
                    </label>
                </div>
            </div>
        </x-dropdown-item>
        @endslot
    </x-dropdown>
</div>