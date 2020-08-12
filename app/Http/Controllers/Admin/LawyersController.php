<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Company;
use Hash;

class LawyersController extends Controller
{
    public function showCompanyLawyers(Company $company)
    {
    	$companylawyers = User::withTrashed()->where('company_id', $company->id)->where('group_id', 4)->get();

    	return view('admin.lawyers.showlawyers', compact('companylawyers'));
    }

    public function newLawyer(Company $company)
    {
        $companyusers = User::where('company_id', $company->id)->where('deleted_at', Null)->get();

        return view('admin.lawyers.newlawyer', compact('companyusers','company'));
    }

    public function addNewLawyer(Request $request, Company $company){
        
        $this->validate(request(), [
            'name' => 'required',
            //'company_id' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);

        User::insert([
            'name' => $request->name,
            'company_id' => $company->id,
            'email' => $request->email,
            'designation' => $request->designation,
            'group_id' => 4,//group_id for lawyers is always 4
            'password' => Hash::make($request->password),
            'email_verified_at' => date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
       
        flash('New User created Successfully!')->success();

        return redirect()->route('companylawyers', compact('company'));
   }

   public function editLawyer(Company $company, User $lawyer)
    {

        return view('admin.lawyers.editlawyer', compact('company', 'lawyer'));
    }

    public function updateLawyer(Request $request, Company $company, User $lawyer){
        
        $this->validate(request(), [
            'name' => 'required',
        ]);

        User::where('id', $lawyer->id)->update([
            'name' => $request->name,
            'designation' => $request->designation,
        ]);
       
        flash('New User created Successfully!')->success();

        return redirect()->route('companylawyers', compact('company'));
   }

    public function deleteLawyer(User $lawyer)
    {
        User::where('id', $lawyer->id)->first()->delete();

        flash('lawyer deleted!')->error();

        return back();
    }

    public function restore($id)
    {
        User::withTrashed()->find($id)->restore();

        flash('lawyer retored!')->success();

        return back();
    }

    public function deleteForever($id)
    {
        User::withTrashed()->find($id)->forceDelete();

        flash('lawyer Deleted!')->success();

        return back();
    }
}
