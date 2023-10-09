<?php

namespace App\Models;

use App\Models\FamilyMember;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_no', 
        'last_name', 
        'first_name', 
        'middle_name', 
        'sex', 
        'civil_status', 
        'nationality', 
        'birthdate', 
        'birthplace', 
        'address', 
        'phone', 
        'email', 
        'account_type'
    ];


    /**
     * Filtering search
     */
    public function scopeSearch($query, $value) {
        $query->where('student_no', 'like', "%{$value}%")
            ->orWhere('last_name', 'like', "%{$value}%")
            ->orWhere('first_name', 'like', "%{$value}%")
            ->orWhere('middle_name', 'like', "%{$value}%");
    }

    // public function admissions() : HasMany {
    //     return $this->hasMany(Admission::class);
    // }

    public function family_members() : BelongsToMany {
        return $this->belongsToMany(FamilyMember::class);
    }
}
