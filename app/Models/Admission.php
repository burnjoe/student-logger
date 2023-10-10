<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admission extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['student_id', 'trackable_id', 'trackable_type', 'level', 'enrolled_at'];


    // public function student() : BelongsTo {
    //     return $this->belongsTo(Student::class);
    // }

    public function trackable(): MorphTo {
        return $this->morphTo(); 
    }
}
