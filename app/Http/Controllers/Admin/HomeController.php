<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;
use Auth;

class HomeController extends Controller
{
    public function index()
    {
        $company = Company::where('id', Auth::user()->company_id)->first();

    	return view('admin.home', compact('company'));
    }
}
