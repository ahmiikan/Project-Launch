<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GigInvoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'gig_purchase_id',
        'gig_amount',
        'gig_commission',
        'gig_amount_after_commission',
        'payment_status',
        'expiry_date',
    ];

    public function gigPurchase()
    {
        return $this->belongsTo(GigPurchase::class);
    }

    public function gigPaymentTransaction()
    {
        return $this->belongsTo(GigPaymentTransaction::class);
    }
}
