<?php

namespace App\Http\Controllers\Admin\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ClientService;
use App\Company;
use App\Service;
use App\Client;

class ClientServiceFilesController extends Controller
{
    public function showClientServiceFiles(ClientService $clientservice, Company $company, Service $service, Client $client)
    {
    	return view('admin.services.files.showclientservicefiles', compact('clientservice', 'company', 'service', 'client'));
    }
}
