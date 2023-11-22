<div>
   <div class="grid grid-cols-2 mt-4">
      @include('livewire.includes.search', ['placeholder' => 'Search by student no. or name'])

      {{-- Filtering --}}
      <div class="flex justify-end items-center">
         <div class="relative text-sm">
            <i class="fa-solid fa-filter ps-2 text-darkGray"></i>
            <span class="font-normal text-darkGray ps-1">Filter by:</span>
         </div>

         {{-- Filter by status --}}
         <div class="flex justify-start items-center ps-2">
            @include('livewire.includes.filter-status')
         </div>

         {{-- Filter by college --}}
         <div class="flex justify-start items-center ps-2">
            @include('livewire.includes.filter-college')
         </div>

         {{-- Filter by program --}}
         <div class="flex justify-start items-center ps-2">
            @include('livewire.includes.filter-program')
         </div>

         {{-- Generate Report --}}
         <div class="flex justify-end ps-2">
            <x-button href="{{ route('export_attendance_pdf') }}" btnType="success" element="a"
               class="flex space-x-2 items-center" target="_blank">
               <i class="fa-solid fa-print"></i>
               <span>Generate Report</span>
            </x-button>
         </div>
      </div>
   </div>

   {{-- Table --}}
   <x-table class="mt-4">
      @slot('head')
         <th class="px-6 py-4">Student No.</th>
         <th class="px-6 py-4">Last Name</th>
         <th class="px-6 py-4">First Name</th>
         <th class="px-6 py-4">Date</th>
         <th class="px-6 py-4">Log In</th>
         <th class="px-6 py-4">Log Out</th>
         <th class="px-6 py-4">Status</th>
         <th class="px-6 py-4">Post</th>
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
