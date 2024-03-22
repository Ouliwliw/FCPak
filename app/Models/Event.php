<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'start', 'end', 'title', 'description', 'is_all_day', 'user_id', 'background_color'
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'event_user');
    }
}
