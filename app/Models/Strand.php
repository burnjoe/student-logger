<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Strand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];


    public function admissions() : MorphMany {
        return $this->morphMany(Admission::class, 'trackable');
    }
}
