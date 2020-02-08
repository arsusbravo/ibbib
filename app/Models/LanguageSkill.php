<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LanguageSkill extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'language_skills';

    /**
     * language translated from.
     */
    public function translateFrom()
    {
        return $this->belongsTo('App\Models\Language', 'from');
    }

    /**
     * language translated to.
     */
    public function translateTo()
    {
        return $this->belongsTo('App\Models\Language', 'to');
    }

    /**
     * language skills.
     */
    public function skills()
    {
        return $this->hasOne('App\Models\Skill', 'language_skill_id');
    }
}
