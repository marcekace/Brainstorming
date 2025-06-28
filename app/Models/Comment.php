<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
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
    protected $table = 'comments';

    /**
     * @var string
     */
    protected $fillable = [
        'user_id',//(FK)
        'event_id',//(FK)
        'description', // Comment
    ];


    public function users():BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function events():BelongsTo
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    public function likesComments():HasMany
    {
        return $this->hasMany(LikeComment::class, 'comment_id');
    }


}
