<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use SoftDeletes;
    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var bool
     */
    public $incrementing = true;

    /**
     * @var string
     */
    protected $table = 'events';

    /**
     * @var string
     */
    protected $fillable = [
        'user_id',//(FK)
        'title',
        'description',
        'date_time',
        'location',
        'capacity',
        'category_id',//(FK)
    ];

    public function users(): belongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function category(): belongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function likesEvents(): HasMany
    {
        return $this->hasMany(LikeEvent::class, 'event_id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'event_id');
    }

    public function registrations(): HasMany
    {
        return $this->hasMany(Registration::class, 'event_id');
    }

}
