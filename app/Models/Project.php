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
     * Get skills.
     */
    public function skill()
    {
        return $this->belongsTo('App\Models\Skill', 'skill_id');
    }

    /**
     * Get the the categories.
     */
    public function categories()
    {
        return $this->belongsToMany('App\Models\Category', 'projects_categories', 'project_id', 'category_id');
    }

    /**
     * Get the the bookmarked by.
     */
    public function bookmarked()
    {
        return $this->belongsToMany('App\Models\Project', 'crews_bookmarks', 'project_id', 'crew_id');
    }
}
