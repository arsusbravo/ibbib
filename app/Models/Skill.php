<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'skills';

    /**
     * Get the crews with the skills.
     */
    public function crews()
    {
        return $this->belongsToMany('App\Models\Crew', 'crews_skills', 'skill_id', 'crew_id');
    }

    /**
     * Get projects with skills.
     */
    public function projects()
    {
        return $this->belongsToMany('App\Models\Project', 'projects_skills', 'skill_id', 'project_id');
    }

    /**
     * Get language skill.
     */
    public function languageSkill()
    {
        return $this->belongsTo('App\Models\LanguageSkill', 'language_skill_id');
    }
}
