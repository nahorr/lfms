<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;

class HomeController extends Controller
{
    public function index()
    {
    	return view('admin.home');
    }
}
