<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'languages';

    /**
     * language translated from.
     */
    public function translatedFrom()
    {
        return $this->hasMany('App\Models\LanguageSkill', 'from');
    }

    /**
     * language translated to.
     */
    public function translatedTo()
    {
        return $this->hasMany('App\Models\LanguageSkill', 'to');
    }
}
