<?php

namespace App\Models;

use ESolution\DBEncryption\Traits\EncryptedAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Card extends Model
{
    use HasFactory, SoftDeletes, LogsActivity, EncryptedAttribute;

    /**
     * Events only recorded in activity log
     */
    protected static $recordEvents = [
        'created',
        'updated',
        'deleted',
        'restored',
        'forceDeleted',
    ];

    protected $fillable = [
        'rfid',
        'profile_photo',
        'issuance_reason',
        'expires_at',
        'student_id',
        'status',
        'contact_person_id',
    ];

    protected $encryptable = [
        'rfid',
        'profile_photo',
    ];

    /**
     * Activity logs option
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['rfid', 'issuance_reason', 'expires_at', 'status'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->useLogName('Card')
            ->setDescriptionForEvent(function (string $eventName) {
                switch ($eventName) {
                    case 'created':
                        return "Issued New RFID to Student: \"" . ($this->student->first_name . ' ' . $this->student->last_name) . "\"";
                    case 'updated':
                        return "Updated RFID of Student: \"" . ($this->student->first_name . ' ' . $this->student->last_name) . "\"";
                    case 'deleted':
                        return "Archived RFID Record of Student: \"" . ($this->student->first_name . ' ' . $this->student->last_name) . "\"";
                    case 'restored':
                        return "Restored RFID Record of Student: \"" . ($this->student->first_name . ' ' . $this->student->last_name) . "\"";
                    case 'forceDeleted':
                        return "Deleted RFID Record Permanently of Student: \"" . ($this->student->first_name . ' ' . $this->student->last_name) . "\"";
                    default:
                        break;
                }
            });
    }

    /**
     * Filtering search
     */
    public function scopeSearch($query, $value)
    {
        $query->whereEncrypted('rfid', 'like', "%{$value}%");
    }

    /**
     * Relationships
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }

    public function contact_person(): HasOne {
        return $this->hasOne(FamilyMember::class, 'id', 'contact_person_id');
    }
}
