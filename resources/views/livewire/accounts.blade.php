<div>
    <div class="grid grid-cols-2 mt-4">
		@include('livewire.includes.search', ['placeholder' => 'Search by name or email'])
	</div>

	{{-- Table --}}
	<x-table class="mt-4">
		@slot('head')
		<th class="px-6 py-4">ID</th>
		<th class="px-6 py-4">Last Name</th>
		<th class="px-6 py-4">First Name</th>
		<th class="px-6 py-4">Email</th>
		<th class="px-6 py-4">Phone</th>
		{{-- <th class="px-6 py-4">Role</th> --}}
		<th class="px-6 py-4">Status</th>
		@endslot

		@slot('data')
		@foreach ($users as $user)
		<tr wire:key="{{ $user->id }}"
			class="text-sm border-b border-lightGray transition-all hover:bg-veryLightGreen">
			<td class="px-6 py-4">{{ $user->id }}</td>
			<td class="px-6 py-4">{{ $user->employee->last_name }}</td>
			<td class="px-6 py-4">{{ $user->employee->first_name }}</td>
			<td class="px-6 py-4">{{ $user->email }}</td>
			<td class="px-6 py-4">{{ 0 . $user->employee->phone }}</td>
			{{-- <td class="px-6 py-4">{{ ucwords($user->getRoleNames()->first()) }}</td> --}}
			<td class="px-6 py-4">
				@if($user->status == 'ACTIVE')
				<x-badge class="text-white bg-green" size="xs" fontWeight="semibold">
					{{ $user->status }}
				</x-badge>
				@elseif($user->status == 'INACTIVE')
				<x-badge class="text-white bg-darkGray" size="xs" fontWeight="semibold">
					{{ $user->status }}
				</x-badge>
				@endif
			</td>
		</tr>
		@endforeach
		@endslot
	</x-table>

	@if($users->total() == 0)
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
		{{ $users->links() }}
	</div>
</div>
