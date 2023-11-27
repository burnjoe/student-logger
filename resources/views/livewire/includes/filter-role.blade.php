<div>
    <x-dropdown align="left" menuWidth="44" isFilter="true">
        @slot('trigger')
        <x-button btnType="success" class="flex space-x-2 items-center">
            <span style="text-transform: none;">Role</span>
            <i class="fa-solid fa-angle-down"></i>
        </x-button>
        @endslot

        @slot('content')
        @foreach ($roles as $role)
        <x-dropdown-item fontSize="text-xs" wire:key="{{ $role->id }}">
            <div class="flex flex-row">
                <div class="flex-1 flex items-center">
                    <input wire:model.live="selectedRoles" id="{{ $role->name }}" type="checkbox"
                        value="{{ $role->id }}"
                        class="w-4 h-4 rounded text-primary-600 focus:ring-primary-500 focus:ring-2" />
                    <label for="{{ $role->name }}" class="ml-2">
                        {{ ucwords($role->name) }}
                    </label>
                </div>
            </div>
        </x-dropdown-item>
        @endforeach
        @endslot
    </x-dropdown>
</div>