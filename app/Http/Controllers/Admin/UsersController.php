<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Company;
use Hash;

class UsersController extends Controller
{
    public function showCompanyUsers(Company $company)
    {
    	$companyusers = User::where('company_id', $company->id)->where('deleted_at', Null)->get();

    	return view('admin.users.showusers', compact('companyusers'));
    }

    public function newUser(Company $company)
    {
        return view('admin.users.newuser', compact('company'));
    }

    public function addNewUser(Request $request, Company $company){
        
        $this->validate(request(), [
            'name' => 'required',
            //'company_id' => 'required',
            'email' => 'required|unique:users',
            'is_admin' => 'required',
            'password' => 'required',
        ]);

        User::insert([
            'name' => $request->name,
            'company_id' => $company->id,
            'email' => $request->email,
            'is_admin' => $request->is_admin,
            'password' => Hash::make($request->password),
            'email_verified_at' => date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
       
        flash('New User created Successfully!')->success();

        return redirect()->route('companyusers', compact('company'));
   }

    public function makeAdmin(Request $request, User $user)
    {
        $this->validate(request(), [

            'is_admin' => 'required',
        ]);

        $make_admin = User::where('id', $user->id)->first();

        $make_admin->is_admin = $request->is_admin;

        $make_admin->save();
       
        flash('User Updated successfully!')->success();

        return back();
    }

    public function makeUser(Request $request, User $user)
    {
        $this->validate(request(), [

            'is_admin' => 'required',
        ]);

        $make_user = User::where('id', $user->id)->first();

        $make_user->is_admin = $request->is_admin;

        $make_user->save();
       
        flash('User Updated successfully!')->success();

        return back();
    }

     public function deleteUser(User $user)
    {
        $user = User::where('id', $user->id)->first();

        $user->deleted_at = date('Y-m-d H:i:s');

        $user->save();

        flash('user deleted!')->error();

        return back();
    }
}
