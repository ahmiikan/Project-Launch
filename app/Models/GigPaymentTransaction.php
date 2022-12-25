<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GigPaymentTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'card_name',
        'order_UID',
        'card_number',
        'card_cvc',
        'card_exp_month',
        'card_exp_year',
        'gig_id',
        'user_id',
    ];


    public function gig()
    {
        return $this->belongsTo(Gig::class);
    }

    public function gigInvoice()
    {
        return $this->hasOne(GigInvoice::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
