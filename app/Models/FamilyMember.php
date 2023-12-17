<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class FamilyMember extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'last_name',
        'first_name',
        'relationship',
        'specified_relationship',
        'occupation',
        'phone'
    ];


    /**
     * Filtering search
     */
    public function scopeSearch($query, $value)
    {
        $query->where('last_name', 'like', "%{$value}%")
            ->orWhere('first_name', 'like', "%{$value}%")
            ->orWhere('middle_name', 'like', "%{$value}%")
            ->orWhere('relationship', 'like', "%{$value}%")
            ->orWhere('phone', 'like', "%{$value}%");
    }

    /**
     * Relationships
     */
    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class);
    }

    public function card(): BelongsToMany
    {
        return $this->belongsToMany(Card::class);
    }
}
