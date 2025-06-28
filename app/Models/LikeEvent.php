<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LikeEvent extends Model
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
    protected $table = 'like_events';

    /**
     * @var string
     */
    protected $fillable = [
        'user_id', // (FK)
        'event_id', // (FK)
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function events(): BelongsTo
    {
        return $this->belongsTo(Event::class, 'event_id');
    }


}
