<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Company;
use Hash;
use App\Group;

class UsersController extends Controller
{
    public function showCompanyUsers(Company $company)
    {
    	$companyusers = User::withTrashed()->where('company_id', $company->id)->get();

    	return view('admin.users.showusers', compact('companyusers'));
    }

    public function newUser(Company $company)
    {
        $roles= Group::where('id', '!=', 1)->get();

        return view('admin.users.newuser', compact('roles', 'company'));
    }

    public function addNewUser(Request $request, Company $company){
        
        $this->validate(request(), [
            'name' => 'required',
            'group_id' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);

        User::insert([
            'name' => $request->name,
            'company_id' => $company->id,
            'group_id' => $request->group_id,
            'email' => $request->email,
            'designation' => $request->designation,
            'password' => Hash::make($request->password),
            'email_verified_at' => date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
       
        flash('New User created Successfully!')->success();

        return redirect()->route('companyusers', compact('company'));
   }

   public function editUser(Company $company, User $user)
    {
        $roles= Group::where('id', '!=', 1)->get();

        return view('admin.users.edituser', compact('roles', 'company', 'user'));
    }

    public function updateUser(Request $request, Company $company, User $user){
        
        $this->validate(request(), [
            'name' => 'required',
            'designation' => 'required',
        ]);

        User::where('id', $user->id)->update([
            'name' => $request->name,
            'designation' => $request->designation,
        ]);
       
        flash('New Udated Successfully!')->success();

        return redirect()->route('companyusers', compact('company'));
   }
    

    public function deleteUser(User $user)
    {
        User::where('id', $user->id)->delete();

        flash('user deleted!')->error();

        return back();
    }

    public function restore($id)
    {
        User::withTrashed()->find($id)->restore();

        flash('User Restored!')->success();

        return back();
    }

    public function deleteForever($id)
    {
        User::withTrashed()->find($id)->forceDelete();

        flash('User Deleted Forever!')->error();

        return back();
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
}
