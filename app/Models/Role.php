<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'roles';

    /**
     * Get the users of the role.
     */
    public function users()
    {
        return $this->hasMany('App\Models\User');
    }

    /**
     * Get tarif.
     */
    public function tarif()
    {
        return $this->hasMany('App\Models\Price', 'role_id');
    }
}
