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


class ClientCasesController extends Controller
{
    public function showCases(Company $company)
    {
        $companycases = ClientCase::where('company_id', $company->id)->get();

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

    public function addCase(Request $request){

        $this->validate(request(), [
            'client_id' => 'required',
            'case_number' => 'required|unique:client_cases',
            'case_title' => 'required',
        ]);
        
        ClientCase::insert([
            'client_id' => $request->client_id,
            'case_number' => $request->case_number,
            'case_title' => $request->case_title,
            'history' => $request->history,
            'court_date' => $request->court_date,
            'court_location' => $request->court_location,
            'outcome' => $request->outcome,
            'assigned_to' => $request->assigned_to,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
       
        flash('Case Added!')->success();

        return back();
   }

   public function editCase(Request $request, ClientCase $Case)
    {
            $this->validate(request(), [
                'first_name' => 'required',
                'last_name' => 'required',
                'phone' => 'required',
            ]);

        
        $edit_Case = ClientCase::where('id', $Case->id)->first();

        $edit_client->client_number = $request->client_number;
        $edit_client->first_name = $request->first_name;
        $edit_client->last_name = $request->last_name;
        $edit_client->email = $request->email;
        $edit_client->phone = $request->phone;
        $edit_client->address = $request->address;
        $edit_client->address_2 = $request->address_2;
        $edit_client->city = $request->city;
        $edit_client->state = $request->state;
        $edit_client->country = $request->country;
        $edit_client->client_note = $request->client_note;
        
        $edit_client->save();

        flash('client Updated!')->success();

        return back();
     }

    public function deleteClient(Client $client)
    {
    	Client::where('id', $client->id)->delete();

    	flash('Client deleted!')->warning();

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
