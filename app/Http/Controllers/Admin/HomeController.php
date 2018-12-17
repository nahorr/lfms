<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;
use App\PayStack;
use App\Fee;
use Auth;

class HomeController extends Controller
{
    public function index()
    {
    	$fee_ss1 = Fee::where('type', 'Tuition-SS1')->first();
    	$fee_ss2 = Fee::where('type', 'Tuition-SS2')->first();

    	$paystack = PayStack::first();


    	return view('admin.home', compact('fee_ss1', 'fee_ss2', 'paystack'));
    }

    public function payStack()
    {
    	PayStack::insert([
            'fee_id' => Fee::where('type', 'Tuition-SS2')->first()->id,
            'email' => Auth::user()->email,
            'amount' => Fee::where('type', 'Tuition-SS2')->first()->amount,
            'trans_ref' => mt_rand(1000000000, 9999999999).preg_replace('/\s+/', '', Auth::user()->email),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return response()->json();
    }
}
