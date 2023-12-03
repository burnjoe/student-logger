@php
$eventColors = [
    'created' => 'green',
    'updated' => 'orange',
    'deleted' => 'red',
    'restored' => 'green',
    'forceDeleted' => 'red',
];

$eventNames = [
    'created' => 'Created',
    'updated' => 'Updated',
    'deleted' => 'Deleted',
    'restored' => 'Restored',
    'forceDeleted' => 'Permanently Deleted',
]
@endphp

<div>
    {{-- Search --}}
    <div class="grid grid-cols-2 gap-4 mt-4">
        @include('livewire.includes.search', ['placeholder' => 'Search by user name or description'])
    </div>

    {{-- Table --}}
    <x-table class="mt-4">
        @slot('head')
        <th class="ps-3">@include('livewire.includes.filter-event')</th>
        <th class="px-6 py-4">Description</th>
        <th class="px-6 py-4">User</th>
        <th>@include('livewire.includes.filter-role')</th>
        <th class="px-6 py-4">Timestamp</th>
        <th class="px-6 py-4">Action</th>
        @endslot

        @slot('data')
        @foreach ($logs as $log)
        <tr wire:key="{{ $log->id }}" class="text-sm border-b border-lightGray transition-all hover:bg-veryLightGreen">
            <td class="px-6 py-4" style="white-space: nowrap;">
                <x-badge class="bg-{{$eventColors[$log->event]}} text-white" size="xs" fontWeight="semibold">
                    {{ $eventNames[$log->event].' '.$log->log_name }}
                </x-badge>
            </td>
            <td class="px-6 py-4">{{ $log->description }}</td>
            <td class="px-6 py-4">{{ $log->causer->employee->first_name.' '.$log->causer->employee->last_name }}</td>
            <td class="px-6 py-4">{{ ucwords($log->causer->roles->first()->name) }}</td>
            <td class="px-6 py-4">{{ \Carbon\Carbon::parse($log->created_at)->format('Y-m-d h:i A') }}</td>
            <td class="px-6 py-4">
                @can('view audit log')
                <x-button wire:click.prevent="show({{ $log->id }})" btnType="success" textSize="text-xs">
					View
				</x-button>
                @endcan
            </td>
        </tr>
        @endforeach
        @endslot
    </x-table>

    @if($logs->total() == 0)
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
        {{ $logs->links() }}
    </div>

    {{-- Modals --}}
	@can('view audit log')
	{{-- View Log Details --}}
	<x-modal wire:ignore.self name="show-log-details" title="Log Details" focusable>
		@include('livewire.includes.audit-logs-modal.audit-logs-info')
	</x-modal>
    @endcan
</div>