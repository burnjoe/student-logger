<div>
    <div class="grid lg:grid-cols-2 gap-4 mt-4">
        @include('livewire.includes.search', ['placeholder' => 'Search by student no. or name'])

        <div class="flex justify-between lg:justify-end items-center">
            @can('create students')
            <div class="flex justify-end ps-2">
                <x-button wire:click.prevent="create" btnType="success" class="flex space-x-2 items-center">
                    <i class="fa-solid fa-plus"></i>
                    <span>Add New Student</span>
                </x-button>
            </div>
            @endcan
        </div>
    </div>

    {{-- Table --}}
    <x-table class="mt-4">
        @slot('head')
        <th class="px-6 py-4">Student No.</th>
        <th class="px-6 py-4">Last Name</th>
        <th class="px-6 py-4">First Name</th>
        <th>@include('livewire.includes.filter-program')</th>
        <th class="px-6 py-4">Action</th>
        @endslot

        @slot('data')
        @foreach ($students as $student)
        <tr wire:key="{{ $student->id }}"
            class="text-sm border-b border-lightGray transition-all hover:bg-veryLightGreen">
            <td class="px-6 py-4">{{ $student->student_no }}</td>
            <td class="px-6 py-4">{{ $student->last_name }}</td>
            <td class="px-6 py-4">{{ $student->first_name }}</td>
            <td class="px-6 py-4">Program</td>
            <td class="px-6 py-4 text-md flex space-x-4">
                @can('view students')
                <x-button wire:click.prevent="show({{ $student->id }})" btnType="success" textSize="text-xs">
                    View
                </x-button>
                @endcan
                @can('edit students')
                <x-button wire:click.prevent="edit({{ $student->id }})" btnType="warning" textSize="text-xs">
                    Edit
                </x-button>
                @endcan
                @can('archive students')
                <x-button wire:click.prevent="delete({{ $student->id }})" btnType="danger" textSize="text-xs">
                    Delete
                </x-button>
                @endcan

                @can('view rfids')
                <div class="border-l border-gray pl-4">
                    <x-dropdown align="right" menuWidth="44">
                        @slot('trigger')
                        <x-button btnType="success" class="flex space-x-2 items-center" textSize="text-xs">
                            <span style="text-transform: none;">RFID</span>
                            <i class="fa-solid fa-angle-down"></i>
                        </x-button>
                        @endslot
                        @slot('content')
                        @can('view rfids')
                        <x-dropdown-item wire:click.prevent="show({{ $student->id }}, 'card' )" fontSize="text-xs" element="button">
                            View RFID
                        </x-dropdown-item>
                        @endcan
                        @can('issue rfids')
                        <x-dropdown-item wire:click.prevent="create({{ $student->id }})" fontSize="text-xs" element="button">
                            Issue New RFID
                        </x-dropdown-item>
                        @endcan
                        @can('view issues')
                        <x-dropdown-item wire:click.prevent="show({{ $student->id }}, 'history')" fontSize="text-xs" element="button">
                            View Issue History
                        </x-dropdown-item>
                        @endcan
                        @endslot
                    </x-dropdown>
                </div>
                @endcan
            </td>
        </tr>
        @endforeach
        @endslot
    </x-table>

    @if ($students->total() == 0)
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
        {{ $students->links() }}
    </div>

    {{-- Create Student Form --}}
    @can('create students')
    <x-modal wire:ignore.self name="create-student" title="Add Student" focusable>
        @include('livewire.includes.students-modal.students-form')
    </x-modal>
    @endcan

    {{-- View Student Form --}}
    @can('view students')
    <x-modal wire:ignore.self name="show-student" title="Student Information" focusable>
        @include('livewire.includes.students-modal.students-info')
    </x-modal>
    @endcan

    {{-- Edit Student Form --}}
    @can('edit students')
    <x-modal wire:ignore.self name="edit-student" title="Edit Student" focusable>
        @include('livewire.includes.students-modal.students-form')
    </x-modal>
    @endcan

    {{-- Delete Student Dialog --}}
    @can('archive students')
    <x-modal wire:ignore.self name="delete-student" title="Delete Student" maxWidth="lg" focusable>
        @include('livewire.includes.confirm-form', [
        'prompt' => 'Are you sure you want to delete this record?',
        'btnType' => 'danger',
        'label' => 'Delete',
        'labelLoading' => 'Deleting...',
        ])
    </x-modal>
    @endcan

    {{-- View Student RFID Form --}}
    @can('view rfids')
    <x-modal wire:ignore.self name="show-card" title="RFID Information" focusable>
        @include('livewire.includes.students-modal.cards-info')
    </x-modal>
    @endcan

    {{-- Issue Student RFID Form --}}
    @can('issue rfids')
    <x-modal wire:ignore.self name="create-card" title="Issue RFID" focusable>
        @include('livewire.includes.students-modal.cards-multiform')
    </x-modal>
    @endcan

    {{-- View RFID Issue History Form --}}
    @can('view issues')
    <x-modal wire:ignore.self name="show-issues" title="Issue History" focusable>
        @include('livewire.includes.students-modal.cards-history')
    </x-modal>
    @endcan
</div>