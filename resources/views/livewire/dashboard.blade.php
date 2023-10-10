<div>
    <x-card>
        {{ 'Welcome, ' .Auth::user()->profileable->first_name. ' ' .Auth::user()->profileable->last_name. '!'}}
    </x-card>

    <div class="grid grid-cols-2 gap-4 mt-4">
		<x-card>
			Total Number Students
		</x-card>
		<x-card>
			Pie Chart of Students per Dept.
		</x-card>
	</div>

    @include('livewire.includes.toasts')
</div>
