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

    public function deleteUser(User $user)
    {
    	User::where('id', $user->id)->delete();

    	flash('user deleted!')->danger();

        return back();
    }
}
