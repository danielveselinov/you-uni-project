<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inbox extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'to_user_id',
        'message',
        'scheduled_at',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function messages(): BelongsTo
    {
        return $this->belongsTo(User::class, 'to_user_id');
    }
}
