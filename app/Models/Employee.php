<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'last_name',
        'first_name',
        'middle_name',
        'sex',
        'birthdate',
        'address',
        'phone',
    ];


    /**
     * Filtering search
     */
    public function scopeSearch($query, $value)
    {
        $subvalue = substr($value, 1);

        $query->where('last_name', 'like', "%{$value}%")
            ->orWhere('first_name', 'like', "%{$value}%")
            ->orWhere('middle_name', 'like', "%{$value}%")
            ->orWhere('sex', 'like', "%{$value}%")
            ->orWhere('phone', 'like', "%{$value}%")
            ->orWhere('phone', 'like', "%{$subvalue}%");
    }

    /**
     * Relationships
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
}
