<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'projects';

    /**
     * Get the owner.
     */
    public function client()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    /**
     * Get the files.
     */
    public function files()
    {
        return $this->hasMany('App\Models\ProjectFile');
    }

    /**
     * Get skills.
     */
    public function skills()
    {
        return $this->belongsToMany('App\Models\Skill', 'projects_skills', 'project_id', 'skill_id');
    }

    /**
     * Get the the categories.
     */
    public function categories()
    {
        return $this->belongsToMany('App\Models\Category', 'projects_categories', 'project_id', 'category_id');
    }
}
