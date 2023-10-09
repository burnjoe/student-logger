<div>
    <div class="mt-4">
		@include('livewire.includes.search')
	</div>

    <x-table class="mt-4">
        @slot('head')
			<th class="px-6 py-4">ID</th>
			<th class="px-6 py-4">Student No.</th>
			<th class="px-6 py-4">Last Name</th>
			<th class="px-6 py-4">First Name</th>
			<th class="px-6 py-4">Action</th>
		@endslot

        @slot('data')
			{{-- @foreach ($students as $student)
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
			@endforeach --}}
		@endslot
    </x-table>
</div>
