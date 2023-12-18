<?php

namespace App\Models;

use ESolution\DBEncryption\Traits\EncryptedAttribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class FamilyMember extends Model
{
    use HasFactory, SoftDeletes, EncryptedAttribute;

    protected $fillable = [
        'last_name',
        'first_name',
        'relationship',
        'specified_relationship',
        'occupation',
        'phone'
    ];

    protected $encryptable = [
        'last_name',
        'first_name',
        'phone',
    ];


    /**
     * Filtering search
     */
    public function scopeSearch($query, $value)
    {
        $query->whereEncrypted('last_name', 'like', "%{$value}%")
            ->orWhereEncrypted('first_name', 'like', "%{$value}%")
            ->orWhereEncrypted('middle_name', 'like', "%{$value}%")
            ->orWhereEncrypted('relationship', 'like', "%{$value}%")
            ->orWhereEncrypted('phone', 'like', "%{$value}%");
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
