<div>
    <div class="mt-4">
		@include('livewire.includes.search', ['placeholder' => 'Search by student no. or name'])
	</div>

    <x-table class="mt-4">
        @slot('head')
			<th class="px-6 py-4">Student No.</th>
			<th class="px-6 py-4">Last Name</th>
			<th class="px-6 py-4">First Name</th>
			<th class="px-6 py-4">Action</th>
		@endslot

        @slot('data')
			@foreach ($students as $student)
				<tr wire:key="{{ $student->id }}" class="text-sm border-b border-lightGray transition-all hover:bg-veryLightGreen">
					<td class="px-6 py-4">{{ $student->student_no }}</td>
					<td class="px-6 py-4">{{ $student->last_name }}</td>
					<td class="px-6 py-4">{{ $student->first_name }}</td>
					<td class="px-6 py-4 text-md flex space-x-4">
						<x-button wire:click.prevent="show({{$student->id}})" btnType="success" textSize="text-xs">
							View
						</x-button>
						<x-button wire:click.prevent="restore({{$student->id}})" btnType="secondary" textSize="text-xs">
							Restore
						</x-button>
						<x-button wire:click.prevent="delete({{$student->id}})" btnType="danger" textSize="text-xs">
							Delete Permanently
						</x-button>
					</td>
				</tr>
			@endforeach
		@endslot
    </x-table>

	@if($students->total() == 0)
		<div class="flex justify-center py-6">
			@if(empty($search))
				No records found.
			@else
				No records found for matching "{{$search}}".
			@endif
		</div>
	@endif
	
	{{-- Pagination Links --}}
	<div class="mt-4">
		{{ $students->links() }}
	</div>

	{{-- View Student Form --}}
	<x-modal wire:ignore.self name="show-student" title="Student Information" focusable>
		@include('livewire.includes.view-student-form')
	</x-modal>

	{{-- Restore Student Dialog --}}
	<x-modal wire:ignore.self name="restore-student" title="Restore Student" maxWidth="lg" focusable>
		@include('livewire.includes.confirm-form', [
			'prompt' => 'Are you sure you want to restore this record?',
			'btnType' => 'success',
			'label' => 'Restore',
			'labelLoading' => 'Restoring...'
		])
	</x-modal>

	{{-- Delete Permanently Student Dialog --}}
	<x-modal wire:ignore.self name="delete-student" title="Delete Student Permanently" maxWidth="lg" focusable>
		@include('livewire.includes.confirm-form', [
			'prompt' => 'Are you sure you want to delete this record permanently?',
			'btnType' => 'danger',
			'label' => 'Delete',
			'labelLoading' => 'Deleting...'
		])
	</x-modal>

	@include('livewire.includes.toasts')
</div>
