<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes;

    /**
     * @var string
     */
    protected $primaryKey='id';

    /**
     * @var bool
     */
    public $incrementing = true;

    /**
     * @var string
     */
    protected $table = 'payments';

    /**
     * @var string
     */
    protected $fillable=[
        'status',
        'merchant_order',
    ];

    public function subscriptions():HasMany
    {
        return $this->hasMany(Subscription::class, 'payment_id');
    }

    public function registrations():HasMany
    {
        return $this->hasMany(Registration::class, 'payment_id');
    }

}
