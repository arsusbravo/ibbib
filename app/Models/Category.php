<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * Get Crews with category.
     */
    public function crews()
    {
        return $this->belongsToMany('App\Models\Crew', 'crews_categories', 'category_id', 'crew_id');
    }

    /**
     * Get Crews with category.
     */
    public function projects()
    {
        return $this->belongsToMany('App\Models\Project', 'projects_categories', 'category_id', 'project_id');
    }
}
