<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\College;
use Livewire\Component;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class Reports extends Component
{
    use WithPagination;

    public $search = "";
    public $selectedStatuses = [];
    public $selectMonthYearMainGate = null;
    public $selectMonthYearLibrary = null;
    public $selectMonthYearClinic = null;
    
    // Display default value
    public function mount()
    {
        $this->selectMonthYearMainGate = now()->format('Y-m');
        $this->selectMonthYearLibrary = now()->format('Y-m');
        $this->selectMonthYearClinic = now()->format('Y-m');
    }

    protected $rules = [
        'selectMonthYearMainGate' => ['required', 'date_format:Y-m'],
        'selectMonthYearLibrary' => ['required', 'date_format:Y-m'],
        'selectMonthYearClinic' => ['required', 'date_format:Y-m'],
    ];

    public function render(Request $request)
    {
        View::share('page', 'reports');
        
        // $colleges = ['CAS', 'CBAA', 'CCS', 'COED', 'COE', 'CHAS'];
        // $studentData = [];

        // foreach ($colleges as $college) {
        //     $count = Attendance::whereHas('card.student', function ($query) use ($college) {
        //         $query->where('college_id', $college);
        //     })->where('post_id', 1)->count();
        //     array_push($studentData, $count);
        // }
        
        // Status Chart for Main Gate of Campus
        $statusCounts = Attendance::select('status', DB::raw('count(*) as total'))
            ->where('post_id', 1)
            ->when(
                $this->selectMonthYearMainGate,
                function ($query) {
                    $selectedDate = Carbon::parse($this->selectMonthYearMainGate);
                    $endDate = $selectedDate->isSameMonth(Carbon::now()) ? Carbon::now() : $selectedDate->copy()->endOfMonth();
                    
                    return $query->whereBetween(
                        'logged_in_at',
                        [
                            $selectedDate->startOfMonth(),
                            $endDate
                        ]
                    );
                }
            )
            ->groupBy('status')
            ->get()
            ->pluck('total', 'status');
 

            
        // Table for Main Gate of Campus
        $mainGateAttendances = Attendance::select('id', 'logged_in_at', 'logged_out_at', 'status', 'card_id', 'post_id')
            ->with([
                'card' => fn ($query) => $query->select('id', 'profile_photo', 'student_id'),
                'post' => fn ($query) => $query->select('id', 'name'),
                'card.student' => fn ($query) => $query->select('id', 'student_no', 'last_name', 'first_name'),
            ])
            ->where('post_id', 1)
            ->when(
                $this->selectedStatuses,
                fn ($query) =>
                $query->statusIn($this->selectedStatuses)
            )
            ->when(
                $this->selectMonthYearMainGate,
                function ($query) {
                    $selectedDate = Carbon::parse($this->selectMonthYearMainGate);
                    $endDate = $selectedDate->isSameMonth(Carbon::now()) ? Carbon::now() : $selectedDate->copy()->endOfMonth();
                    
                    return $query->whereBetween(
                        'logged_in_at',
                        [
                            $selectedDate->startOfMonth(),
                            $endDate
                        ]
                    );
                }
            )
            ->orderBy('updated_at', 'desc')
            ->paginate(15);

    
        
        $libraryVisitCounts = Attendance::select('card_id', DB::raw('count(*) as total'))
            ->where('post_id', 2)
            ->when(
                $this->selectMonthYearLibrary,
                function ($query) {
                    $selectedDate = Carbon::parse($this->selectMonthYearLibrary);
                    $endDate = $selectedDate->isSameMonth(Carbon::now()) ? Carbon::now() : $selectedDate->copy()->endOfMonth();
                    
                    return $query->whereBetween(
                        'updated_at',
                        [
                            $selectedDate->startOfMonth(),
                            $endDate
                        ]
                    );
                }
            )
            ->groupBy('card_id')
            ->orderBy('total', 'desc')
            ->take(5)
            ->get()
            ->pluck('total', 'card_id');

        $libraryAttendances = Attendance::select('card_id', DB::raw('count(*) as total'))
            ->with([
                'card' => fn ($query) => $query->select('id', 'profile_photo', 'student_id'),
                'post' => fn ($query) => $query->select('id', 'name'),
                'card.student' => fn ($query) => $query->select('id', 'last_name', 'first_name'),
            ])
            ->whereIn('card_id', array_keys($libraryVisitCounts->toArray()))
            ->where('post_id', 2)
            ->when(
                $this->selectMonthYearLibrary,
                function ($query) {
                    $selectedDate = Carbon::parse($this->selectMonthYearLibrary);
                    $endDate = $selectedDate->isSameMonth(Carbon::now()) ? Carbon::now() : $selectedDate->copy()->endOfMonth();
                    
                    return $query->whereBetween(
                        'updated_at',
                        [
                            $selectedDate->startOfMonth(),
                            $endDate
                        ]
                    );
                }
            )
            ->groupBy('card_id')
            ->orderBy('total', 'desc')
            ->take(5)
            ->get();

            
        
        $clinicVisitCounts = Attendance::select('card_id', DB::raw('count(*) as total'))
            ->where('post_id', 3)
            ->when(
                $this->selectMonthYearClinic,
                function ($query) {
                    $selectedDate = Carbon::parse($this->selectMonthYearClinic);
                    $endDate = $selectedDate->isSameMonth(Carbon::now()) ? Carbon::now() : $selectedDate->copy()->endOfMonth();
                    
                    return $query->whereBetween(
                        'updated_at',
                        [
                            $selectedDate->startOfMonth(),
                            $endDate
                        ]
                    );
                }
            )
            ->groupBy('card_id')
            ->orderBy('total', 'desc')
            ->take(5)
            ->get()
            ->pluck('total', 'card_id');
            
        $clinicAttendances = Attendance::select('card_id', DB::raw('count(*) as total'))
            ->with([
                'card' => fn ($query) => $query->select('id', 'profile_photo', 'student_id'),
                'post' => fn ($query) => $query->select('id', 'name'),
                'card.student' => fn ($query) => $query->select('id', 'last_name', 'first_name'),
            ])
            ->whereIn('card_id', array_keys($clinicVisitCounts->toArray()))
            ->where('post_id', 3)
            ->when(
                $this->selectMonthYearClinic,
                function ($query) {
                    $selectedDate = Carbon::parse($this->selectMonthYearClinic);
                    $endDate = $selectedDate->isSameMonth(Carbon::now()) ? Carbon::now() : $selectedDate->copy()->endOfMonth();
            
                    return $query->whereBetween(
                        'updated_at',
                        [
                            $selectedDate->startOfMonth(),
                            $endDate
                        ]
                    );
                }
            )
            ->groupBy('card_id')
            ->orderBy('total', 'desc')
            ->take(5)
            ->get();
        
            
        $posts = Post::all();

        return view('livewire.reports', [
            'statusCounts' => $statusCounts,
            'mainGateAttendances' => $mainGateAttendances,
            'libraryAttendances' => $libraryAttendances,
            'libraryVisitCounts' => $libraryVisitCounts,
            'clinicAttendances' => $clinicAttendances,
            'clinicVisitCounts' => $clinicVisitCounts,
            'posts' => $posts,
        ]);
    }
}