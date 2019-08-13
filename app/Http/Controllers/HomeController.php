<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\products;
use App\payments;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // get all products and load selections
        $cgProds = products::where('group', 'CG')->get();
        $progProds = products::where('group', 'PROGRAMMING')->get();
        $craProds = products::where('group', 'CRAFT')->get();
        
        $data = array(
            'cg' => $cgProds,
            'programming' => $progProds,
            'craft' => $craProds,
        );

        return view('main.dashboard')->with('data', $data);
    }

    public function viewProduct($id){
        // view individual product with its data
        $product = products::where('id', $id)->first();

        $matches = ['planid' => $id, 'userID' => auth()->user()->id];

        $haveQuerry = payments::where($matches)->first();

        // Check if licence is active, if it is active - hide buy now button
        if($haveQuerry['activeUntil'] !== null)
        {
            

            if(Carbon::now()->toDateTimeString() > Carbon::parse($haveQuerry['activeUntil']) )
            {
                $havePaid = false;
            }
            else {
                $havePaid = true;
            }
        }
        else{
            $havePaid = false;
        }

        $data = array(
            'product' => $product,
            'havePaid' => $havePaid,
        );

        return view('main.viewprod')->with('data', $data);
    }

    public function mySubs(){
        // load my subscriptions page with all subscriptions
        $subs = payments::where('userID', auth()->user()->id)->get();

        return view('main.subs')->with('subs', $subs);
    }
}
