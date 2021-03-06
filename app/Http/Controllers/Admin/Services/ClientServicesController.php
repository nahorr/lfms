<?php

namespace App\Http\Controllers\Admin\Services;

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
use Auth;

class ClientServicesController extends Controller
{
    public function showClientServices(Company $company, Service $service)
    {
    	$clientservices = ClientService::where('company_id', $company->id)->where('service_id', $service->id)->get();

    	return view('admin.services.showclientservices', compact('clientservices', 'company', 'service'));
    }

    public function addClientService(Company $company, Service $service)
    {
    	$companyclients = Client::where('company_id', $company->id)->get();

    	$companylawyers = User::where('group_id', 4)->where('company_id', $company->id)->get();

    	return view('admin.services.addclientservice', compact('company', 'service', 'companyclients','companylawyers'));
    }

     public function addNewClientService(Request $request, Company $company, Service $service){

        $service_file_folder = preg_replace('/\..+$/', '', $company->id);

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
                    'effective_date' => Carbon::parse($request->effective_date)->format('Y-m-d'),
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
                    'effective_date' => Carbon::parse($request->effective_date)->format('Y-m-d'),
                    'user_id' => $request->user_id,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);

            }
           
        flash('Client Service Added!')->success();

        return redirect(route('admin.services.clientservices', compact('company', 'service')));
        
   }


  public function add(Company $company, Client $client)
  {

      $companylawyers = User::where('group_id', 4)->where('company_id', $company->id)->get();

      $company_services = Service::where('company_id', $company->id)->get();

      return view('admin.services.client.add', compact('company', 'client', 'companylawyers', 'company_services'));
  }


    public function create(Request $request, Company $company, Client $client){

       $service_file_folder = preg_replace('/\..+$/', '', $company->id);

           $this->validate(request(), [
               'service_id' => 'required',
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
                   'service_id' => $request->service_id,
                   'client_id' => $client->id,
                   'service_number' => $request->service_number,
                   'service_title' => $request->service_title,
                   'service_files'=>json_encode($data),
                   'service_details' => $request->service_details,
                   'effective_date' => Carbon::parse($request->effective_date)->format('Y-m-d'),
                   'user_id' => $request->user_id,
                   'created_at' => date('Y-m-d H:i:s'),
                   'updated_at' => date('Y-m-d H:i:s'),
               ]);
           }else{

               ClientService::insert([
                   'company_id' => $company->id,
                   'service_id' => $request->service_id,
                   'client_id' => $client->id,
                   'service_number' => $request->service_number,
                   'service_title' => $request->service_title,
                   'service_details' => $request->service_details,
                   'effective_date' => Carbon::parse($request->effective_date)->format('Y-m-d'),
                   'user_id' => $request->user_id,
                   'created_at' => date('Y-m-d H:i:s'),
                   'updated_at' => date('Y-m-d H:i:s'),
               ]);

           }
          
       flash('Client Service Added!')->success();

       return redirect(route('CompanyClients', compact('company')));
       
  }



   public function editClientService(Company $company, Service $service, ClientService $clientservice)
    {
        //dd($clientservice);

        $companyclients = Client::where('company_id', $company->id)->get();

        $companylawyers = User::where('group_id', 4)->where('company_id', $company->id)->get();

        return view('admin.services.editclientservice', compact('company', 'service', 'clientservice', 'companyclients','companylawyers'));
    }

    public function updateClientService(Request $request, Company $company, Service $service, ClientService $clientservice){

       $service_file_folder = preg_replace('/\..+$/', '', $company->id);

           $this->validate(request(), [

               'service_number' => 'required|unique:client_services,service_number,'.$clientservice->id,
               'service_number' =>Rule::unique('client_services')->ignore($clientservice->id)->where(function($query) use($company) {
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

               
               ClientService::where('id', $clientservice->id)->update([
                   'company_id' => $company->id,
                   'service_id' => $service->id,
                   'client_id' => $clientservice->client_id,
                   'service_number' => $request->service_number,
                   'service_title' => $request->service_title,
                   'service_files'=>json_encode(array_merge($data, json_decode($clientservice->service_files))),
                   'service_details' => $request->service_details,
                   'effective_date' => Carbon::parse($request->effective_date)->format('Y-m-d'),
                   'user_id' => $request->user_id,
                   'created_at' => date('Y-m-d H:i:s'),
                   'updated_at' => date('Y-m-d H:i:s'),
               ]);
           }else{

               ClientService::where('id', $clientservice->id)->update([
                   'company_id' => $company->id,
                   'service_id' => $service->id,
                   'client_id' => $clientservice->client_id,
                   'service_number' => $request->service_number,
                   'service_title' => $request->service_title,
                   //'service_files'=>json_encode($data),
                   'service_details' => $request->service_details,
                   'effective_date' => Carbon::parse($request->effective_date)->format('Y-m-d'),
                   'user_id' => $request->user_id,
                   'created_at' => date('Y-m-d H:i:s'),
                   'updated_at' => date('Y-m-d H:i:s'),
               ]);

           }
          
       flash('Client Service Updated!')->success();

       return redirect(route('admin.services.clientservices', compact('company', 'service')));
       
   }

   public function viewClientService(Company $company, Service $service, ClientService $clientservice)
    {

        $companyclients = Client::where('company_id', $company->id)->get();

        $companylawyers = User::where('group_id', 4)->where('company_id', $company->id)->get();

        return view('admin.services.viewclientservice', compact('company', 'service', 'clientservice', 'companyclients','companylawyers'));
    }

   public function delete(ClientService $clientservice)
    {
        ClientService::where('id', $clientservice->id)->delete();

        flash('Client service deleted!')->error();

        return back();
    }
}
