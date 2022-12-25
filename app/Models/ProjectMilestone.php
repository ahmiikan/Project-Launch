<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProjectMilestone extends Model
{
    use HasFactory;


    public function projects()
    {
        return $this->belongsTo(Project::class);
    }
}
