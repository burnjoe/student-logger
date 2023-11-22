<div>
   {{-- Main Gate --}}
   <div class="mx-auto my-6 bg-white rounded-lg overflow-hidden shadow-lg sm:w-full">
      {{-- Header --}}
      <div class="flex bg-green px-6 py-4">
         <span class="text-white text-lg font-bold">Main Gate of Campus</span>
      </div>
      {{-- Body --}}
      <div class="p-6">
         <div class="flex flex-col md:flex-row gap-4">
            {{-- Left Side --}}
            <div class="card-body md:w-1/3 flex flex-col items-center">
               <span class="text-1rem font-bold">Number of Students per Dept. in the Campus</span>
               <canvas id="campusChart" style="max-width: 400px; max-height: 400px;"></canvas>
            </div>
            {{-- Right Side --}}
            <div class="card-body w-full md:w-3/4">
               <div class="flex flex-col">
                  <span class="text-1rem font-bold">Total Number Students</span>
                  #
               </div>

               <div>

               </div>
            </div>
         </div>
      </div>
   </div>

   {{-- Library --}}
   <div class="mx-auto my-6 bg-white rounded-lg overflow-hidden shadow-lg sm:w-full">
      {{-- Header --}}
      <div class="flex bg-green px-6 py-4">
         <span class="text-white text-lg font-bold">Library</span>
      </div>
      {{-- Body --}}
      <div class="p-6">
         <div class="flex flex-col md:flex-row gap-4">
            {{-- Left Side --}}
            <div class="card-body md:w-1/3 flex flex-col items-center">
               <span class="text-1rem font-bold">Number of Students per Dept. in the Library</span>
               <canvas id="libraryChart" style="max-width: 400px; max-height: 400px;"></canvas>
            </div>
            {{-- Right side --}}
            <div class="card-body w-full md:w-3/4">
               <div class="flex flex-col mb-3">
                  <span class="text-1rem font-bold">Total Number Students</span>
                  #
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
                        <span class="text-1rem font-bold ">Top Users in Library</span>
                     </div>

                     {{-- Print --}}
                     <div class="flex">
                        <x-button href="{{ route('export_library_pdf') }}" element="a" btnType="primary"
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
                           <td class="px-6 py-4">11</td>
                           <td class="px-6 py-4">CCS</td>
                        </tr>
                        {{-- @endforeach --}}
                     @endslot
                  </x-table>
               </div>
            </div>
         </div>
      </div>
   </div>

   {{-- Clinic --}}
   <div class="mx-auto my-6 bg-white rounded-lg overflow-hidden shadow-lg sm:w-full">
      {{-- Header --}}
      <div class="flex bg-green px-6 py-4">
         <span class="text-white text-lg font-bold">Clinic</span>
      </div>
      {{-- Body --}}
      <div class="p-6">
         <div class="flex flex-col md:flex-row gap-4">
            {{-- Left Side --}}
            <div class="card-body md:w-1/3 flex flex-col items-center">
               <span class="text-1rem font-bold">Number of Students per Dept. in the Clinic</span>
               <canvas id="clinicChart" style="max-width: 400px; max-height: 400px;"></canvas>
            </div>
            {{-- Right Side --}}
            <div class="card-body w-full md:w-3/4">
               <div class="flex flex-col mb-3">
                  <span class="text-1rem font-bold">Total Number Students</span>
                  #
               </div>

               <div class="flex flex-col">
                  {{-- Filter --}}
                  <div class="flex flex-col">
                     {{-- Month --}}
                     <div class="flex flex-col mb-3">
                        <small for="selectMonth" class="font-normal text-darkGray pb-2" style="font-size: 80%;">Select
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
                     @endslot
                  </x-table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

@push('scripts')
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

   <script>
      const campusChart = document.getElementById('campusChart');
      const libraryChart = document.getElementById('libraryChart');
      const clinicChart = document.getElementById('clinicChart');

      // Main Gate Chart
      new Chart(campusChart, {
         type: 'pie',
         data: {
            labels: ['CAS',
               'CBAA',
               'CCS',
               'COED',
               'COE',
               'CHAS',
               'SHS'
            ],
            datasets: [{
               label: ' # of Students',
               data: [12,
                  19,
                  3,
                  5,
                  2,
                  3,
                  4
               ],
               backgroundColor: [
                  'rgb(153, 0, 0)', //CAS
                  'rgb(255, 205, 86)', //CBAA
                  'rgb(255, 128, 0)', //CCS
                  'rgb(0, 102, 204)', //COED
                  'rgb(255, 102, 102)', //COE
                  'rgb(0, 153, 0)', //CHAS
                  'rgb(153, 255, 204)' //SHS
               ],
               hoverOffset: 4
            }]
         },
         options: {
            responsive: true
         }
      });

      // Library Chart
      new Chart(libraryChart, {
         type: 'pie',
         data: {
            labels: ['CAS',
               'CBAA',
               'CCS',
               'COED',
               'COE',
               'CHAS',
               'SHS'
            ],
            datasets: [{
               label: ' # of Students',
               data: [10,
                  19,
                  5,
                  9,
                  12,
                  9,
                  8
               ],
               backgroundColor: [
                  'rgb(153, 0, 0)', //CAS
                  'rgb(255, 205, 86)', //CBAA
                  'rgb(255, 128, 0)', //CCS
                  'rgb(0, 102, 204)', //COED
                  'rgb(255, 102, 102)', //COE
                  'rgb(0, 153, 0)', //CHAS
                  'rgb(153, 255, 204)' //SHS
               ],
               hoverOffset: 4
            }]
         },
         options: {
            responsive: true
         }
      });

      // Clinic Chart
      new Chart(clinicChart, {
         type: 'pie',
         data: {
            labels: ['CAS',
               'CBAA',
               'CCS',
               'COED',
               'COE',
               'CHAS',
               'SHS'
            ],
            datasets: [{
               label: ' # of Students',
               data: [1,
                  1,
                  2,
                  1,
                  2,
                  3,
                  4
               ],
               backgroundColor: [
                  'rgb(153, 0, 0)', //CAS
                  'rgb(255, 205, 86)', //CBAA
                  'rgb(255, 128, 0)', //CCS
                  'rgb(0, 102, 204)', //COED
                  'rgb(255, 102, 102)', //COE
                  'rgb(0, 153, 0)', //CHAS
                  'rgb(153, 255, 204)' //SHS
               ],
               hoverOffset: 4
            }]
         },
         options: {
            responsive: true
         }
      });
   </script>
@endpush
