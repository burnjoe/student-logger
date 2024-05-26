<div>
   <x-card class="flex items-center mb-4" padding="pl-6 sm:pl-16 md:pl-24 py-4" style="background-image: url('/img/ist_banner.png'); background-size: cover; background-position: top; height: 260px;">
      <img class="object-cover object-left h-16 sm:h-24 md:h-28 w-100"
                alt="iStudentTrack" src="{{ asset('img/ist_banner_content.png') }}">
   </x-card>

   <x-card>
      <span class="text-xl font-semibold">
         {{ 'Welcome, ' . Auth::user()->employee->first_name . ' ' . Auth::user()->employee->last_name . '!' }}
      </span>
   </x-card>

   <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
      <x-card>
         <p class="text-1rem font-semibold">
            Total Number of Students:
         </p>
         <p class="text-6xl text-veryDarkGray font-bold">
            {{ $totalStudents }}
         </p>
      </x-card>

      <x-card>
         <p class="text-1rem font-semibold">
            Live Student Population Count:
         </p>
         <p class="text-6xl text-veryDarkGray font-bold">
            {{ $liveCount }}
         </p>
      </x-card>
   </div>

   <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
      {{-- pie chart per department --}}
      <x-card>
         <div class="flex flex-col items-center">
            <span class="text-1rem font-semibold">Number of Students per College Department</span>
            @if($totalStudents > 0)
               <canvas id="campusDeptChart" class="my-4" style="max-width: 400px; max-height: 400px;"></canvas>
            @else
               <div class="flex justify-center py-6">
                  No records found.
               </div>
            @endif
         </div>
      </x-card>

      {{-- pie chart per status --}}
      <x-card>
         <div class="flex flex-col items-center">
            <span class="text-1rem font-semibold">Number of Students per Status (Today)</span>
            @if(array_sum($statusStudentCount['data']) > 0)
               <canvas id="campusStatusChart" class="my-4" style="max-width: 400px; max-height: 400px;"></canvas>
            @else
               <div class="flex justify-center py-6">
                  No records found.
               </div>
            @endif
         </div>
      </x-card>
   </div>
</div>

@push('scripts')
{{-- chart.js --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
   var colleges = @json($collegeStudentCount);
   var statuses = @json($statusStudentCount);

   // College Department Chart
   new Chart(document.getElementById('campusDeptChart').getContext('2d'), {
      type: 'pie',
      data: {
         labels: colleges.labels,
         datasets: [{
            label: ' # of Students',
            data: colleges.data,
            backgroundColor: [
               'rgb(153, 0, 0)', 
               'rgb(255, 205, 86)', 
               'rgb(255, 128, 0)', 
               'rgb(0, 102, 204)', 
               'rgb(255, 102, 102)', 
               'rgb(25,134,85)'
            ],
            hoverOffset: 4
         }]
      },
   });

   // Status Chart
   new Chart(document.getElementById('campusStatusChart').getContext('2d'), {
      type: 'pie',
      data: {
         labels: statuses.labels,
         datasets: [{
            label: ' # of Students',
            data: statuses.data,
            backgroundColor: ['rgb(250,99,65)', 'rgb(25,134,85)', 'rgb(244,55,92)'],
            hoverOffset: 4
         }]
      },
   });
</script>
@endpush