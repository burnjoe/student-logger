<div>
    <div class="grid lg:grid-cols-2 gap-4 mt-4">
        @include('livewire.includes.search', ['placeholder' => 'Search by student no. or name'])
    </div>

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
                @can('restore students')
                <x-button wire:click.prevent="restore({{ $student->id }})" btnType="secondary" textSize="text-xs">
                    Restore
                </x-button>
                @endcan
                @can('delete students')
                <x-button wire:click.prevent="delete({{ $student->id }})" btnType="danger" textSize="text-xs">
                    Delete Permanently
                </x-button>
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

    {{-- View Student Form --}}
    @can('view students')
    <x-modal wire:ignore.self name="show-student" title="Student Information" focusable>
        @include('livewire.includes.view-student-form')
    </x-modal>
    @endcan

    {{-- Restore Student Dialog --}}
    @can('restore students')
    <x-modal wire:ignore.self name="restore-student" title="Restore Student" maxWidth="lg" focusable>
        @include('livewire.includes.confirm-form', [
        'prompt' => 'Are you sure you want to restore this record?',
        'btnType' => 'success',
        'label' => 'Restore',
        'labelLoading' => 'Restoring...',
        ])
    </x-modal>
    @endcan

    {{-- Delete Permanently Student Dialog --}}
    @can('delete students')
    <x-modal wire:ignore.self name="delete-student" title="Delete Student Permanently" maxWidth="lg" focusable>
        @include('livewire.includes.confirm-form', [
        'prompt' => 'Are you sure you want to delete this record permanently?',
        'btnType' => 'danger',
        'label' => 'Delete',
        'labelLoading' => 'Deleting...',
        ])
    </x-modal>
    @endcan
</div>