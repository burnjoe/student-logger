<div>
    <x-card>
        {{ 'Welcome, ' . Auth::user()->employee->first_name . ' ' . Auth::user()->employee->last_name . '!' }}
    </x-card>

    <div class="grid grid-cols-2 gap-4 mt-4">
        {{-- pie chart per department --}}
        <x-card>
            <div class=" flex flex-col items-center">
                <span class="text-1rem font-bold">Number of Students per Dept.</span>
                <canvas id="campusChart" style="max-width: 400px; max-height: 400px;"></canvas>
            </div>
        </x-card>

        <x-card>
            Total Number Students
        </x-card>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('campusChart');

      new Chart(ctx, {
         type: 'pie',
         data: {
            labels: [
               'CAS',
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
            }]
         },
         responsive: true
      });
</script>
@endpush