<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LikeComment extends Model
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
    protected $table = 'like_comments';

    /**
     * @var string
     */
    protected $fillable = [
        'user_id', // (FK)
        'comment_id', // (FK)
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments(): BelongsTo
    {
        return $this->belongsTo(Comment::class, 'comment_id');
    }

}
