<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Crew extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'crews';

    /**
     * Get user.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Get country.
     */
    public function location()
    {
        return $this->belongsTo('App\Models\Country', 'country_id');
    }

    /**
     * Get the the skills.
     */
    /* public function skills()
    {
        return $this->belongsToMany('App\Models\Skill', 'crews_skills', 'crew_id', 'skill_id')->withPivot('level');
    } */

    /**
     * Get the the certificates.
     */
    public function certificates()
    {
        return $this->hasMany('App\Models\Certificate', 'crew_id');
    }

    /**
     * Get the the categories.
     */
    public function categories()
    {
        return $this->belongsToMany('App\Models\Category', 'crews_categories', 'crew_id', 'category_id');
    }

    /**
     * Get the the bookmarked by.
     */
    public function bookmarked()
    {
        return $this->belongsToMany('App\Models\Customer', 'customers_bookmarks', 'crew_id', 'customer_id');
    }

    /**
     * Get the the bookmarks.
     */
    public function bookmarks()
    {
        return $this->belongsToMany('App\Models\Project', 'crews_bookmarks', 'crew_id', 'project_id');
    }
}
