<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UsersController extends Controller
{
    public function showUsers()
    {
    	$users = User::get();

    	return view('admin.users', compact('users'));
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
    	User::where('id', $user->id)->delete();

    	flash('user deleted!')->danger();

        return back();
    }
}
