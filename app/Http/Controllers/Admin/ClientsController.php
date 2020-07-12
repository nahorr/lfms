<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ClientCase;
use App\Client;
use App\Company;


class ClientsController extends Controller
{
    public function showClients(Company $company)
    {
    	$clients = Client::where('company_id', $company->id)->get();

        $all_cases = ClientCase::get();

    	return view('admin.clients.showclients', compact('company', 'clients', 'all_cases'));
    }

    public function newClient(Company $company)
    {
        return view('admin.clients.newclient', compact('company'));
    }

    public function addClient(Request $request, Company $company){

        $this->validate(request(), [
            'client_number' => 'required|unique:clients',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:clients',
            'phone' => 'required',
            
        ]);
        
        Client::insert([
            'company_id' => $company->id,
            'client_number' => $request->client_number,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'address_2' => $request->address_2,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'client_note' => $request->client_note,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
       
        flash('Client Added!')->success();

        return redirect()->route('CompanyClients', compact('company'));
   }

   public function editClient(Request $request, Client $client)
    {
            $this->validate(request(), [
                'first_name' => 'required',
                'last_name' => 'required',
                'phone' => 'required',
            ]);

        
        $edit_client = Client::where('id', $client->id)->first();

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
        $client = Client::where('id', $client->id)->first();

        $client->deleted_at = date('Y-m-d H:i:s');

        $client->save();

        flash('client deleted!')->error();

        return back();
    }

}
