<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Company;
use App\Service;
use App\ClientCase;
use App\Client;
use Carbon\Carbon;
use App\User;
use Illuminate\Validation\Rule;
use App\ClientService;


class ServicesController extends Controller
{
    public function showServices(Company $company)
    {
    	$companyservices = Service::where('company_id', $company->id)->where('deleted_at',Null)->get(); 

    	return view('admin.services.showservices', compact('company', 'companyservices'));
    }

    public function addNewService(Company $company)
    {
    	$companyclients = Client::where('company_id', $company->id)->get();

        $companylawyers = User::where('group_id', 4)->where('company_id', $company->id)->get();

    	return view('admin.services.addnewservice', compact('companyclients', 'company', 'companylawyers'));
    }

    public function addService(Request $request, Company $company){

        $this->validate(request(), [
            'service_name' => Rule::unique('services')->where(function ($query) use ($company) {
                return $query->where('company_id', $company->id);
            })
        ]);

        Service::insert([
            'company_id' => $company->id,
            'service_name' => $request->service_name,
            'service_description' => $request->service_description,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
       
        flash('Service Added!')->success();

        return redirect()->route('admin.services.all', compact('company'));
   }

   public function addClientService(Company $company, Service $service)
    {
    	$companyclients = Client::where('company_id', $company->id)->get();

    	$companylawyers = User::where('group_id', 4)->where('company_id', $company->id)->get();

    	return view('admin.services.addclientservice', compact('company', 'service', 'companyclients','companylawyers'));
    }

     public function addNewClientService(Request $request, Company $company, Service $service){

        $service_file_folder = preg_replace('/\..+$/', '', $company->id.$request->service_number);

            $this->validate(request(), [
                'client_id' => 'required',
                'service_number' => 'required',
                'service_number' =>Rule::unique('client_services')->where(function($query) use($company) {
                    return $query->where('company_id', $company->id);
                }),   
                'service_title' => 'required',
                'effective_date' => 'required',
                'service_files.*' => 'file|mimes:jpeg,png,jpg,zip,pdf,ppt, pptx, xlx, xlsx,docx,doc,gif,webm,mp4,mpeg,odt,ods,odp,|max:10000'
            ]);

            if($request->hasFile('service_files'))
            {
                foreach($request->file('service_files') as $file)
                {
                    
                    $filename = preg_replace('/\..+$/', '', $file->getClientOriginalName()) . time() . '.' . $file->getClientOriginalExtension();
                    $destinationPath = public_path().'/uploads/companies/services/'.$service_file_folder;
                    $file->move($destinationPath,$filename);
                    $data[] = $filename; 
                    
                }

                ClientService::insert([
                    'company_id' => $company->id,
                    'service_id' => $service->id,
                    'client_id' => $request->client_id,
                    'service_number' => $request->service_number,
                    'service_title' => $request->service_title,
                    'service_files'=>json_encode($data),
                    'service_details' => $request->service_details,
                    'effective_date' => $request->effective_date,
                    'user_id' => $request->user_id,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            }else{

                ClientService::insert([
                    'company_id' => $company->id,
                    'service_id' => $service->id,
                    'client_id' => $request->client_id,
                    'service_number' => $request->service_number,
                    'service_title' => $request->service_title,
                    //'service_files'=>json_encode($data),
                    'service_details' => $request->service_details,
                    'effective_date' => $request->effective_date,
                    'user_id' => $request->user_id,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);

            }

            
           
            flash('service Added!')->success();

            return redirect(route('admin.services.clientservices', compact('company', 'service')));
        
   }

   public function showClientServices(Company $company, Service $service)
    {
    	$clientservices = ClientService::where('company_id', $company->id)->where('service_id', $service->id)->get();

        

    	return view('admin.services.showclientservices', compact('clientservices', 'company', 'service'));
    }


    public function deleteService(Service $service)
    {
        $companyservice = Service::where('id', $service->id)->first();

        $companyservice->deleted_at = date('Y-m-d H:i:s');

        $companyservice->save();

        flash('service deleted!')->error();

        return back();
    }
}
