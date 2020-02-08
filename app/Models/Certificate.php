<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'certificates';

    /**
     * Get the the crews.
     */
    public function crew()
    {
        return $this->belongsTo('App\Models\Crew', 'crew_id');
    }

    /**
     * Get the translated language from.
     */
    public function transFrom()
    {
        return $this->belongsTo('App\Models\Language', 'language_from');
    }

    /**
     * Get the translated language from.
     */
    public function transTo()
    {
        return $this->belongsTo('App\Models\Language', 'language_to');
    }
}
