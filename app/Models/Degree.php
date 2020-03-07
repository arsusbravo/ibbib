<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'degrees';

    /**
     * Get the user.
     */
    public function certificates()
    {
        return $this->hasMany('App\Models\Certificate');
    }
}
