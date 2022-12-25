<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ProjectProposal extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'price',
        'description',
        'attachment',
        'days',
        'freelancer_id',
        'project_id',
        'status'
    ];

    public function freelancers()
    {
        return $this->belongsTo(Freelancer::class, 'freelancer_id', 'id');
    }

    public function projects()
    {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }
}
