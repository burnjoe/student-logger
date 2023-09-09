<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['student_no', 'last_name', 'first_name', 'middle_name', 'sex', 'civil_status', 'nationality', 'birthdate', 'birthplace', 'address', 'phone', 'email', 'account_type', 'program_id'];

    public function scopeSearch($query, $value) {
        $query->where('student_no', 'like', "%{$value}%");
    }
}
