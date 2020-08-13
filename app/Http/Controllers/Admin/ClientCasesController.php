<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\UpComingCourtDate;
use App\Company;
use App\ClientCase;
use App\Client;
use Carbon\Carbon;
use App\User;
use Illuminate\Validation\Rule;
use File;


class ClientCasesController extends Controller
{
    public function showCases(Company $company)
    {
        $companycases = ClientCase::withTrashed()->where('company_id', $company->id)->get();

    	return view('admin.cases.showcases', compact('companycases'));
    }

    /*public function showAllClientCases(Client $client)
    {
        $allclientcases = ClientCase::where('client_id', $client->id)->get();

        return view('admin.cases.showallclientcases', compact('client', 'allclientcases'));
    }*/

    public function addNewCase(Company $company)
    {
        $companyclients = Client::where('company_id', $company->id)->get();

        $companylawyers = User::where('group_id', 4)->where('company_id', $company->id)->get();

        return view('admin.cases.addnewcase', compact('companyclients', 'company', 'companylawyers'));
    }

    public function addNewClientCase(Company $company, Client $client)
    {

        $companylawyers = User::where('group_id', 4)->where('company_id', $company->id)->get();

        return view('admin.cases.addnewclientcase', compact('client', 'company', 'companylawyers'));
    }

    public function addCase(Request $request, Company $company){

        $this->validate(request(), [
            'client_id' => 'required',
            'case_number' => 'required|unique:client_cases',
            'case_number' => Rule::unique('client_cases')->where( function($query) use($company){
                return $query->where('company_id', $company->id);
            }),
            'case_title' => 'required',
            'case_files*' => 'file|mimes:jpeg,png,jpg,zip,pdf,ppt, pptx, xlx, xlsx,docx,doc,gif,webm,mp4,mpeg,odt,ods,odp,|max:10000'
        ]);

        if($request->hasFile('case_files'))
        {
            foreach($request->file('case_files') as $file)
            {
                
                $filename = $company->id.$request->client_id.$request->case_number.preg_replace('/\..+$/', '', $file->getClientOriginalName()) . time() . '.' . $file->getClientOriginalExtension();
                $destinationPath = public_path().'/uploads/companies/cases/';
                $file->move($destinationPath,$filename);
                $data[] = $filename; 
                
            }

            ClientCase::insert([
                'case_files'=>json_encode($data),
                'company_id' => $company->id,
                'client_id' => $request->client_id,
                'case_number' => $request->case_number,
                'case_title' => $request->case_title,
                'history' => $request->history,
                'court_date' => $request->court_date,
                'court_location' => $request->court_location,
                'outcome' => $request->outcome,
                'user_id' => $request->user_id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }else{

            ClientCase::insert([
                'company_id' => $company->id,
                'client_id' => $request->client_id,
                'case_number' => $request->case_number,
                'case_title' => $request->case_title,
                'history' => $request->history,
                'court_date' => $request->court_date,
                'court_location' => $request->court_location,
                'outcome' => $request->outcome,
                'user_id' => $request->user_id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

        }      
       
        flash('Case Added!')->success();

        return redirect(route('adminclientcases', compact('company')));
   }

   public function addClientCase(Request $request, Company $company, Client $client){

        $this->validate(request(), [
            'case_number' => 'required|unique:client_cases',
            'case_number' => Rule::unique('client_cases')->where( function($query) use($company){
                return $query->where('company_id', $company->id);
            }),
            'case_title' => 'required',
            'case_files*' => 'file|mimes:jpeg,png,jpg,zip,pdf,ppt, pptx, xlx, xlsx,docx,doc,gif,webm,mp4,mpeg,odt,ods,odp,|max:10000'
        ]);

        if($request->hasFile('case_files'))
        {
            foreach($request->file('case_files') as $file)
            {
              
                $filename = $company->id.$client->id.$request->case_number.preg_replace('/\..+$/', '', $file->getClientOriginalName()) . time() . '.' . $file->getClientOriginalExtension();
                $destinationPath = public_path().'/uploads/companies/cases/';
                $file->move($destinationPath,$filename);
                $data[] = $filename; 
                
            }

            ClientCase::insert([
                'case_files'=>json_encode($data),
                'company_id' => $company->id,
                'client_id' => $client->id,
                'case_number' => $request->case_number,
                'case_title' => $request->case_title,
                'history' => $request->history,
                'court_date' => $request->court_date,
                'court_location' => $request->court_location,
                'outcome' => $request->outcome,
                'user_id' => $request->user_id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }else{

            ClientCase::insert([
            'company_id' => $company->id,
            'client_id' => $client->id,
            'case_number' => $request->case_number,
            'case_title' => $request->case_title,
            'history' => $request->history,
            'court_date' => $request->court_date,
            'court_location' => $request->court_location,
            'outcome' => $request->outcome,
            'user_id' => $request->user_id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        }
               
        flash('Client Case Added!')->success();

        return redirect(route('CompanyClients', compact('company')));
   }

   public function edit(Company $company, ClientCase $case)
    {
        $companyclients = Client::where('company_id', $company->id)->get();

        $companylawyers = User::where('group_id', 4)->where('company_id', $company->id)->get();

        return view('admin.cases.edit', compact('company', 'case', 'companylawyers', 'companyclients'));
    }

   public function update(Request $request, Company $company, ClientCase $case)
    {

        $this->validate(request(), [
            'case_number' => 'required|unique:client_cases,case_number,'.$case->id,
            'case_number' => Rule::unique('client_cases')->where( function($query) use($company, $case){
                return $query->where('company_id', $company->id)->where('id', '!=', $case->id);
            }),
            'case_title' => 'required',
            'case_files*' => 'file|mimes:jpeg,png,jpg,zip,pdf,ppt, pptx, xlx, xlsx,docx,doc,gif,webm,mp4,mpeg,odt,ods,odp,|max:10000'
        ]);

        
        if($request->hasFile('case_files'))
        {
            foreach($request->file('case_files') as $file)
            {
              
                $filename = $company->id.$request->client_id.$request->case_number.preg_replace('/\..+$/', '', $file->getClientOriginalName()) . time() . '.' . $file->getClientOriginalExtension();
                $destinationPath = public_path().'/uploads/companies/cases/';
                $file->move($destinationPath,$filename);
                $data[] = $filename; 
                
            }

            if ($case->case_files) {

                $new_plus_old_files = json_encode(array_merge($data, json_decode($case->case_files)));
            }else{
                $new_plus_old_files = json_encode($data);
            }

            

            ClientCase::where('id', $case->id)->update([
                'case_files'=>$new_plus_old_files,
                'company_id' => $company->id,
                'client_id' => $request->client_id,
                'case_number' => $request->case_number,
                'case_title' => $request->case_title,
                'history' => $request->history,
                'court_date' => $request->court_date,
                'court_location' => $request->court_location,
                'outcome' => $request->outcome,
                'user_id' => $request->user_id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }else{

            ClientCase::where('id', $case->id)->update([
                'company_id' => $company->id,
                'client_id' => $request->client_id,
                'case_number' => $request->case_number,
                'case_title' => $request->case_title,
                'history' => $request->history,
                'court_date' => $request->court_date,
                'court_location' => $request->court_location,
                'outcome' => $request->outcome,
                'user_id' => $request->user_id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

        }

        flash('client Updated!')->success();

        return redirect(route('adminclientcases', compact('company')));
     }

    public function delete(ClientCase $case)
    {
    	ClientCase::where('id', $case->id)->delete();

    	flash('Client case deleted!')->warning();

        return back();
    }

    public function restore($id)
    {
        ClientCase::withTrashed()->find($id)->restore();

        flash('Client case restored!')->success();

        return back();
    }

    public function deleteForever($id)
    {
        $case = ClientCase::withTrashed()->find($id);

        for ($i = 0; $i < count(json_decode($case->case_files)); $i++) {

            $file = public_path('/uploads/companies/cases/'.json_decode($case->case_files)[$i]);

            if (File::exists($file)) {

                unlink($file);
            } 
        } 

        $case->forceDelete();

        flash('Client case has been deleted forever!')->success();

        return back();
    }

    public function courtDates()
    {
        $client_cases = ClientCase::get();

        $user = User::where('id', '=', 1)->where('is_admin', '=', 1)->first();

        foreach ($client_cases as  $clientcase) {

            if ( $clientcase->court_date->toFormattedDateString() == Carbon::now()->addDays(10)->toFormattedDateString() || $clientcase->court_date->toFormattedDateString() == Carbon::now()->addDays(5)->toFormattedDateString() || $clientcase->court_date->toFormattedDateString() == Carbon::now()->addDays(1)->toFormattedDateString() | $clientcase->court_date->toFormattedDateString() == Carbon::now()->addDays(0)->toFormattedDateString()) {

               $user->notify(new UpComingCourtDate($clientcase));
            }

           //dd($clientcase->court_date->toFormattedDateString() == Carbon::now()->addDays(0));
           //dd(Carbon::now()->addDays(1)->toFormattedDateString());
            //dd($clientcase->court_date->toFormattedDateString());
        }
        

        return view('admin.cases.courtdates', compact('client_cases', 'up_coming_court_cases'));
    }

}
