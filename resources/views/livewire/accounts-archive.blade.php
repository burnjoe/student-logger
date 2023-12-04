<div>
    <div class="grid grid-cols-2 gap-4 mt-4">
        @include('livewire.includes.search', ['placeholder' => 'Search by name or email'])
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
            <td class="px-6 py-4">{{ ucwords($user->getRoleNames()->first()) }}</td>
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
                @can('restore users')
                <x-button wire:click.prevent="restore({{ $user->id }})" btnType="secondary" textSize="text-xs">
                    Restore
                </x-button>
                @endcan
                @can('delete users')
                <x-button wire:click.prevent="delete({{ $user->id }})" btnType="danger" textSize="text-xs">
                    Delete Permanently
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
	@can('view users')
	{{-- View Student --}}
	<x-modal wire:ignore.self name="show-user" title="User Account Information" focusable>
		@include('livewire.includes.users-modal.users-info')
	</x-modal>
    @endcan
    
    {{-- Restore Confirmation Dialog --}}
    @can('restore users')
    <x-modal wire:ignore.self name="restore-user" title="Restore User Account" maxWidth="lg" focusable>
        @include('livewire.includes.confirm-form', [
            'prompt' => 'Are you sure you want to restore this record?',
            'btnType' => 'success',
        'label' => 'Restore',
        'labelLoading' => 'Restoring...',
        ])
    </x-modal>
    @endcan

    {{-- Delete Permanently Confirmation Dialog --}}
    @can('delete users')
    <x-modal wire:ignore.self name="delete-user" title="Delete User Account" maxWidth="lg" focusable>
        @include('livewire.includes.confirm-form', [
        'prompt' => 'Are you sure you want to delete this record permanently?',
        'btnType' => 'danger',
        'label' => 'Delete',
        'labelLoading' => 'Deleting...',
        ])
    </x-modal>
    @endcan
</div>