<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class GigPurchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_UID',
        'gig_id',
        'user_id',
        'purchase_status',
        'gig_total_amount',
        'freelancer_id',
        'gig_requirements',
        'gig_transaction_id',
        'attachment',

    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function gigInvoice()
    {
        return $this->hasOne(GigInvoice::class);
    }

    public function gig()
    {
        return $this->belongsTo(Gig::class);
    }

    public function gigDelivery()
    {
        return $this->hasMany(GigDelivery::class);
    }
}
