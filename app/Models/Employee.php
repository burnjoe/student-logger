<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'last_name', 
        'first_name',
        'middle_name', 
        'sex', 
        'birthdate', 
        'address', 
        'phone'
    ];


    public function user() : MorphOne {
        return $this->morphOne(User::class, 'profileable');
    }
}
