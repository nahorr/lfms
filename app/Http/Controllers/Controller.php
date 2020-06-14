<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Company;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function welcome()
    {
    	return view('welcome');
    }

    public function registerCompany()
    {
    	return view('register_company');
    }

    public function postRegisterCompany(Request $request)
    {
    	$this->validate(request(), [
            'company_name' => 'required|unique:companies',
            'city' => 'required',
            'phone' => 'required|unique:companies|numeric',
            
        ]);
        
        Company::insert([
            'company_name' => $request->company_name,
            'city' => $request->city,
            'phone' => $request->phone,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        $company = Company::where('phone', $request->phone)->first();


        flash('Company Detials Added Successfully. Now let us omplete the Final step by entering your datails!')->success();

        return view('auth.register', compact('company'));
    }
}
