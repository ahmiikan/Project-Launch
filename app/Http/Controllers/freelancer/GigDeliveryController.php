<?php

namespace App\Http\Controllers\freelancer;

use App\Models\GigDelivery;
use App\Models\GigPurchase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GigDeliveryController extends Controller
{
    public function store(Request $request, $sale_id)
    {
        $request->validate([
            'attachment' => 'required',
        ]);

        $d_UID =   'gigDlv' . str_pad( uniqid() , 12 , "0", STR_PAD_LEFT);


        $gigDelivery = new GigDelivery();
        $gigDelivery->file = $request->file;
        $gigDelivery->instructions = $request->instructions;
        $gigDelivery->gig_purchase_id = $sale_id;
        $gigDelivery->delivery_UID = $d_UID;

        $gigPurchase = GigPurchase::find($sale_id);
        $gigPurchase->purchase_status = 2;
        $gigPurchase->save();
        
        $gigDelivery->save();
        return redirect()->back()->with('success', 'Gig delivered successfully.');

    }
}
