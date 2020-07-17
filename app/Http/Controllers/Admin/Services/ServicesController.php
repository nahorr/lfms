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

   public function editService(Company $company, Service $service)
    {

        return view('admin.services.editservice', compact('company', 'service'));
    }

   public function updateService(Request $request, Company $company, Service $service){

        $this->validate(request(), [
            /*'service_name' => 'required|unique'*/
            'service_name' => [
                'required',
                Rule::unique('services', 'service_name')->ignore($service)->where(function ($query) use ($company) {
                return $query->where('company_id', $company->id);
                })
            ]
        ]);

        Service::where('id', $service->id)->update([
            'service_name' => $request->service_name,
            'service_description' => $request->service_description,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
       
        flash('Service Updated!')->success();

        return redirect()->route('admin.services.all', compact('company'));
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
