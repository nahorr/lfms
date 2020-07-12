<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Company;
use Hash;
use App\Group;

class UsersController extends Controller
{
    public function showUsers()
    {
    	$users = User::get();

    	return view('super.users.showusers', compact('users'));
    }

     public function newUser()
    {
    	$companies = Company::get();

    	$users = User::get();

    	return view('super.users.newuser', compact('companies','users'));
    }

    public function addNewUser(Request $request){
        
        $this->validate(request(), [
            'name' => 'required',
            'company_id' => 'required',
            'email' => 'required|unique:users',
            'group_id' => 'required',
            'password' => 'required',
        ]);

        User::insert([
            'name' => $request->name,
            'company_id' => $request->company_id,
            'email' => $request->email,
            'group_id' => $request->group_id,
            'password' => Hash::make($request->password),
            'email_verified_at' => date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
       
        flash('New User created Successfully!')->success();

        return redirect()->route('All Users');
   }

   public function editUser(User $user)
    {
        $groups = Group::where('id', '!=', 1)->get();

        return view('super.users.edituser', compact('user', 'groups'));
    }

    public function updateUser(Request $request, User $user){
        
        $this->validate(request(), [
            'name' => 'required',
            //'email' => 'required|unique:users',
            'group_id' => 'required',
        ]);

        User::where('id', $user->id)->update([
            'name' => $request->name,
            //'email' => $request->email,
            'group_id' => $request->group_id,
            //'email_verified_at' => date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
       
        flash('New User created Successfully!')->success();

        return redirect()->route('All Users');
   }

    public function deleteUser(Request $request, User $user)
    {
        $user = User::where('id', $user->id)->first();

        $user->deleted_at = date('Y-m-d H:i:s');

        $user->save();

    	flash('user deleted!')->error();

        return back();
    }

    public function unDeleteUser(Request $request, User $user)
    {
        $user = User::where('id', $user->id)->first();

        $user->deleted_at = Null;

        $user->save();

        flash('user uddeleted!')->error();

        return back();
    }
}
