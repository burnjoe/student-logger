<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['student_no', 'last_name', 'first_name', 'middle_name', 'sex', 'civil_status', 'nationality', 'birthdate', 'birthplace', 'address', 'phone', 'email', 'account_type', 'program_id'];

    // Filtering Search
    public function scopeSearch($query, $value) {
        $query->where('student_no', 'like', "%{$value}%")
            ->orWhere('last_name', 'like', "%{$value}%")
            ->orWhere('first_name', 'like', "%{$value}%")
            ->orWhere('middle_name', 'like', "%{$value}%");
    }
}
