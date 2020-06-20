<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Company;

class UsersController extends Controller
{
    public function showCompanyUsers(Company $company)
    {
    	$companyusers = User::where('company_id', $company->id)->where('deleted_at', Null)->get();

    	return view('admin.users.showusers', compact('companyusers'));
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
