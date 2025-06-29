<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, SoftDeletes, HasApiTokens;
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'state_id',
        'role_id',
    ];

    protected $attributes = [
        "role_id" => 3,
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function state():belongsTo{
        return $this->belongsTo(State::class,'state_id');
    }

    public function role():belongsTo{
        return $this->belongsTo(Role::class,'role_id');
    }

    public function events(): HasMany
    {
        return $this->hasMany(Event::class, 'user_id');
    }

    public function likesEvents(): HasMany
    {
        return $this->hasMany(LikeEvent::class, 'user_id');
    }

    public function comments():HasMany
    {
        return $this->hasMany(Comment::class, 'user_id');
    }

    public function likesComments(): HasMany
    {
        return $this->hasMany(LikeComment::class, 'user_id');
    }

    public function userPermissions(): HasMany
    {
        return $this->hasMany(UserPermission::class, 'user_id');
    }

    public function subscriptions(): HasMany
    {
        return $this->hasMany(Subscription::class, 'user_id');
    }

    public function registrations(): HasMany
    {
        return $this->hasMany(Registration::class, 'user_id');
    }

}
