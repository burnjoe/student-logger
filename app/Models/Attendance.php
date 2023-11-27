<?php

namespace App\Models;

use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Database\Eloquent\BroadcastsEvents;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attendance extends Model
{
    use HasFactory, SoftDeletes, BroadcastsEvents;

    protected $fillable = [
        'card_id',
        'logged_in_at',
        'logged_out_at',
        'status',
        'post_id',
    ];

    /**
     * Filtering search
     */
    public function scopeStatusIn($query, $array)
    {
        $query->whereIn('status', $array);
    }

    /**
     * Relationships
     */
    public function card(): BelongsTo
    {
        return $this->belongsTo(Card::class);
    }

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    /**
     * Get the channels that model events should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel|\Illuminate\Database\Eloquent\Model>
     */
    public function broadCastOn(string $event): array
    {
        return match ($event) {
            'created' => [new PrivateChannel('private-attendance.created')],
            'updated' => [new PrivateChannel('private-attendance.updated')],
            'deleted' => [new PrivateChannel('private-attendance.deleted')],
            default => [],
        };
    }

    public function broadcastWith(string $event)
    {
        return match ($event) {
            'created' => [$this],
            'updated' => [$this],
            default => []
        };
    }
}
