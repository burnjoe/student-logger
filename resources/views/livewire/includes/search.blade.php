<div>
    <x-input-text wire:model.live.debounce.300ms="search" type="text" alignIcon="left" placeholder="{{ $placeholder ?? 'Search' }}" class="max-w-sm">
        <i class="fa-solid fa-magnifying-glass"></i>
    </x-input-text>
</div>