<?php

namespace App\Livewire;

use App\Models\Card;
use Livewire\Component;
use App\Models\Attendance;
use Carbon\Carbon;
use Livewire\Attributes\On;
use Livewire\Attributes\Layout;

class AttendanceLogger extends Component
{
    public $rfid;
    public $full_name;
    public $program;
    public $profile_photo;
    public $enrolled;
    public $expires_at;

    public $card;
    public $attendance;


    /**
     * Render livewire view
     */
    #[Layout('layouts.logger')]
    public function render()
    {
        return view('livewire.attendance-logger', [
            'liveCount' => Attendance::where('status', 'IN')
                ->where(\DB::raw('DATE(updated_at)'), Carbon::today())
                ->count()
        ]);
    }

    /**
     * Logs attendance of student
     */
    #[On('log')]
    public function log($rfid)
    {
        try {
            // Retrieves card of rfid (OPTIMIZE THIS)
            $this->card = Card::with(['student', 'attendances', 'attendances.post'])->whereEncrypted('rfid', $rfid)->first();
            $this->rfid = $rfid;

            // Retrieves last log (OPTIMIZE THIS)
            $this->attendance = $this->card->attendances->sortByDesc('updated_at')->first();

            // Log attendance throttle
            if ($this->attendance) {
                if ($duration = now()->diff($this->attendance->updated_at)) {
                    // Last log is < 30s
                    if ($duration->i == 0 && $duration->s < 5) {
                        $this->dispatch('warning', ['message' => 'Please try again later. ' . (5 - $duration->s) . ' second(s) remaining.']);
                        return;
                    }
                }
            }

            // Check if there's a latest attendance
            if ($this->attendance) {
                // Check the status prior logging
                switch ($this->attendance->status) {
                    case 'IN':
                        // When forgot to logout yesterday: Mark last log as MISSED
                        if (!now()->isSameDay($this->attendance->logged_in_at)) {
                            // Mark last log as MISSED
                            $this->attendance->update([
                                'status' => 'MISSED',
                            ]);

                            $this->login();
                        } else {
                            $this->logout();
                        }
                        break;
                    case 'OUT':
                    case 'MISSED':
                        $this->login();
                        break;
                    default:
                        $this->dispatch('warning', ['message' => 'Something unexpected has happened. Please try again.']);
                }
            } else {
                $this->login();
            }

            $this->full_name = strtoupper($this->card->student->last_name . ', ' .
                $this->card->student->first_name . ' ' .
                ($this->card->student->middle_name ?
                    substr($this->card->student->middle_name, 0, 1) . '.' : ''));
            $this->profile_photo = $this->card->profile_photo;
            $this->program = 'BSCS';
            $this->enrolled = 'ENROLLED';
        } catch (\Throwable $th) {
            $this->dispatch('error', ['message' => 'Invalid ID.']);
        }
    }

    /**
     * Log in attendance
     */
    private function login()
    {
        $this->attendance = Attendance::create([
            'card_id' => $this->card->id,
            'logged_in_at' => now(),
            'status' => 'IN',
            'post_id' => 1,
        ]);

        $this->dispatch('success', ['message' => 'Successfully logged in.']);
    }

    /**
     * Log out attendance
     */
    private function logout()
    {
        $this->attendance->update([
            'logged_out_at' => now(),
            'status' => 'OUT',
        ]);

        $this->dispatch('success', ['message' => 'Successfully logged out']);
    }

    /**
     * Mark remaining logs of IN status with MISSED
     */
    private function markAllMissed()
    {
        $this->attendance->update([
            'status' => 'MISSED',
        ]);

        $this->dispatch('success', ['message' => 'Successfully marked all as missed']);
    }
}
