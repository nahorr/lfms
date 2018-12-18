<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
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

        return view('home', compact('fee_ss1', 'fee_ss2'));
    }

    public function payStackPost(Request $request)
    {
        $paystack = new PayStack();

        $paystack->fee_id = Fee::where('type', 'Tuition-SS1')->first()->id;
        $paystack->email = Auth::user()->email;
        $paystack->amount = Fee::where('type', 'Tuition-SS1')->first()->amount;
        $paystack->trans_ref = $request->trans_ref;

        $paystack->save();

        return response()->json();

    }
}
