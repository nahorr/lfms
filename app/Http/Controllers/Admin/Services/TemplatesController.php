<?php

namespace App\Http\Controllers\Admin\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Company;
use App\Template;

class TemplatesController extends Controller
{
    public function show(Company $company)
    {
    	$templates = Template::withTrashed()->get();

    	return view('admin.services.templates.show', compact('company', 'templates'));
    }
}
