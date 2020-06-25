<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ClientCase;
use App\Company;
use App\Client;

class CaseFilesController extends Controller
{
    public function showCaseFiles(ClientCase $case, Company $company, Client $client)
    {
 		$case_file_folder = preg_replace('/\..+$/', '', $case->case_number);

 		$clientcases = ClientCase::where('company_id', $company->id)->where('id', $case->id)->get();

    	return view('admin.cases.files.showcasefiles', compact('clientcases', 'case_file_folder', 'case', 'company', 'client'));
    }
}
