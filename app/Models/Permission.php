<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
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
    protected $table = 'permissions';

    /**
     * @var string
     */
    protected $fillable = [
        'description',//name of permission
    ];

    public function userPermissions():HasMany
    {
        return $this->hasMany(UserPermission::class, 'permission_id');
    }
}
