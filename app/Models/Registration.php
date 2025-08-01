<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Registration extends Model
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
    protected $table = 'registrations';


    /**
     * @var string
     */
    protected $fillable = [
        'user_id', // (FK)
        'event_id', // (FK)
        'payment_id', // (FK)
        'status_id', // (FK)
    ];

    public function users():BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function events():BelongsTo
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    public function payments():BelongsTo
    {
        return $this->belongsTo(Payment::class, 'payment_id');
    }

    public function status():BelongsTo
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
