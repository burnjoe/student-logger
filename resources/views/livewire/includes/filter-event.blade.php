<div>
    <x-dropdown align="left" menuWidth="44" isFilter="true">
        @slot('trigger')
        <x-button btnType="success" class="flex space-x-2 items-center">
            <span style="text-transform: none;">Event</span>
            <i class="fa-solid fa-angle-down"></i>
        </x-button>
        @endslot

        @slot('content')
        <x-dropdown-item fontSize="text-xs">
            <div class="flex flex-row">
                <div class="flex-1 flex items-center">
                    <input wire:model.live="selectedEvents" id="created" type="checkbox" value="created"
                        class="w-4 h-4 rounded text-primary-600 focus:ring-primary-500 focus:ring-2" />
                    <label for="created" class="ml-2">
                        Created
                    </label>
                </div>
            </div>
        </x-dropdown-item>

        <x-dropdown-item fontSize="text-xs">
            <div class="flex flex-row">
                <div class="flex-1 flex items-center">
                    <input wire:model.live="selectedEvents" id="updated" type="checkbox" value="updated"
                        class="w-4 h-4 rounded text-primary-600 focus:ring-primary-500 focus:ring-2" />
                    <label for="updated" class="ml-2">
                        Updated
                    </label>
                </div>
            </div>
        </x-dropdown-item>

        <x-dropdown-item fontSize="text-xs">
            <div class="flex flex-row">
                <div class="flex-1 flex items-center">
                    <input wire:model.live="selectedEvents" id="deleted" type="checkbox" value="deleted"
                        class="w-4 h-4 rounded text-primary-600 focus:ring-primary-500 focus:ring-2" />
                    <label for="deleted" class="ml-2">
                        Deleted
                    </label>
                </div>
            </div>
        </x-dropdown-item>

        <x-dropdown-item fontSize="text-xs">
            <div class="flex flex-row">
                <div class="flex-1 flex items-center">
                    <input wire:model.live="selectedEvents" id="restored" type="checkbox" value="restored"
                        class="w-4 h-4 rounded text-primary-600 focus:ring-primary-500 focus:ring-2" />
                    <label for="restored" class="ml-2">
                        Restored
                    </label>
                </div>
            </div>
        </x-dropdown-item>
        @endslot
    </x-dropdown>
</div>