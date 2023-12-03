<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Card extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

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
        'signature',
        'expires_at',
    ];


    /**
     * Activity logs option
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable()
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->useLogName('Card')
            ->setDescriptionForEvent(function (string $eventName) {
                $attributes = $this->getDirty();
                $old = $this->getAttributes();

                switch ($eventName) {
                    case 'created':
                        return "Added New Card: \"" . ($attributes['rfid'] . ' ' . $attributes['rfid']) . "\"";
                    case 'updated':
                        return "Updated Card: \"" . ($old['rfid'] . ' ' . $old['rfid']) . "\"";
                    case 'deleted':
                        return "Archived Card: \"" . ($old['rfid'] . ' ' . $old['rfid']) . "\"";
                    case 'restored':
                        return "Restored Card: \"" . ($old['rfid'] . ' ' . $old['rfid']) . "\"";
                    case 'forceDeleted':
                        return "Deleted Card Permanently: \"" . ($old['rfid'] . ' ' . $old['rfid']) . "\"";
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
        $query->where('rfid', 'like', "%{$value}%");
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
}
