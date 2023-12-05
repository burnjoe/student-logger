<div>
   <x-card>
      {{ 'Welcome, ' . Auth::user()->employee->first_name . ' ' . Auth::user()->employee->last_name . '!' }}
   </x-card>

   <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
      <x-card>
         Total Number Students
      </x-card>

      {{-- pie chart per department --}}
      <x-card>
         <div class=" flex flex-col items-center">
            <span class="text-1rem font-bold">Number of Students per Dept.</span>
            <canvas id="campusChart" style="max-width: 400px; max-height: 400px;"></canvas>
         </div>
      </x-card>
   </div>
</div>

@push('scripts')
   {{-- chart.js --}}
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

   <script>
      var ctx = document.getElementById('campusChart').getContext('2d');
      var myChart = new Chart(ctx, {
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
         },
      });
   </script>
@endpush
