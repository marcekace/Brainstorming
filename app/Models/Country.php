<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use SoftDeletes;

    /**
     *@var string
    */
    protected $primaryKey = 'id';

    /**
     *@var bool
    */
    public $incrementing = true;

    /**
     *@var string
    */
    protected $table = 'countries';

    /**
     *@var string
    */
    protected $fillable = [
        'description',
    ];

    public function states(): HasMany
    {
        return $this->hasMany(State::class);
    }
}
