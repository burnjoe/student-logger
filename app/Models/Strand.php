<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Strand extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name'
    ];


    /**
     * Filtering search
     */
    public function scopeSearch($query, $value)
    {
        $query->where('name', 'like', "%{$value}%");
    }

    /**
     * Relationships
     */
    public function admissions(): MorphMany
    {
        return $this->morphMany(Admission::class, 'trackable');
    }
}
