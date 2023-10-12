<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'logged_in_at',
        'logged_out_at',
        'comment',
    ];

    public function student() : BelongsTo {
        return $this->belongsTo(Student::class);
    }
}
