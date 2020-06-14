<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Company;
use Auth;

class UsersController extends Controller
{
    public function showUsers()
    {
    	$users = User::get();

    	$company = Company::where('id', Auth::user()->company_id)->get();

    	return view('user.users.showusers', compact('users', 'company'));
    }
}
