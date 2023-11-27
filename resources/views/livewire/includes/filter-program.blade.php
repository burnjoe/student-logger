<div>
    <x-dropdown align="left" menuWidth="44" isFilter="true">
        @slot('trigger')
        <x-button btnType="success" class="flex space-x-2 items-center">
            <span style="text-transform: none;">Program</span>
            <i class="fa-solid fa-angle-down"></i>
        </x-button>
        @endslot

        @slot('content')
        <x-accordion class="transition-all rounded-lg" name="program-accordion">
            @foreach ($colleges as $college)
            <x-accordion-item itemId="{{ $college->id }}" headerClasses="hover:bg-lightGray" contentClasses="bg-lightGray"
                :showIndicator="true">
                @slot('header')
                <div class="w-full flex space-x-4">
                    <div class="w-full flex justify-between items-center text-sm">
                        {{ $college->abbreviation }}
                    </div>
                </div>
                @endslot
                @slot('content')
                @foreach ($college->programs()->get() as $program)
                <x-dropdown-item wire:key="{{ $program->id }}" fontSize="text-xs">
                    <div class="flex flex-row">
                        <div class="flex-1 flex items-center">
                            <input wire:model.live="selectedPrograms" id="{{ $program->name }}" type="checkbox"
                                value="{{ $program->id }}" class="w-4 h-4 rounded focus:ring-2" />
                            <label for="{{ $program->name }}" class="ml-2">
                                {{ $program->name }}
                            </label>
                        </div>
                    </div>
                </x-dropdown-item>
                @endforeach
                @endslot
            </x-accordion-item>
            @endforeach
        </x-accordion>
        @endslot
    </x-dropdown>
</div>