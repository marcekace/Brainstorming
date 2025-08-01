<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class State extends Model
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
    protected $table = 'states';

    /**
     * @var string
     */
    protected $fillable = [
        'description',
        'country_id'
    ];

    public function users(): hasMany
    {
        return $this->hasMany(User::class);
    }
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
}
