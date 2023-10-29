<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class College extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
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
    public function programs(): HasMany
    {
        return $this->hasMany(Program::class);
    }
}
