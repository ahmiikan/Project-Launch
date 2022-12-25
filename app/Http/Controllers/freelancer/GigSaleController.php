<?php

namespace App\Http\Controllers\freelancer;

use App\Models\Gig;
use App\Models\GigPurchase;
use App\Http\Controllers\Controller;
use App\Models\GigDelivery;
use App\Models\User;

class GigSaleController extends Controller
{
    public function index()
    {
        $gigSales = GigPurchase::where('freelancer_id', auth()->user()->freelancers->id)->get();
        $gig_ids = collect($gigSales->pluck('gig_id'));
        $user_ids = collect($gigSales->pluck('user_id'));
        $gigs = Gig::whereIn('id', $gig_ids)->get();
        $users = User::whereIn('id', $user_ids)->get();
        $a=1;

        return view('client.gig.gig_purchase.freelancer_sales.index', compact('gigSales', 'gigs','users', 'a'));
    }

    public function show($sale_id)
    {
        $gigSale = GigPurchase::find($sale_id);
        return view('client.gig.gig_purchase.freelancer_sales.show', compact('gigSale'));
    }

    public function deliveredShow($sale_id){
        $gigSale = GigPurchase::find($sale_id);
        $gigDelivery = GigDelivery::where('gig_purchase_id', $sale_id)->first();
        return view('client.gig.gig_purchase.freelancer_sales.deliveredShow', compact('gigSale', 'gigDelivery'));
    }
    public function completedShow($sale_id){
        $gigSale = GigPurchase::find($sale_id);
        $gigDelivery = GigDelivery::where('gig_purchase_id', $sale_id)->first();
        return view('client.gig.gig_purchase.freelancer_sales.completedShow', compact('gigSale', 'gigDelivery'));
    }
}
