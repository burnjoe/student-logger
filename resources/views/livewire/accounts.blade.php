<div>
	<div class="grid grid-cols-2 mt-4">
		@include('livewire.includes.search', ['placeholder' => 'Search by name or email'])

		<div class="flex justify-between lg:justify-end items-center">
			@can('create users')
			<div class="flex justify-end ps-2">
				<x-button wire:click.prevent="create" btnType="success" class="flex space-x-2 items-center">
					<i class="fa-solid fa-plus"></i>
					<span>Add New User</span>
				</x-button>
			</div>
			@endcan
		</div>
	</div>

	{{-- Table --}}
	<x-table class="mt-4">
		@slot('head')
		<th class="px-6 py-4">Last Name</th>
		<th class="px-6 py-4">First Name</th>
		<th class="px-6 py-4">Email</th>
		<th>@include('livewire.includes.filter-role')</th>
		<th>@include('livewire.includes.filter-account-status')</th>
		<th class="px-6 py-4">Action</th>
		@endslot

		@slot('data')
		@foreach ($users as $user)
		<tr wire:key="{{ $user->id }}" class="text-sm border-b border-lightGray transition-all hover:bg-veryLightGreen">
			<td class="px-6 py-4">{{ $user->employee->last_name }}</td>
			<td class="px-6 py-4">{{ $user->employee->first_name }}</td>
			<td class="px-6 py-4">{{ $user->email }}</td>
			<td class="px-6 py-4">{{ ucwords($user->roles->first()->name) }}</td>
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
			<td class="px-6 py-4 text-md flex space-x-4">
				@can('view users')
				<x-button wire:click.prevent="show({{ $user->id }})" btnType="success" textSize="text-xs">
					View
				</x-button>
				@endcan
				@can('edit users')
				<x-button wire:click.prevent="edit({{ $user->id }})" btnType="warning" textSize="text-xs">
					Edit
				</x-button>
				@endcan
				@can('archive users')
				<x-button wire:click.prevent="delete({{ $user->id }})" btnType="danger" textSize="text-xs">
					Delete
				</x-button>
				@endcan
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

	{{-- Modals --}}
	{{-- View Student --}}
	@can('view users')
	<x-modal wire:ignore.self name="show-user" title="User Account Information" focusable>
		@include('livewire.includes.users-modal.users-info')
	</x-modal>
	@endcan

	{{-- Create Form --}}
	@can('create users')
	<x-modal wire:ignore.self name="create-user" title="Add User Account" focusable>
		@include('livewire.includes.users-modal.users-form')
	</x-modal>
	@endcan

	{{-- Edit Form --}}
	@can('edit users')
	<x-modal wire:ignore.self name="edit-user" title="Edit User Account" focusable>
		@include('livewire.includes.users-modal.users-form')
	</x-modal>
	@endcan

	{{-- Delete Dialog --}}
	@can('archive `users')
	<x-modal wire:ignore.self name="delete-user" title="Delete User Account" maxWidth="lg" focusable>
		@include('livewire.includes.confirm-form', [
		'prompt' => 'Are you sure you want to delete this record?',
		'btnType' => 'danger',
		'label' => 'Delete',
		'labelLoading' => 'Deleting...',
		])
	</x-modal>
	@endcan
</div>