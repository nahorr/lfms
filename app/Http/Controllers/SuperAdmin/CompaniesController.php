<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Company;
use App\User;
use File;
use App\Subscription;

class CompaniesController extends Controller
{
    public function showCompanies()
    {
    	$companies = Company::get();

    	return view('super.companies.showcompanies', compact('companies'));
    }

    public function newCompany()
    {
    	$companies = Company::get();

    	return view('super.companies.newcompany', compact('companies'));
    }

    public function addNewCompany(Request $request, Company $company){
        
        $this->validate(request(), [
            'company_name' => 'required',
            'city' => 'required',
            'phone' => 'required',
        ]);

        if($request->hasFile('logo')){
            $logo = $request->file('logo');
            $filename = preg_replace('/\s+/', '', $request->company_name) . time() . '.' . $logo->getClientOriginalExtension();
            $destinationPath = public_path().'/uploads/companies/logos/';
            $logo->move($destinationPath,$filename);
            
        }

        Company::insert([
            'company_code' => Str::uuid(),
            'company_name' => $request->company_name,
            'address' => $request->address,
            'state' => $request->state,
            'city' => $request->city,
            'country' => $request->country,
            'phone' => $request->phone,
            'motto' => $request->motto,
            'logo' => $filename,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
       
        flash('New omapny created Successfully!')->success();

        return redirect()->route('companies');
   }

   public function editCompany(Company $company)
    {

        return view('super.companies.editcompany', compact('company'));
    }


     public function updateCompany(Request $request, Company $company){
         
         $this->validate(request(), [
             'company_name' => 'required',
             'city' => 'required',
             'phone' => 'required',
         ]);

         $file = public_path('/uploads/companies/logos/'.$company->logo);
            if (File::exists($file)){
                unlink($file);               
            }

         if($request->hasFile('logo')){
             $logo = $request->file('logo');
             $filename = preg_replace('/\s+/', '', $request->company_name) . time() . '.' . $logo->getClientOriginalExtension();
             $destinationPath = public_path().'/uploads/companies/logos/';
             $logo->move($destinationPath,$filename);
             
         }

         company::where('id', $company->id)->update([
             'company_name' => $request->company_name,
             'address' => $request->address,
             'state' => $request->state,
             'city' => $request->city,
             'country' => $request->country,
             'phone' => $request->phone,
             'motto' => $request->motto,
             'logo' => $filename,
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s'),
            ]);
        
         flash('New omapny created Successfully!')->success();

         return redirect()->route('companies');
    }

    public function deleteCompany(Company $company)
    {
        
        $company = Company::where('id', $company->id)->first();
        $company->deleted_at = date('Y-m-d H:i:s');
        $company->save();
        
        flash('Company deleted!')->error();

        return back();
    }

    public function unDeleteCompany(Company $company)
    {
        
        $company = Company::where('id', $company->id)->first();
        $company->deleted_at = Null;
        $company->save();
        
        flash('Company activated successfully!')->error();

        return back();
    }

    public function companyDetail(Company $company)
    {

        return view('super.companies.detail', compact('company'));
    }

    
}
