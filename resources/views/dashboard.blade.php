<x-app-layout>
    <div class="bg-white overflow-hidden shadow-sm rounded-lg">
        <div class="p-6">
            {{ 'Welcome, ' .Auth::user()->name. '!'}}
            {{-- <x-modal title="Modal 2"></x-modal>
            <button x-data x-on:click="$dispatch('open-modal')" class="px-3 py-1 bg-green text-white rounded-md">Button 2</button> --}}
        </div>
    </div>
</x-app-layout>
