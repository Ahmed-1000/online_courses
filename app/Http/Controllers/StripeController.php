<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use Stripe; 

class StripeController extends Controller
{
    public function stripe(){
          return view('dashboard.stripe');
    }
    public function stripePost(Request $request){
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
            "amount" => 100 * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "this payment is tested "
        ]);
        return back();
        //can return for target page
    }
}
