<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Admission extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'student_id',
        'program_id',
        'level',
        'enrolled_at'
    ];


    /**
     * Filtering search
     */
    public function scopeSearch($query, $value)
    {
        $query->where('level', 'like', "%{$value}%")
            ->orWhere('enrolled_at', 'like', "%{$value}%");
    }

    public function scopeLatestForStudents($query)
    {
        return $query->whereIn('id', function($query) {
            $query->select(DB::raw('MAX(id)'))
                  ->from('admissions')
                  ->groupBy('student_id');
        });
    }

    /**
     * Relationships
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class);
    }
}
