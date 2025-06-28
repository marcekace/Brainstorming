<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserPermission extends Model
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
    protected $table = 'user_permissions';

    /**
    * @var string
    */
    protected $fillable = [
        'user_id', // (FK)
        'permission_id', // (FK)
    ];

    public function users():BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function permissions():BelongsTo
    {
        return $this->belongsTo(Permission::class, 'permission_id');
    }
}
