<?php

namespace App\Http\Controllers\Lawyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Company;
use App\ClientCase;
use Auth;

class CasesController extends Controller
{
    public function show(Company $company)
    {
    	$lawyer_cases = ClientCase::where('company_id', $company->id)->where('user_id', Auth::user()->id)->get();

    	return view('lawyer.cases.show', compact('company', 'lawyer_cases'));
    }
}
