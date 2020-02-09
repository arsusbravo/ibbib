<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'customers';

    /**
     * Get the user.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Get projects.
     */
    public function projects()
    {
        return $this->hasMany('App\Models\Projects');
    }

    /**
     * Get country.
     */
    public function location()
    {
        return $this->belongsTo('App\Models\Country', 'country_id');
    }
}
