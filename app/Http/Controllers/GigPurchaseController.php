<?php

namespace App\Http\Controllers;

use App\Models\Gig;
use App\Models\GigDelivery;
use App\Models\GigPurchase;
use Illuminate\Http\Request;
use App\Models\GigPaymentTransaction;

class GigPurchaseController extends Controller
{
    public function index(){
        $gigPurchases = GigPurchase::where('user_id', auth()->user()->id)->get();
        $gig_ids = collect($gigPurchases->pluck('gig_id'));
        $gigs = Gig::whereIn('id', $gig_ids)->get();
        $a=1;
        return view('client.gig.gig_purchase.client_purchases.index', compact('gigPurchases', 'gigs', 'a'));
    }

    public function show($purchase_id){
        $gigPurchase = GigPurchase::find($purchase_id);
        $gigDelivery = GigDelivery::where('gig_purchase_id', $purchase_id)->first();

        return view('client.gig.gig_purchase.client_purchases.show', compact('gigPurchase', 'gigDelivery'));
    }

    public function deliveredShow($purchase_id){
        $gigPurchase = GigPurchase::find($purchase_id);
        $gigDelivery = GigDelivery::where('gig_purchase_id', $purchase_id)->first();
        return view('client.gig.gig_purchase.client_purchases.deliveredShow', compact('gigPurchase', 'gigDelivery'));
    }
    public function completedShow($purchase_id){
        $gigPurchase = GigPurchase::find($purchase_id);
        $gigDelivery = GigDelivery::where('gig_purchase_id', $purchase_id)->first();
        return view('client.gig.gig_purchase.client_purchases.completedShow', compact('gigPurchase', 'gigDelivery'));
    }
    
    public function store(Request $request,  $o_UID){
        
        $requirements = $request->validate([
            'requirements' => ['required', 'string'],
            'attachment' => ['required'],
        ]);

        $gigPaymentTransaction = GigPaymentTransaction::where('order_UID', $o_UID)->firstOrFail();
        $gig = Gig::find($gigPaymentTransaction->gig_id);

        $fileName = time() . '.' . $request->attachment->getClientOriginalExtension();
        $request->attachment->move(public_path('uploads/gig'), $fileName);
        $requirements['attachment'] = $fileName;
        $requirements['gig_id'] = $gig->id;
        
        $requirements['freelancer_id'] = $gig->freelancer_id;
        $requirements['user_id'] = $request->user()->id;
        $requirements['gig_requirements'] = $request->requirements;
        $requirements['purchase_status'] = 1;
        $requirements['gig_total_amount'] = $gig->gig_amount_after_commission;
        $requirements['order_UID'] = $gigPaymentTransaction->order_UID;
        $requirements['gig_transaction_id'] = $gigPaymentTransaction->id;

        GigPurchase::create($requirements);

        // return view('client.gig.gig_purchase.trackOrder');
        return redirect()->route('gigPurchaseView');
    }

    public function downloadDelivery($attachment){
        $file= public_path('uploads/gig/deliveries/'.$attachment);
        return response()->download($file);
    }
  

}
