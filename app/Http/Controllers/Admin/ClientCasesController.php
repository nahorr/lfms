<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ClientCase;

class ClientCasesController extends Controller
{
    public function showCases()
    {
    	$client_cases = ClientCase::get();

    	return view('admin.cases.showcases', compact('client_cases'));
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

}
