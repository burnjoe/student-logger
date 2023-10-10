<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 
        'college_id'
    ];


    public function college() : BelongsTo {
        return $this->belongsTo(College::class);
    }

    public function admissions() : MorphMany {
        return $this->morphMany(Admission::class, 'trackable');
    }
}
