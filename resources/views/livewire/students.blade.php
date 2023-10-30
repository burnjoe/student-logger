<div>
	<div class="grid grid-cols-2 mt-4">
		@include('livewire.includes.search', ['placeholder' => 'Search by student no. or name'])

		@can('manage students')
		<div class="flex justify-end">
			<x-button wire:click.prevent="create" btnType="success" class="flex space-x-2 items-center">
				<i class="fa-solid fa-plus"></i>
				<span>Add New Student</span>
			</x-button>
		</div>
		@endcan
	</div>

	{{-- Table --}}
	<x-table class="mt-4">
		@slot('head')
		<th class="px-6 py-4">Student No.</th>
		<th class="px-6 py-4">Last Name</th>
		<th class="px-6 py-4">First Name</th>
		<th class="px-6 py-4">Action</th>
		@endslot

		@slot('data')
		@foreach ($students as $student)
		<tr wire:key="{{ $student->id }}"
			class="text-sm border-b border-lightGray transition-all hover:bg-veryLightGreen">
			<td class="px-6 py-4">{{ $student->student_no }}</td>
			<td class="px-6 py-4">{{ $student->last_name }}</td>
			<td class="px-6 py-4">{{ $student->first_name }}</td>
			<td class="px-6 py-4 text-md flex space-x-4">
				@can('manage students')
				<x-button wire:click.prevent="show({{$student->id}})" btnType="success" textSize="text-xs">
					View
				</x-button>
				<x-button wire:click.prevent="edit({{$student->id}})" btnType="warning" textSize="text-xs">
					Edit
				</x-button>
				<x-button wire:click.prevent="delete({{$student->id}})" btnType="danger" textSize="text-xs">
					Delete
				</x-button>
				@endcan
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

	{{-- Create Student Form --}}
	@can('manage students')
	<x-modal wire:ignore.self name="create-student" title="Add Student" focusable>
		@include('livewire.includes.students-form')
	</x-modal>

	{{-- View Student Form --}}
	<x-modal wire:ignore.self name="show-student" title="Student Information" focusable>
		@include('livewire.includes.view-student-form')
	</x-modal>

	{{-- Edit Student Form --}}
	<x-modal wire:ignore.self name="edit-student" title="Edit Student" focusable>
		@include('livewire.includes.students-form')
	</x-modal>

	{{-- Delete Student Dialog --}}
	<x-modal wire:ignore.self name="delete-student" title="Delete Student" maxWidth="lg" focusable>
		@include('livewire.includes.confirm-form', [
		'prompt' => 'Are you sure you want to delete this record?',
		'btnType' => 'danger',
		'label' => 'Delete',
		'labelLoading' => 'Deleting...'
		])
	</x-modal>
	@endcan
</div>