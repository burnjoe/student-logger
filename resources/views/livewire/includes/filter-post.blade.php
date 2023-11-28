<div>
    <x-dropdown align="left" menuWidth="44" isFilter="true">
        @slot('trigger')
        <x-button btnType="success" class="flex space-x-2 items-center">
            <span style="text-transform: none;">Post</span>
            <i class="fa-solid fa-angle-down"></i>
        </x-button>
        @endslot

        @slot('content')
        @foreach ($posts as $post)
        <x-dropdown-item fontSize="text-xs" wire:key="{{ $post->id }}">
            <div class="flex flex-row">
                <div class="flex-1 flex items-center">
                    <input wire:model.live="selectedPosts" id="{{ $post->name }}" type="checkbox" value="{{ $post->id }}"
                        class="w-4 h-4 rounded text-primary-600 focus:ring-primary-500 focus:ring-2" />
                    <label for="{{ $post->name }}" class="ml-2">
                        {{ $post->name }}
                    </label>
                </div>
            </div>
        </x-dropdown-item>
        @endforeach
        @endslot
    </x-dropdown>
</div>