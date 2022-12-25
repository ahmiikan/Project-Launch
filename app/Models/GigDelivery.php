<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class GigDelivery extends Model
{
    use HasFactory;

    protected $fillable = [
        'file',
        'instructions',
        'gig_purchase_id',
        'delivery_UID',
        'reason_for_rejection',
        'status',
    ];

    public function gigPurchase()
    {
        return $this->belongsTo(GigPurchase::class);
    }
}
