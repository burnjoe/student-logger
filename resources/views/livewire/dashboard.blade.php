<div>
   <x-card>
      <span class="text-1rem font-semibold">
         {{ 'Welcome, ' . Auth::user()->employee->first_name . ' ' . Auth::user()->employee->last_name . '!' }}
      </span>
   </x-card>

   <x-card class="mt-4">
      <p class="text-1rem font-semibold">
         Total Number of Students:
      </p>
      <p class="text-6xl text-veryDarkGray font-bold">
         0
      </p>
   </x-card>

   <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
      {{-- pie chart per department --}}
      <x-card>
         <p class="text-1rem font-semibold">
            Live Student Population Count:
         </p>
         <p class="text-6xl text-veryDarkGray font-bold">
            {{ $liveCount }}
         </p>
         <div class="flex flex-col items-center mt-2">
            <span class="text-1rem font-semibold">Number of Students per Dept.</span>
            <canvas id="campusDeptChart" style="max-width: 400px; max-height: 400px;"></canvas>
         </div>
      </x-card>

      {{-- pie chart per status --}}
      <x-card>
         <div class="flex flex-col items-center">
            <span class="text-1rem font-semibold">Number of Students per Status</span>
            <div id="noStatusData" class="flex justify-center py-6">
               No records found.
           </div>
            <canvas id="campusStatusChart" style="max-width: 400px; max-height: 400px;"></canvas>
         </div>
      </x-card>
   </div>
</div>

@push('scripts')
   {{-- chart.js --}}
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

   <script>
      // Dept Chart
      new Chart(document.getElementById('campusDeptChart').getContext('2d'), {
         type: 'pie',
         data: {
            labels: ['CAS', 'CBAA', 'CCS', 'COED', 'COE', 'CHAS'],
            datasets: [{
               label: ' # of Students',
               data: [10, 20, 30, 5, 9, 12, 9],
               backgroundColor: ['rgb(153, 0, 0)', 'rgb(255, 205, 86)', 'rgb(255, 128, 0)', 'rgb(0, 102, 204)', 'rgb(255, 102, 102)', 'rgb(0, 153, 0)'
               ],
               hoverOffset: 4
            }]
         },
      });

      // Status Chart
      var data = [@json($attendanceStatusData['IN']), @json($attendanceStatusData['OUT']), @json($attendanceStatusData['MISSED'])];
      
      if (data.reduce((a, b) => a + b, 0) === 0) {
         document.getElementById('noStatusData').style.display = 'block';
         document.getElementById('campusStatusChart').style.display = 'none';
      } else {
         document.getElementById('noStatusData').style.display = 'none';
         document.getElementById('campusStatusChart').style.display = 'block';
         new Chart(document.getElementById('campusStatusChart').getContext('2d'), {
            type: 'pie',
            data: {
               labels: ['IN', 'OUT', 'MISSED'],
               datasets: [{
                  label: ' # of Students',
                  data: data,
                  backgroundColor: ['orange', 'green', 'red'],
                  hoverOffset: 4
               }]
            },
         });
      }
   </script>
@endpush
