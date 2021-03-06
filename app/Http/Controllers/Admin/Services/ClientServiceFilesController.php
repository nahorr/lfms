<?php

namespace App\Http\Controllers\Admin\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ClientService;
use App\Company;
use App\Service;
use App\Client;
use File;
use DB;


class ClientServiceFilesController extends Controller
{
    public function showClientServiceFiles(ClientService $clientservice, Company $company, Service $service, Client $client)
    {
    	return view('admin.services.files.showclientservicefiles', compact('clientservice', 'company', 'service', 'client'));
    }

    public function deleteFile(ClientService $clientservice, $filename)
    {
        $client_service = ClientService::where('id', $clientservice->id)->first();
                
        // Remove selected file or image from server
        foreach (json_decode($client_service->service_files) as $key=>$value){
            
            if($value == $filename){
                
                $clienservice_filename_array = json_encode(array_except(json_decode($client_service->service_files),$key));
                
                foreach(json_decode($clienservice_filename_array) as $service_file)
                {
     
                    $data[] = $service_file;

                }

                $file = public_path('/uploads/companies/services/'.$client_service->company_id. "/" .$filename);

                if (File::exists($file)){
                    unlink($file);               
                }

                $client_service->service_files=json_encode($data);

                $client_service->save();
                
               
            }
        }
            
        return back();
    }

}
