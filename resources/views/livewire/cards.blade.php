<div>
    <div class="grid grid-cols-2 mt-4">
		@include('livewire.includes.search', ['placeholder' => 'Search by student no. or name'])

		<div class="flex justify-between lg:justify-end items-center">
			@can('create students')
			<div class="flex justify-end ps-2">
				<x-button wire:click.prevent="create" btnType="success" class="flex space-x-2 items-center">
					<i class="fa-solid fa-plus"></i>
					<span>Add New Card</span>
				</x-button>
			</div>
			@endcan
		</div>
	</div>

	{{-- Table --}}
	<x-table class="mt-4">
		@slot('head')
		<th class="px-6 py-4">ID</th> 				{{-- Remove later --}}
		<th class="px-6 py-4">Student No.</th>
		<th class="px-6 py-4">Last Name</th>
		<th class="px-6 py-4">First Name</th>
		<th class="px-6 py-4">Expires At</th>
		<th class="px-6 py-4">Action</th>
		@endslot

		@slot('data')
		@foreach ($cards as $card)
		<tr wire:key="{{ $card->id }}"
			class="text-sm border-b border-lightGray transition-all hover:bg-veryLightGreen">
			<td class="px-6 py-4">{{ $card->rfid }}</td>
			<td class="px-6 py-4">{{ $card->student->student_no }}</td>
			<td class="px-6 py-4">{{ $card->student->last_name }}</td>
			<td class="px-6 py-4">{{ $card->student->first_name }}</td>
			<td class="px-6 py-4">{{ \Carbon\Carbon::parse($card->expires_at)->format('M. d, Y') }}</td>
			<td class="px-6 py-4 text-md flex space-x-4">
				@can('view students')
				<x-button wire:click.prevent="show({{ $card->rfid }})" btnType="success" textSize="text-xs">
					View
				</x-button>
				@endcan
				@can('edit students')
				<x-button wire:click.prevent="edit({{ $card->rfid }})" btnType="warning" textSize="text-xs">
					Edit
				</x-button>
				@endcan
			</td>
		</tr>
		@endforeach
		@endslot
	</x-table>

	@if($cards->total() == 0)
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
		{{ $cards->links() }}
	</div>
</div>
