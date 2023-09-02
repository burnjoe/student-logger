<x-app-layout>
    <div class="bg-white overflow-hidden shadow-sm rounded-lg">
        <div class="p-6 text-darkGray">
            {{ 'Welcome, ' . Auth::user()->name . '!'}}
        </div>
    </div>
</x-app-layout>
