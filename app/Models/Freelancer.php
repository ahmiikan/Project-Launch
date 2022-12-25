<?php

namespace App\Models;


use App\Models\Qualification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;


class Freelancer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'qualification',
    ];

    public function projectProposal()
    {
        return $this->hasOne(ProjectProposal::class, 'freelancer_id', 'id');
    }

    public function skills()
    {
        return $this->belongsToMany(SkillTag::class, 'user_skill_tags');
    }

    public function expertise()
    {
        return $this->belongsToMany(Expertise::class, 'user_expertises');
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');

    }


    public function gigs()
    {
        return $this->hasMany(Gig::class, 'freelancer_id');

    }

}
