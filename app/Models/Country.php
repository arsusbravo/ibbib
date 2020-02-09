<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'countries';

    /**
     * Get the the crews.
     */
    public function crew()
    {
        return $this->hasMany('App\Models\Crew', 'country_id');
    }

    /**
     * Get the the clients.
     */
    public function clients()
    {
        return $this->hasMany('App\Models\Customer', 'country_id');
    }

    /**
     * Get the the language.
     */
    public function language()
    {
        return $this->hasOne('App\Models\Language', 'country_id');
    }
}
