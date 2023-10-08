<div>
	<div class="grid grid-cols-2 mt-4">
		@include('livewire.includes.search')

		@can('create students')
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
			<th class="px-6 py-4">ID</th>
			<th class="px-6 py-4">Student No.</th>
			<th class="px-6 py-4">Last Name</th>
			<th class="px-6 py-4">First Name</th>
			<th class="px-6 py-4">Action</th>
		@endslot

		@slot('data')
			@foreach ($students as $student)
				<tr wire:key="{{ $student->id }}" class="text-sm border-b border-lightGray transition-all hover:bg-veryLightGreen">
					<td class="px-6 py-4">{{ $student->id }}</td>
					<td class="px-6 py-4">{{ $student->student_no }}</td>
					<td class="px-6 py-4">{{ $student->last_name }}</td>
					<td class="px-6 py-4">{{ $student->first_name }}</td>
					<td class="px-6 py-4 text-md flex space-x-4">
						@can('view students')
							<x-button wire:click.prevent="show({{$student->id}})" btnType="success" textSize="text-xs">
								View
							</x-button>
						@endcan
						@can('edit students')
							<x-button wire:click.prevent="edit({{$student->id}})" btnType="warning" textSize="text-xs">
								Edit
							</x-button>
						@endcan
						@can('delete students')
							<x-button wire:click.prevent="delete({{$student->id}})" btnType="danger" textSize="text-xs">
								Delete
							</x-button>
						@endcan
					</td>
				</tr>
			@endforeach
		@endslot			
	</x-table>

	{{-- Pagination Links --}}
	<div class="mt-4">
		{{ $students->links() }}
	</div>

	{{-- Create Student Form --}}
	@can('create students')
		<x-modal wire:ignore.self name="create-student" title="Add Student" focusable>
			@include('livewire.includes.students-form')
		</x-modal>
	@endcan

	{{-- View Student Form --}}
	@can('view students')
		<x-modal wire:ignore.self name="show-student" title="Student Information" focusable>
			<div>
				{{ $first_name. ' ' .$middle_name. ' ' .$last_name }}
			</div>
			
			Student Number: {{ $student_no }} <br>
			Sex: {{ $sex }} <br>
			Civil Status: {{ $civil_status }} <br>
			Nationality: {{ $nationality }} <br>
			Date of Birth: {{ $birthdate }} <br>
			Place of Birth: {{ $birthplace }} <br>
			Address: {{ $address }} <br>
			Phone Number: {{ $phone }} <br>
			Email: {{ $email }} <br>
			Account Type: {{ $account_type }}

			<div class="flex justify-end items-center mt-4">
				<x-button 
					x-on:click.prevent="$dispatch('close-modal')" 
					btnType="secondary"
					wire:loading.attr="disabled">
					Close
				</x-button>
			</div>
		</x-modal>
	@endcan

	{{-- Edit Student Form --}}
	@can('edit students')
		<x-modal wire:ignore.self name="edit-student" title="Edit Student" focusable>
			@include('livewire.includes.students-form')
		</x-modal>
	@endcan

	{{-- Delete Student Dialog --}}
	@can('delete students')
		<x-modal wire:ignore.self name="delete-student" title="Delete Student" maxWidth="lg" focusable>
			<form wire:submit.prevent="destroy">
				<span>Are you sure you want to delete this record?</span> 
				<div class="flex justify-end items-center space-x-4 mt-6">
					<x-button 
						x-on:click.prevent="$dispatch('close-modal')" 
						btnType="secondary" 
						wire:loading.class="cursor-not-allowed" 
						wire:loading.attr="disabled">
						Cancel
					</x-button>
					<x-button 
						type="submit" 
						btnType="danger" 
						wire:loading.class="cursor-wait" 
						wire:loading.attr="disabled">
						Delete
					</x-button>
				</div>
			</form>
		</x-modal>
	@endcan

	@include('livewire.includes.toasts')
</div>    