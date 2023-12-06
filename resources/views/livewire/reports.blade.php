<div>
   {{-- Main Gate --}}
   {{-- @can('view clinic reports') --}}
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
                  <canvas id="campusChart" style="max-width: 400px; max-height: 400px;"></canvas>
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
                     {{-- Filter --}}
                     <div class="flex flex-col">
                        {{-- Month --}}
                        <div class="flex flex-col mb-3">
                           <small for="selectMonth" class="font-normal text-darkGray pb-2.5" style="font-size: 80%;">Select
                              a month</small>

                           <select name="semester" id="selectMonth" class="">
                              <option value="1" selected>January</option>
                              <option value="2">February</option>
                              <option value="3">March</option>
                              <option value="4">April</option>
                              <option value="5">May</option>
                              <option value="6">June</option>
                              <option value="7">July</option>
                              <option value="8">August</option>
                              <option value="9">September</option>
                              <option value="10">October</option>
                              <option value="11">November</option>
                              <option value="12">December</option>
                           </select>
                        </div>
                        {{-- AY Semester --}}
                        <div class="flex flex-col mb-3">
                           <small for="selectSemester" class="font-normal text-darkGray pb-2.5" style="font-size: 80%;">
                              Select a semester
                           </small>

                           <select name="semester" id="selectSemester">
                              <option selected>First Semester A.Y 2023-2024</option>
                              <option value="1">Second Semester A.Y 2023-2024</option>
                              <option value="2">First Semester A.Y 2022-2023</option>
                              <option value="3">Second Semester A.Y 2022-2023</option>
                              <option value="1">Second Semester A.Y 2021-2022</option>
                              <option value="2">First Semester A.Y 2021-2022</option>
                              <option value="3">Second Semester A.Y 2020-2021</option>
                              <option value="2">First Semester A.Y 2020-2021</option>
                           </select>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

            <div class="">
               <div class="flex flex-row justify-between">
                  <div class="flex items-center">
                     <span class="text-1rem font-semibold">Main Gate Report</span>
                  </div>

                  {{-- Print --}}
                  <div class="flex">
                     <x-button href="{{ route('export_maingate_pdf') }}" element="a" btnType="primary"
                        textSize="text-xs" class="flex space-x-2 items-center" target="_blank">
                        <i class="fa-solid fa-print"></i>
                        <span>Print</span>
                     </x-button>
                  </div>
               </div>

               <x-table class="mt-4">
                  @slot('head')
                     <th class="px-6 py-4">Student No.</th>
                     <th class="px-6 py-4">Last Name</th>
                     <th class="px-6 py-4">First Name</th>
                     <th class="px-6 py-4">Date</th>
                     <th class="px-6 py-4">Log In</th>
                     <th class="px-6 py-4">Log Out</th>
                     <th class="px-6 py-4">Status</th>
                  @endslot

                  @slot('data')
                     {{-- @foreach ($students as $student) --}}
                     <tr wire:key="" class="text-sm border-b border-lightGray transition-all hover:bg-veryLightGreen">
                        <td class="px-6 py-4">2000541</td>
                        <td class="px-6 py-4">Ferreras</td>
                        <td class="px-6 py-4">Vince Austin</td>
                        <td class="px-6 py-4">Nov. 05, 2023</td>
                        <td class="px-6 py-4">05:05 PM</td>
                        <td class="px-6 py-4">10:05 PM</td>
                        <td class="px-6 py-4">
                           <x-badge class="text-white bg-green" size="xs" fontWeight="semibold">
                              OUT
                           </x-badge>
                           {{-- @if ($attendance->status == 'IN')
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
                           @endif --}}
                        </td>
                     </tr>
                     {{-- @endforeach --}}
                  @endslot
               </x-table>
            </div>
         </div>
      </div>
      @push('scripts')
         {{-- chart.js --}}
         <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
         <script>
            new Chart(document.getElementById('campusChart').getContext('2d'), {
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
                  <canvas id="libraryChart" style="max-width: 400px; max-height: 400px;"></canvas>
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
                     {{-- Filter --}}
                     <div class="flex flex-col">
                        {{-- Month --}}
                        <div class="flex flex-col mb-3">
                           <small for="selectMonth" class="font-normal text-darkGray pb-2.5" style="font-size: 80%;">Select
                              a month</small>

                           <select name="semester" id="selectMonth" class="">
                              <option value="1" selected>January</option>
                              <option value="2">February</option>
                              <option value="3">March</option>
                              <option value="4">April</option>
                              <option value="5">May</option>
                              <option value="6">June</option>
                              <option value="7">July</option>
                              <option value="8">August</option>
                              <option value="9">September</option>
                              <option value="10">October</option>
                              <option value="11">November</option>
                              <option value="12">December</option>
                           </select>
                        </div>
                        {{-- AY Semester --}}
                        <div class="flex flex-col mb-3">
                           <small for="selectSemester" class="font-normal text-darkGray pb-2.5" style="font-size: 80%;">
                              Select a semester
                           </small>

                           <select name="semester" id="selectSemester">
                              <option selected>First Semester A.Y 2023-2024</option>
                              <option value="1">Second Semester A.Y 2023-2024</option>
                              <option value="2">First Semester A.Y 2022-2023</option>
                              <option value="3">Second Semester A.Y 2022-2023</option>
                              <option value="1">Second Semester A.Y 2021-2022</option>
                              <option value="2">First Semester A.Y 2021-2022</option>
                              <option value="3">Second Semester A.Y 2020-2021</option>
                              <option value="2">First Semester A.Y 2020-2021</option>
                           </select>
                        </div>
                     </div>

                     <div class="flex flex-row justify-between">
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

                     <x-table class="mt-4">
                        @slot('head')
                           <th class="px-6 py-4">Name</th>
                           <th class="px-6 py-4">Frequency of Visit</th>
                           <th class="px-6 py-4">College</th>
                        @endslot

                        @slot('data')
                           {{-- @foreach ($students as $student) --}}
                           <tr wire:key=""
                              class="text-sm border-b border-lightGray transition-all hover:bg-veryLightGreen">
                              <td class="px-6 py-4">Ferreras, Vince Austin R.</td>
                              <td class="px-6 py-4">11</td>
                              <td class="px-6 py-4">CCS</td>
                           </tr>
                           {{-- @endforeach --}}
                           <tr wire:key=""
                              class="text-sm border-b border-lightGray transition-all hover:bg-veryLightGreen">
                              <td class="px-6 py-4">Ferreras, Vince Austin R.</td>
                              <td class="px-6 py-4">11</td>
                              <td class="px-6 py-4">CCS</td>
                           </tr>
                           <tr wire:key=""
                              class="text-sm border-b border-lightGray transition-all hover:bg-veryLightGreen">
                              <td class="px-6 py-4">Ferreras, Vince Austin R.</td>
                              <td class="px-6 py-4">11</td>
                              <td class="px-6 py-4">CCS</td>
                           </tr>
                           <tr wire:key=""
                              class="text-sm border-b border-lightGray transition-all hover:bg-veryLightGreen">
                              <td class="px-6 py-4">Ferreras, Vince Austin R.</td>
                              <td class="px-6 py-4">11</td>
                              <td class="px-6 py-4">CCS</td>
                           </tr>
                           <tr wire:key=""
                              class="text-sm border-b border-lightGray transition-all hover:bg-veryLightGreen">
                              <td class="px-6 py-4">Ferreras, Vince Austin R.</td>
                              <td class="px-6 py-4">11</td>
                              <td class="px-6 py-4">CCS</td>
                           </tr>
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
            new Chart(document.getElementById('libraryChart').getContext('2d'), {
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
                  <canvas id="clinicChart" style="max-width: 400px; max-height: 400px;"></canvas>
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
                     {{-- Filter --}}
                     <div class="flex flex-col">
                        {{-- Month --}}
                        <div class="flex flex-col mb-3">
                           <small for="selectMonth" class="font-normal text-darkGray pb-2"
                              style="font-size: 80%;">Select
                              a month</small>

                           <select name="semester" id="selectMonth">
                              <option value="1" selected>January</option>
                              <option value="2">February</option>
                              <option value="3">March</option>
                              <option value="4">April</option>
                              <option value="5">May</option>
                              <option value="6">June</option>
                              <option value="7">July</option>
                              <option value="8">August</option>
                              <option value="9">September</option>
                              <option value="10">October</option>
                              <option value="11">November</option>
                              <option value="12">December</option>
                           </select>
                        </div>
                        {{-- AY Semester --}}
                        <div class="flex flex-col mb-3">
                           <small for="selectSemester" class="font-normal text-darkGray pb-2" style="font-size: 80%;">
                              Select a semester
                           </small>

                           <select name="semester" id="selectSemester">
                              <option selected>First Semester A.Y 2023-2024</option>
                              <option value="1">Second Semester A.Y 2023-2024</option>
                              <option value="2">First Semester A.Y 2022-2023</option>
                              <option value="3">Second Semester A.Y 2022-2023</option>
                              <option value="1">Second Semester A.Y 2021-2022</option>
                              <option value="2">First Semester A.Y 2021-2022</option>
                              <option value="3">Second Semester A.Y 2020-2021</option>
                              <option value="2">First Semester A.Y 2020-2021</option>
                           </select>
                        </div>
                     </div>
                     <div class="flex flex-row justify-between">
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
                           <th class="px-6 py-4">Name</th>
                           <th class="px-6 py-4">Frequency of Visit</th>
                           <th class="px-6 py-4">College</th>
                        @endslot

                        @slot('data')
                           {{-- @foreach ($students as $student) --}}
                           <tr wire:key=""
                              class="text-sm border-b border-lightGray transition-all hover:bg-veryLightGreen">
                              <td class="px-6 py-4">Ferreras, Vince Austin R.</td>
                              <td class="px-6 py-4">2</td>
                              <td class="px-6 py-4">CCS</td>
                           </tr>
                           {{-- @endforeach --}}
                           <tr wire:key=""
                              class="text-sm border-b border-lightGray transition-all hover:bg-veryLightGreen">
                              <td class="px-6 py-4">Ferreras, Vince Austin R.</td>
                              <td class="px-6 py-4">11</td>
                              <td class="px-6 py-4">CCS</td>
                           </tr>
                           <tr wire:key=""
                              class="text-sm border-b border-lightGray transition-all hover:bg-veryLightGreen">
                              <td class="px-6 py-4">Ferreras, Vince Austin R.</td>
                              <td class="px-6 py-4">11</td>
                              <td class="px-6 py-4">CCS</td>
                           </tr>
                           <tr wire:key=""
                              class="text-sm border-b border-lightGray transition-all hover:bg-veryLightGreen">
                              <td class="px-6 py-4">Ferreras, Vince Austin R.</td>
                              <td class="px-6 py-4">11</td>
                              <td class="px-6 py-4">CCS</td>
                           </tr>
                           <tr wire:key=""
                              class="text-sm border-b border-lightGray transition-all hover:bg-veryLightGreen">
                              <td class="px-6 py-4">Ferreras, Vince Austin R.</td>
                              <td class="px-6 py-4">11</td>
                              <td class="px-6 py-4">CCS</td>
                           </tr>
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
            new Chart(document.getElementById('clinicChart').getContext('2d'), {
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
</div>
