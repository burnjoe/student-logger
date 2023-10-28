<?php

namespace App\Livewire;

use App\Models\Card;
use Livewire\Component;
use App\Models\Attendance;
use Livewire\Attributes\On;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\View;

class AttendanceLogger extends Component
{
    public $rfid;
    public $profile_photo;
    public $signature;
    public $expires_at;

    public $card;
    public $attendance;


    /**
     * Render livewire view
     */
    #[Layout('layouts.logger')]
    public function render()
    {
        return view('livewire.attendance-logger');
    }

    /**
     * Log the attendance of student
     */
    #[On('log')]
    public function log($rfid)
    {
        try {
            // retrieves card with the given rfid
            $this->card = Card::with(['student', 'attendances', 'attendances.post'])->where('rfid', $rfid)->first();
            $this->rfid = $rfid;

            // retrieves last attendance of card owner
            $this->attendance = $this->card->attendances->sortByDesc('updated_at')->first();

            // if there is last attendance compute
            if ($duration = now()->diff($this->attendance->updated_at)) {
                // Checks if last update timestamp < 30 secs, if not
                if ($duration->i == 0 && $duration->s < 30) {
                    session()->flash('warning', 'Please wait ' . (30 - $duration->s) . ' second(s).');
                    // display an error
                    return;
                }
            }

            // Check if there's a latest attendance
            if ($this->attendance) {
                // Check the status prior logging
                switch ($this->attendance->status) {
                    case 'IN':
                        // if logged in different day, mark latest attendance as missing
                        if (!now()->isSameDay($this->attendance->logged_in_at)) {
                            // Record missing
                            $this->attendance->update([
                                'status' => 'MISSED',
                            ]);
                            
                            // Record log in
                            $this->attendance = Attendance::create([
                                'card_id' => $this->card->id,
                                'logged_in_at' => now(),
                                'status' => 'IN',
                                'post_id' => 1,                 // Change this to actual post id
                            ]);
                        } else {
                            // Record log out
                            $this->attendance->update([
                                'logged_out_at' => now(),
                                'status' => 'OUT',
                            ]);
                        }
                        break;
                    case 'OUT':
                    case 'MISSED':
                        // Record log in
                        $this->attendance = Attendance::create([
                            'card_id' => $this->card->id,
                            'logged_in_at' => now(),
                            'status' => 'IN',
                            'post_id' => 1,                     // Change this to actual post id
                        ]);
                        break;
                    default:
                        // Throw error to view to say that something unexpected have happened
                        break;
                }
            } else {
                $this->attendance = Attendance::create([
                    'card_id' => $this->card->id,
                    'logged_in_at' => now(),
                    'status' => 'IN',
                    'post_id' => 1,                             // Change this to actual post id
                ]);
            }
        } catch (\Throwable $th) {
            // error here
        }
    }
}
