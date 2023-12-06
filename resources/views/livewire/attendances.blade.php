@php
$statusColors = [
'IN' => 'orange',
'OUT' => 'green',
'MISSED' => 'red',
]
@endphp

<div>
    <div class="grid lg:grid-cols-2 gap-4 mt-4">
        @include('livewire.includes.search', ['placeholder' => 'Search by student no. or name'])

        {{-- Paste here --}}
    </div>

    {{-- Table --}}
    <x-table class="mt-4 z-0">
        @slot('head')
        <th class="px-6 py-4">Student No.</th>
        <th class="px-6 py-4">Last Name</th>
        <th class="px-6 py-4">First Name</th>
        <th class="px-6 py-4">Date</th>
        <th class="px-6 py-4">Log In</th>
        <th class="px-6 py-4">Log Out</th>
        <th>@include('livewire.includes.filter-post')</th>
        <th>@include('livewire.includes.filter-attendance-status')</th>
        @endslot

        @slot('data')
        @foreach ($attendances as $attendance)
        <tr wire:key="{{ $attendance->id }}"
            class="text-sm border-b border-lightGray transition-all hover:bg-veryLightGreen">
            <td class="px-6 py-4">{{ $attendance->card->student->student_no }}</td>
            <td class="px-6 py-4">{{ $attendance->card->student->last_name }}</td>
            <td class="px-6 py-4">{{ $attendance->card->student->first_name }}</td>
            <td class="px-6 py-4">{{ \Carbon\Carbon::parse($attendance->logged_in_at)->format('M. j, Y') }}</td>
            <td class="px-6 py-4">{{ \Carbon\Carbon::parse($attendance->logged_in_at)->format('h:i A') }}</td>
            <td class="px-6 py-4">
                @if ($attendance->logged_out_at)
                {{ \Carbon\Carbon::parse($attendance->logged_out_at)->format('h:i A') }}
                @endif
            </td>
            <td class="px-6 py-4">{{ $attendance->post->name }}</td>
            <td class="px-6 py-4">
                <x-badge class="text-white bg-{{$statusColors[$attendance->status]}}" size="xs" fontWeight="semibold">
                    {{ $attendance->status }}
                </x-badge>
            </td>
        </tr>
        @endforeach
        @endslot
    </x-table>

    @if ($attendances->total() == 0)
    <div class="flex justify-center py-6">
        @if (empty($search))
        No records found.
        @else
        No records found for matching "{{ $search }}".
        @endif
    </div>
    @endif

    {{-- Pagination Links --}}
    <div class="mt-4">
        {{ $attendances->links() }}
    </div>
</div>