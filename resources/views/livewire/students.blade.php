<div>
	<x-card>
		Data Visual
	</x-card>

	<div class="flex justify-between mt-4">
		@include('livewire.includes.search')

		<x-button wire:click.prevent="create" btnType="success" class="flex space-x-2 items-center">
			<i class="fa-solid fa-plus"></i>
			<span>Add New Student</span>
		</x-button>
	</div>
	
	{{-- Table --}}
	<x-table class="mt-4">
		@slot('head')
			<th class="px-6 py-4">Student No.</th>
			<th class="px-6 py-4">Last Name</th>
			<th class="px-6 py-4">First Name</th>
			<th class="px-6 py-4">Middle Name</th>
			<th class="px-6 py-4">Action</th>
		@endslot

		@slot('data')
			@foreach ($students as $student)
				<tr wire:key="{{ $student->id }}" class="text-sm border-b border-lightGray transition-all hover:bg-veryLightGreen">
					<td class="px-6 py-4">{{ $student->student_no }}</td>
					<td class="px-6 py-4">{{ $student->last_name }}</td>
					<td class="px-6 py-4">{{ $student->first_name }}</td>
					<td class="px-6 py-4">{{ $student->middle_name ?? "N/A" }}</td>
					<td class="px-6 py-4 text-md flex space-x-4">
						<x-button wire:click.prevent="show({{$student}})" btnType="success" textSize="text-xs">
							View
						</x-button>
						<x-button wire:click.prevent="edit({{$student}})" btnType="warning" textSize="text-xs">
							Edit
						</x-button>
						<x-button wire:click.prevent="delete({{$student}})" btnType="danger" textSize="text-xs">
							Delete
						</x-button>
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
	<x-modal name="create-student" title="Add Student" focusable>
		@include('livewire.includes.students-form')
	</x-modal>

	@if($selectedStudent)
		{{-- View Student Form --}}
		<x-modal name="show-student" title="Student Information" focusable>
			<div>
				{{ $selectedStudent->first_name. ' ' .$selectedStudent->middle_name. ' ' .$selectedStudent->last_name }}
			</div>
			
			Student Number: {{ $selectedStudent->student_no }} <br>
			Sex: {{ $selectedStudent->sex }} <br>
			Civil Status: {{ $selectedStudent->civil_status }} <br>
			Nationality: {{ $selectedStudent->nationality }} <br>
			Date of Birth: {{ $selectedStudent->birthdate }} <br>
			Place of Birth: {{ $selectedStudent->birthplace }} <br>
			Address: {{ $selectedStudent->address }} <br>
			Phone Number: {{ $selectedStudent->phone }} <br>
			Email: {{ $selectedStudent->email }} <br>
			Account Type: {{ $selectedStudent->account_type }}
		</x-modal>

		{{-- Edit Student Form --}}
		<x-modal name="edit-student" title="Edit Student" focusable>
			@include('livewire.includes.students-form')
		</x-modal>

		{{-- Delete Student Dialog --}}
		<x-modal name="delete-student" title="Delete Student" focusable>
		</x-modal>
	@endif

	@include('livewire.includes.toasts')
</div>    