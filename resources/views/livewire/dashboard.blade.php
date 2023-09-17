<div>
    <x-card>
        {{ 'Welcome, ' .Auth::user()->profileable->first_name. ' ' .Auth::user()->profileable->last_name. '!'}}
    </x-card>

    @include('livewire.includes.toasts')
</div>
