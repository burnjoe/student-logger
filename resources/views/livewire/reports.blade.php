@php
   $statusColors = [
       'IN' => 'orange',
       'OUT' => 'green',
       'MISSED' => 'red',
   ];
@endphp

<div>
   {{-- Main Gate --}}
   {{-- @can('view main gate reports') --}}
   <div class="mx-auto my-6 bg-white rounded-lg overflow-hidden shadow-lg sm:w-full">
      {{-- Header --}}
      <div class="flex bg-green px-6 py-4">
         <span class="text-white text-lg font-bold">Main Gate of Campus</span>
      </div>
      {{-- Body --}}
      <div class="p-6">
         <div class="flex flex-col md:flex-row gap-4 pb-6">
            {{-- Left Side --}}
            <div class="md:w-1/3 flex flex-col items-center">
               <span class="text-1rem font-semibold">Number of Students per Dept. in the Campus</span>
               <canvas id="campusDeptChart" style="max-width: 400px; max-height: 400px;"></canvas>
            </div>
            {{-- Middle --}}
            <div class="md:w-1/3 flex flex-col items-center">
               <span class="text-1rem font-semibold">Number of Students per Status in the Campus</span>
               <canvas id="campusStatusChart" style="max-width: 400px; max-height: 400px;"></canvas>
            </div>
            {{-- Right Side --}}
            <div class="w-full md:w-3/4">
               <div class="flex flex-col mb-3">
                  <p class="text-1rem font-semibold">
                     Total Number Students
                  </p>
                  <p class="text-3xl text-veryDarkGray font-bold">
                     0
                  </p>
               </div>

               <div class="flex flex-col w-2/5 md:w-full lg:w-1/2">
                  {{-- Filter Month & Year --}}
                  <div class="flex flex-col ">
                     <x-input-label for="selectMonthYearMainGate">
                        <small class="font-normal text-darkGray text-xs">Select a month & year</small>
                     </x-input-label>
                     <x-input-text id="selectMonthYearMainGate" wire:model.live.defer="selectMonthYearMainGate"
                        name="selectMonthYearMainGate" type="month" class="w-full mt-1 bg-lightGray"
                        :messages="$errors->get('selectMonthYearMainGate')" />
                  </div>
               </div>
            </div>
         </div>
         
         {{-- Table --}}
         <div>
            <div class="flex flex-row justify-between">
               <div class="flex items-center">
                  <span class="text-1rem font-semibold">Main Gate Report</span>
               </div>

               {{-- Print --}}
               <div class="flex">
                  <x-button
                     href="{{ route('export_maingate_pdf', ['selectedStatuses' => $selectedStatuses, 'selectedMonthYearMainGate' => $selectMonthYearMainGate]) }}"
                     element="a" btnType="primary" textSize="text-xs" class="flex space-x-2 items-center"
                     target="_blank">
                     <i class="fa-solid fa-print"></i>
                     <span>Print</span>
                  </x-button>
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
               @endslot

               @slot('data')
                  @foreach ($mainGateAttendances as $attendance)
                     <tr wire:key="{{ $attendance->id }}"
                        class="text-sm border-b border-lightGray transition-all hover:bg-veryLightGreen">
                        <td class="px-6 py-4">{{ $attendance->card->student->student_no }}</td>
                        <td class="px-6 py-4">{{ $attendance->card->student->last_name }}</td>
                        <td class="px-6 py-4">{{ $attendance->card->student->first_name }}</td>
                        <td class="px-6 py-4">{{ \Carbon\Carbon::parse($attendance->logged_in_at)->format('M. j, Y') }}
                        </td>
                        <td class="px-6 py-4">{{ \Carbon\Carbon::parse($attendance->logged_in_at)->format('h:i A') }}</td>
                        <td class="px-6 py-4">
                           @if ($attendance->logged_out_at)
                              {{ \Carbon\Carbon::parse($attendance->logged_out_at)->format('h:i A') }}
                           @endif
                        </td>
                        <td class="px-6 py-4">
                           <x-badge class="text-white bg-{{ $statusColors[$attendance->status] }}" size="xs"
                              fontWeight="semibold">
                              {{ $attendance->status }}
                           </x-badge>
                        </td>
                     </tr>
                  @endforeach
               @endslot
            </x-table>

            @if ($mainGateAttendances->total() == 0)
               <div class="flex justify-center py-6">
                  No records found.
               </div>
            @endif

            {{-- Pagination Links --}}
            <div class="mt-4">
               {{ $mainGateAttendances->links() }}
            </div>
         </div>
      </div>
   </div>
   @push('scripts')
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <script>
         new Chart(document.getElementById('campusDeptChart').getContext('2d'), {
            type: 'pie',
            data: {
               labels: ['CAS', 'CBAA', 'CCS', 'COED', 'COE', 'CHAS'],
               // labels: @ json($data->keys()),
               datasets: [{
                  label: ' # of Students',
                  data: [10, 20, 30, 5, 9, 12, 9],
                  // data: @ json($data->values())
                  backgroundColor: ['rgb(153, 0, 0)', 'rgb(255, 205, 86)', 'rgb(255, 128, 0)', 'rgb(0, 102, 204)',
                     'rgb(255, 102, 102)', 'rgb(0, 153, 0)'
                  ],
                  hoverOffset: 4
               }]
            }
         });

         new Chart(document.getElementById('campusStatusChart').getContext('2d'), {
            type: 'pie',
            data: {
               labels: ['IN', 'OUT', 'MISSED'],
               datasets: [{
                  label: ' # of Students',
                  data: [5, 10, 3],
                  backgroundColor: ['orange', 'green', 'red'],
                  hoverOffset: 4
               }]
            },
         });
      </script>
   @endpush
   {{-- @endcan --}}

   {{-- Library --}}
   {{-- @can('view library reports') --}}
   <div class="mx-auto my-6 bg-white rounded-lg overflow-hidden shadow-lg sm:w-full">
      {{-- Header --}}
      <div class="flex bg-green px-6 py-4">
         <span class="text-white text-lg font-bold">Library</span>
      </div>
      {{-- Body --}}
      <div class="p-6">
         <div class="flex flex-col md:flex-row gap-4">
            {{-- Left Side --}}
            <div class="md:w-1/3 flex flex-col items-center">
               <span class="text-1rem font-semibold">Number of Students per Dept. in the Library</span>
               <canvas id="libraryDeptChart" style="max-width: 400px; max-height: 400px;"></canvas>
            </div>
            {{-- Right side --}}
            <div class="w-full md:w-3/4">
               <div class="flex flex-col mb-3">
                  <p class="text-1rem font-semibold">
                     Total Number Students
                  </p>
                  <p class="text-3xl text-veryDarkGray font-bold">
                     0
                  </p>
               </div>

               <div class="flex flex-col">
                  {{-- Filter Month & Year --}}
                  <div class="flex flex-col w-full md:w-1/2">
                     <x-input-label for="selectMonthYearLibrary">
                        <small class="font-normal text-darkGray text-xs">Select a month & year</small>
                     </x-input-label>
                     <x-input-text id="selectMonthYearLibrary" wire:model.live.defer="selectMonthYearLibrary"
                        name="selectMonthYearLibrary" type="month" class="w-full mt-1 bg-lightGray"
                        :messages="$errors->get('selectMonthYearLibrary')" />
                  </div>

                  <div class="flex flex-row justify-between mt-4">
                     <div class="flex items-center">
                        <span class="text-1rem font-semibold">Top Users in Library</span>
                     </div>

                     {{-- Print --}}
                     <div class="flex">
                        <x-button href="{{ route('export_library_pdf') }}" onclick="generatePDF()" element="a"
                           btnType="primary" textSize="text-xs" class="flex space-x-2 items-center" target="_blank">
                           <i class="fa-solid fa-print"></i>
                           <span>Print</span>
                        </x-button>
                     </div>
                  </div>

                  <x-table class="mt-4 z-0">
                     @slot('head')
                        <th class="px-6 py-4">Last Name</th>
                        <th class="px-6 py-4">First Name</th>
                        <th class="px-6 py-4">Frequency of Visit</th>
                        {{-- <th class="px-6 py-4">College</th> --}}
                     @endslot

                     @slot('data')
                        @foreach ($libraryAttendances as $attendance)
                           <tr wire:key="{{ $attendance->id }}"
                              class="text-sm border-b border-lightGray transition-all hover:bg-veryLightGreen">
                              <td class="px-6 py-4">{{ $attendance->card->student->last_name }}</td>
                              <td class="px-6 py-4">{{ $attendance->card->student->first_name }}</td>
                              <td class="px-6 py-4">{{ $attendance->frequency }}</td>
                              {{-- <td class="px-6 py-4">{{ $attendance->card->student->college->name }}</td> --}}
                           </tr>
                        @endforeach
                     @endslot
                  </x-table>
               </div>
            </div>
         </div>
      </div>
   </div>
   @push('scripts')
      {{-- chart.js --}}
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <script>
         // Library Chart
         new Chart(document.getElementById('libraryDeptChart').getContext('2d'), {
            type: 'pie',
            data: {
               labels: ['CAS', 'CBAA', 'CCS', 'COED', 'COE', 'CHAS'],
               datasets: [{
                  label: ' # of Students',
                  data: [10, 20, 30, 5, 9, 12, 9],
                  backgroundColor: ['rgb(153, 0, 0)', 'rgb(255, 205, 86)', 'rgb(255, 128, 0)', 'rgb(0, 102, 204)',
                     'rgb(255, 102, 102)', 'rgb(0, 153, 0)'
                  ],
                  hoverOffset: 4
               }]
            }
         });
      </script>
   @endpush
   {{-- @endcan --}}

   {{-- Clinic --}}
   {{-- @can('view clinic reports') --}}
   <div class="mx-auto my-6 bg-white rounded-lg overflow-hidden shadow-lg sm:w-full">
      {{-- Header --}}
      <div class="flex bg-green px-6 py-4">
         <span class="text-white text-lg font-bold">Clinic</span>
      </div>
      {{-- Body --}}
      <div class="p-6">
         <div class="flex flex-col md:flex-row gap-4">
            {{-- Left Side --}}
            <div class="md:w-1/3 flex flex-col items-center">
               <span class="text-1rem font-semibold">Number of Students per Dept. in the Clinic</span>
               <canvas id="clinicDeptChart" style="max-width: 400px; max-height: 400px;"></canvas>
            </div>
            {{-- Right Side --}}
            <div class="w-full md:w-3/4">
               <div class="flex flex-col mb-3">
                  <p class="text-1rem font-semibold">
                     Total Number Students
                  </p>
                  <p class="text-3xl text-veryDarkGray font-bold">
                     0
                  </p>
               </div>

               <div class="flex flex-col">
                  {{-- Filter Month & Year --}}
                  <div class="flex flex-col w-full md:w-1/2">
                     <x-input-label for="selectMonthYearClinic">
                        <small class="font-normal text-darkGray text-xs">Select a month & year</small>
                     </x-input-label>
                     <x-input-text id="selectMonthYearClinic" wire:model.live.defer="selectMonthYearClinic"
                        name="" type="month" class="w-full mt-1 bg-lightGray" :messages="$errors->get('selectMonthYearClinic')" />
                  </div>

                  <div class="flex flex-row justify-between mt-4">
                     <div class="flex items-center">
                        <span class="text-1rem font-bold ">Top Users in Clinic</span>
                     </div>

                     {{-- Print --}}
                     <div class="flex">
                        <x-button href="{{ route('export_clinic_pdf') }}" element="a" btnType="primary"
                           textSize="text-xs" class="flex space-x-2 items-center" target="_blank">
                           <i class="fa-solid fa-print"></i>
                           <span>Print</span>
                        </x-button>
                     </div>
                  </div>

                  <x-table class="mt-4">
                     @slot('head')
                        <th class="px-6 py-4">Last Name</th>
                        <th class="px-6 py-4">First Name</th>
                        <th class="px-6 py-4">Frequency of Visit</th>
                        {{-- <th class="px-6 py-4">College</th> --}}
                     @endslot

                     @slot('data')
                        @foreach ($clinicAttendances as $attendance)
                           <tr wire:key="{{ $attendance->id }}"
                              class="text-sm border-b border-lightGray transition-all hover:bg-veryLightGreen">
                              <td class="px-6 py-4">{{ $attendance->card->student->last_name }}</td>
                              <td class="px-6 py-4">{{ $attendance->card->student->first_name }}</td>
                              <td class="px-6 py-4">{{ $attendance->frequency }}</td>
                              {{-- <td class="px-6 py-4">{{ $attendance->card->student->college->name }}</td> --}}
                           </tr>
                        @endforeach
                     @endslot
                  </x-table>
               </div>
            </div>
         </div>
      </div>
   </div>
   @push('scripts')
      {{-- chart.js --}}
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <script>
         // Clinic Chart
         new Chart(document.getElementById('clinicDeptChart').getContext('2d'), {
            type: 'pie',
            data: {
               labels: ['CAS', 'CBAA', 'CCS', 'COED', 'COE', 'CHAS'],
               datasets: [{
                  label: ' # of Students',
                  data: [10, 20, 30, 5, 9, 12, 9],
                  backgroundColor: ['rgb(153, 0, 0)', 'rgb(255, 205, 86)', 'rgb(255, 128, 0)', 'rgb(0, 102, 204)',
                     'rgb(255, 102, 102)', 'rgb(0, 153, 0)'
                  ],
                  hoverOffset: 4
               }]
            }
         });
      </script>
   @endpush
   {{-- @endcan --}}
