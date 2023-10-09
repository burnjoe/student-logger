<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class FamilyMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'last_name', 
        'first_name', 
        'middle_name', 
        'relationship', 
        'occupation', 
        'phone'
    ];


    public function user() : MorphOne {
        return $this->morphOne(User::class, 'profileable');
    }

    public function students() : BelongsToMany {
        return $this->belongsToMany(Student::class);
    }
}
