<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\SoftDeletes;


class Project extends Model
{
    use HasFactory, Searchable, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'status',
        'budget',
        'duration',
        'attachment',
        'user_id',
        'category_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->hasOne(ProjectCategory::class, 'id', 'category_id');
    }

    public function projectProposals()
    {
        return $this->hasMany(ProjectProposal::class, 'project_id', 'id');
    }

    public function milestones()
    {
        return $this->hasMany(ProjectMilestone::class);
    }

    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
        ];
    }

}
