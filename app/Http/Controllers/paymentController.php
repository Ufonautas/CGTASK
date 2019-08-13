<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\products;
use App\payments;
use Carbon\Carbon;

class paymentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function servepayment($id){

        // OBSOLETE FUNCTION, NOT USED ANYMORE, LEFT FOR SALVAGING, NOT TO BE USED IN PRODUCTION

        $payment = products::where('id', $id)->first();
        $matches = ['planid' => $id, 'userID', auth()->user()->id];

        $haveQuerry = payments::where($matches)->first();

        $mytime = Carbon::now();

        if(count($haveQuerry) > 0)
        {
            if($haveQuerry->activeUntil >= $mytime->toDateTimeString() ){
                $havePaid = false;
            }
            else {
                $havePaid = true;
            }
        }
        else{
            $havePaid = false;
        }


        
        $havePaid = true;

        $data = array(
            'payment' => $payment,
            'havePaid' => $havePaid,
        );
        
        return view('payments.view')->with('payment', $payment);
    }

    public function processpayment(Request $request, $id){

        // PROCESS PAYMENT WITH STRIPE

        $product = products::where('id', $id)->first();

        $amountToCharge = $product->price;
        $amountToCharge = str_replace(".", "", $amountToCharge);

        $stripe = \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $token = $request->input('stripeToken');

        $charge = \Stripe\Charge::create(['amount' => $amountToCharge, 'currency' => 'eur', 'source' => $token]);

        if($charge['status'] == 'succeeded'){
            
            $paymentData = payments::updateOrCreate(
                ['planid' => $id, 'userID' => auth()->user()->id],
                ['activeUntil' => Carbon::now()->addMinutes(5)->toDateTimeString()]
            );


            return redirect('/home')->with('success', 'payment was completed');
        }
        else{
            return redirect('/home')->with('error', -'payment was declined');
        }
    }
}
