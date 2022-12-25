<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\SoftDeletes;


class Gig extends Model
{
    use HasFactory, Searchable, SoftDeletes;

    protected $fillable = [
        'freelancer_id',
        'title',
        'description',
        'category_id',
        'amount',
        'gig_commission',
        'gig_amount_after_commission',
        'image',
        'duration',
        'status',
    ];

    public function freelancers()
    {
        return $this->belongsTo(Freelancer::class, 'freelancer_id');
    }

    public function gigCategory()
    {
        return $this->hasOne(GigCategory::class, 'id', 'category_id');
    }


    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
        ];
    }

    public function gigPurchase()
    {
        return $this->hasMany(GigPurchase::class);
    }

    public function gigPaymentTransaction()
    {
        return $this->hasOne(GigPaymentTransaction::class);
    }
}
