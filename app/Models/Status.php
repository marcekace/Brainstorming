<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Status extends Model
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
    protected $table = 'status';

    /**
     * @var string
     */
    protected $fillable = [
        'description',
    ];

    public function subscriptions():HasMany
    {
        return $this->hasMany(Subscription::class, 'status_id');
    }

    public function registrations():HasMany
    {
        return $this->hasMany(Registration::class, 'status_id');
    }
}
