<div>
    <x-card>
        {{ 'Welcome, ' .Auth::user()->employee->first_name. ' ' .Auth::user()->employee->last_name. '!'}}
    </x-card>

    <div class="grid grid-cols-2 gap-4 mt-4">
		<x-card>
			Total Number Students
		</x-card>
		<x-card>
			Pie Chart of Students per Dept.
		</x-card>
	</div>
</div>
