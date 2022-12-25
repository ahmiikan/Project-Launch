<?php

namespace App\Http\Controllers;

use App\Models\Gig;
use Illuminate\Http\Request;
use App\Models\GigPaymentTransaction;

class GigPaymentTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($gig_id)
    {
        $gig = Gig::find($gig_id);
        return view('client.gig.gig_purchase.confirmAndPay', compact('gig'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $gig_id)
    {
        $gigPaymentTransaction = $request->validate([
            'card_name' => ['required', 'string'],
            'card_number' => ['required', 'numeric'],
            'card_cvc' => ['required', 'numeric'],
            'card_exp_month' => ['required', 'numeric'],
            'card_exp_year' => ['required', 'numeric'],
        ],
            [
                'card_name.required' => 'Card Name is required',
                'card_number.required' => 'Card Number is required',
                'card_cvc.required' => 'Card CVC is required',
                'card_exp_month.required' => 'Card Expiry Month is required',
                'card_exp_year.required' => 'Card Expiry Year is required',
            ]);
        $gig = Gig::find($gig_id);

        $o_UID = 'gigOrd' . str_pad(uniqid(), 12, "0", STR_PAD_LEFT);

        $gigPaymentTransaction['order_UID'] = $o_UID;
        $gigPaymentTransaction['gig_id'] = $gig->id;
        $gigPaymentTransaction['user_id'] = $request->user()->id;
        GigPaymentTransaction::create($gigPaymentTransaction);

        return view('client.gig.gig_purchase.submitRequirements', compact('o_UID', 'gig'));

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
