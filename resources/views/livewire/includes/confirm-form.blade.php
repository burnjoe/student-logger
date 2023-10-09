<div>
    <form wire:submit.prevent="{{ $action }}">
        <span>{{ $prompt }}</span> 
        <div class="flex justify-end items-center space-x-4 mt-6">
            <x-button 
                x-on:click.prevent="$dispatch('close-modal')" 
                btnType="secondary" 
                wire:loading.class="cursor-not-allowed">
                Cancel
            </x-button>
            <x-button 
                type="submit" 
                btnType="{{ $btnType }}" 
                wire:loading.class="cursor-wait">
                <span wire:loading.remove>
                    {{ $label }}
                </span>
                <span wire:loading>
                    <i class="fa-solid fa-circle-notch animate-spin-slow mr-2"></i> 
                    {{ $labelLoading }}
                </span>
            </x-button>
        </div>
    </form>
</div>