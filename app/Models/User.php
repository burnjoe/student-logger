<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\LogOptions;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes, LogsActivity;

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

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    /**
     * Activity logs option
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['email', 'status'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->useLogName('User')
            ->setDescriptionForEvent(function (string $eventName) {
                $attributes = $this->getDirty();
                $old = $this->getAttributes();

                switch ($eventName) {
                    case 'created':
                        return "Added New User: \"" . ($attributes['email']) . "\"";
                    case 'updated':
                        return "Updated User: \"" . ($old['email']) . "\"";
                    case 'deleted':
                        return "Archived User: \"" . ($old['email']) . "\"";
                    case 'restored':
                        return "Restored User: \"" . ($old['email']) . "\"";
                    case 'forceDeleted':
                        return "Deleted User Permanently: \"" . ($old['email']) . "\"";
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
        $query->where('email', 'like', "%{$value}%");
    }

    public function scopeStatusIn($query, $array)
    {
        $query->whereIn('status', $array);
    }

    public function scopeRoleIn($query, $array)
    {
        $query->whereHas(
            'roles',
            function ($query) use ($array) {
                $query->whereIn('id', $array);
            }
        );
    }

    /**
     * Relationships
     */
    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
