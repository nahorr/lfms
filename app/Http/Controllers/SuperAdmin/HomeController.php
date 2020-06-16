<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Company;
use App\User;

class HomeController extends Controller
{
    public function index()
    {
    	$companies = Company::get();

    	$users = User::get();

    	return view('super.home', compact('companies', 'users'));
    }
}
