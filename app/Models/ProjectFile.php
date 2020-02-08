<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectFile extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'project_files';

    /**
     * Get the users of the role.
     */
    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }
}
