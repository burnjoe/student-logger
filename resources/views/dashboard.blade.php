<x-app-layout>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-darkGray">
            {{ 'Welcome, ' . Auth::user()->name . '!'}}

            <x-toast bgColor="bg-green" class="text-sm">
                Welcome, {{ Auth::user()->name }}!
            </x-toast>
        </div>
    </div>
</x-app-layout>
