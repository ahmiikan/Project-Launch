<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;


class GigCategory extends Model
{
    use HasFactory, Searchable, SoftDeletes;

    protected $fillable = [
        'name'
    ];

    public function gigs()
    {
        return $this->belongsTo(Gig::class);
    }

    public function toSearchableArray()
    {
        return ['name' => $this->name];

    }

}

