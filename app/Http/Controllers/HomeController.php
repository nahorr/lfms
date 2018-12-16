<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\PayStack;
use App\Fee;
use Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fee_ss1 = Fee::where('type', 'Tuition-SS1')->first();
        $fee_ss2 = Fee::where('type', 'Tuition-SS2')->first();

        $paystack = PayStack::first();

        return view('home', compact('fee_ss1', 'fee_ss2', 'paystack'));
    }

    public function payStackPost(Request $request)

    {
        $fee_ss1 = Fee::where('type', 'Tuition-SS1')->first();
        $fee_ss2 = Fee::where('type', 'Tuition-SS2')->first();

        PayStack::insert([
            'fee_id' => $fee_ss1->id,
            'email' => Auth::user()->email,
            'amount' => $fee_ss1->amount,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);


        return response()->json(['success'=>'Got Simple Ajax Request.']);

    }
}
