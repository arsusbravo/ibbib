<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'messages';

    /**
     * Get the user who sent.
     */
    public function sender()
    {
        return $this->belongsTo('App\Models\User', 'from_id');
    }

    /**
     * Get the user who received.
     */
    public function receiver()
    {
        return $this->belongsTo('App\Models\User', 'to_id');
    }
}
