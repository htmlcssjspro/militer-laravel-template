<?php

namespace App\Models;

use App\Contracts\User as ContractsUser;
use App\Services\Wot\WotApiService;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements ContractsUser
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nickname',
        'account_id',
        'access_token',
        'expires_at',

        'name', 'first_name', 'last_name',
        'email',
        'active', 'banned',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'active' => true,
        'banned' => false,
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'active' => 'boolean',
        'banned' => 'boolean',
        'email_verified_at' => 'datetime',
        'expires_at' => 'datetime',
    ];


    public function balance()
    {
        return $this->hasOne(Balance::class, 'user_nickname', 'nickname');
    }

    public function stats()
    {
        return $this->hasOne(Stats::class, 'user_nickname', 'nickname');
    }

    public function battles()
    {
        return $this->belongsToMany(Battle::class)->withPivot(
            'status',
            'tank_id',
            'stats_start',
            'stats_end',
            'start_at',
            'completed_at',
            'position',
            'prize'
        );
    }

    /**
     * Get all sessions of events
     */
    public function sessions()
    {
        return $this->hasMany(Session::class);
    }

    /**
     * Get all Events through Session
     */
    public function events()
    {
        return $this->hasMany(Event::class);

        // return $this->hasManyThrough(
        //     Event::class,
        //     Session::class,
        //     'user_id',
        //     'session_uuid',
        //     'id',
        //     'uuid',
        // );
    }


    // public function garage()
    // {
    //     $api = new WotApiService();
    //     $garage = $api->getGarage($this);
    //     return $garage;
    // }


    public function isAdmin()
    {
        return false;
    }
}
