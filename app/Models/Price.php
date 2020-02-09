<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'prices';

    /**
     * Get role.
     */
    public function role()
    {
        return $this->belongsTo('App\Models\Role', 'role_id');
    }
}
