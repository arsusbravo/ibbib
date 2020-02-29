<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'contents';

    /**
     * Get Crews with category.
     */
    public function language()
    {
        return $this->belongsTo('App\Models\Language', 'language_id');
    }
}
