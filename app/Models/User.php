<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the user role.
     */
    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

    /**
     * Get the user crew.
     */
    public function crew()
    {
        return $this->hasOne('App\Models\Crew', 'user_id');
    }

    /**
     * Get the user client.
     */
    public function client()
    {
        return $this->hasOne('App\Models\Customer', 'user_id');
    }

    /**
     * Get the user sent messages.
     */
    public function sentMsg()
    {
        return $this->hasMany('App\Models\Message', 'from_id');
    }

    /**
     * Get the user received messages.
     */
    public function receivedMsg()
    {
        return $this->hasMany('App\Models\Message', 'to_id');
    }
}
