<div>
    <div class="grid lg:grid-cols-2 gap-4 mt-4">
        @include('livewire.includes.search', ['placeholder' => 'Search by student no. or name'])

        <div class="flex justify-between lg:justify-end items-center z-10">
            {{-- Generate Report --}}
            <div class="flex justify-end ps-2">
                <x-dropdown align="right" menuWidth="100%" isFilter="true">
                    @slot('trigger')
                    <x-button btnType="success" class="flex space-x-2 items-center">
                        <i class="fa-solid fa-print"></i>
                        <span>Generate Report</span>
                    </x-button>
                    @endslot
                    @slot('content')
                    {{-- Search label --}}
                    <div class="w-48">
                        <x-input-label for="searchby">
                            <small class="font-normal text-darkGray text-xs">Search by</small>
                        </x-input-label>
                        <x-input-text id="searchby" wire:model.live.debounce.300ms="search" type="text" alignIcon="left"
                            placeholder="Student no. or name" class="w-full mt-1">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </x-input-text>
                    </div>

                    {{-- Start Date --}}
                    <div>
                        <div class="mt-4">
                            <x-input-label for="startdate">
                                <small class="font-normal text-darkGray text-xs">Start Date</small>
                            </x-input-label>
                            <x-input-text id="startdate" wire:model="startdate" name="startdate" type="date"
                                class="w-full mt-1 bg-lightGray" :messages="$errors->get('startdate')" />
                        </div>
                    </div>

                    {{-- End Date --}}
                    <div>
                        <div class="mt-4">
                            <x-input-label for="enddate">
                                <small class="font-normal text-darkGray text-xs">End Date</small>
                            </x-input-label>
                            <x-input-text id="enddate" wire:model="enddate" name="enddate" type="date"
                                class="w-full mt-1 bg-lightGray" :messages="$errors->get('enddate')" />
                        </div>
                    </div>

                    <hr class="mx-4 my-2 text-gray">

                    {{-- Print --}}
                    <div class="flex justify-end items-center space-x-4">
                        {{-- <x-button x-on:click.prevent="$dispatch('close-modal')" btnType="secondary"
                            textSize="text-xs" class="flex space-x-2 items-center">
                            Cancel
                        </x-button> --}}
                        <x-button href="{{ route('export_attendance_pdf') }}" btnType="success" element="a"
                            textSize="text-xs" class="flex space-x-2 items-center" target="_blank">
                            <span>Print</span>
                        </x-button>
                    </div>
                    @endslot
                </x-dropdown>
            </div>
        </div>
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
        <th>@include('livewire.includes.filter-attendance-status')</th>
        <th>@include('livewire.includes.filter-post')</th>
        @endslot

        @slot('data')
        @foreach ($attendances as $attendance)
        <tr wire:key="{{ $attendance->id }}"
            class="text-sm border-b border-lightGray transition-all hover:bg-veryLightGreen">
            <td class="px-6 py-4">{{ $attendance->card->student->student_no }}</td>
            <td class="px-6 py-4">{{ $attendance->card->student->last_name }}</td>
            <td class="px-6 py-4">{{ $attendance->card->student->first_name }}</td>
            <td class="px-6 py-4">{{ \Carbon\Carbon::parse($attendance->logged_in_at)->format('M. d, Y') }}</td>
            <td class="px-6 py-4">{{ \Carbon\Carbon::parse($attendance->logged_in_at)->format('h:i A') }}</td>
            <td class="px-6 py-4">
                @if ($attendance->logged_out_at)
                {{ \Carbon\Carbon::parse($attendance->logged_out_at)->format('h:i A') }}
                @endif
            </td>
            <td class="px-6 py-4">
                @if ($attendance->status == 'IN')
                <x-badge class="text-white bg-orange" size="xs" fontWeight="semibold">
                    {{ $attendance->status }}
                </x-badge>
                @elseif($attendance->status == 'OUT')
                <x-badge class="text-white bg-green" size="xs" fontWeight="semibold">
                    {{ $attendance->status }}
                </x-badge>
                @elseif($attendance->status == 'MISSED')
                <x-badge class="text-white bg-red" size="xs" fontWeight="semibold">
                    {{ $attendance->status }}
                </x-badge>
                @endif
            </td>
            <td class="px-6 py-4">{{ $attendance->post->name }}</td>
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