<x-app-layout>
    <x-card>
        {{ 'Welcome, ' .Auth::user()->profileable->first_name. ' ' .Auth::user()->profileable->last_name. '!'}}
            {{-- <x-modal title="Modal 2"></x-modal>
            <button x-data x-on:click="$dispatch('open-modal')" class="px-3 py-1 bg-green text-white rounded-md">Button 2</button> --}}
    </x-card>
</x-app-layout>
