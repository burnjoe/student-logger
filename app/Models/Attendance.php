<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attendance extends Model
{
    use HasFactory, SoftDeletes;

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
}
