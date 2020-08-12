<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ClientCase;
use App\Client;
use App\Company;
use Illuminate\Validation\Rule;


class ClientsController extends Controller
{
    public function showClients(Company $company)
    {
    	$clients = Client::withTrashed()->where('company_id', $company->id)->get();

        $all_cases = ClientCase::get();

    	return view('admin.clients.showclients', compact('company', 'clients', 'all_cases'));
    }

    public function newClient(Company $company)
    {
        return view('admin.clients.newclient', compact('company'));
    }

    public function addClient(Request $request, Company $company){

        $this->validate(request(), [
            'client_number' => 'required',
            'client_number' => Rule::unique('clients')->where( function($query) use($company){
                return $query->where('company_id', $company->id);
            }),
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'email' => Rule::unique('clients')->where( function($query) use($company){
                return $query->where('company_id', $company->id);
            }),
            'phone' => 'required',
            'phone' => Rule::unique('clients')->where( function($query) use($company){
                return $query->where('company_id', $company->id);
            }),
            
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

    public function edit(Company $company, Client $client)
    {
        return view('admin.clients.edit', compact('company', 'client'));
    }

   public function update(Request $request, Company $company, Client $client)
    {
        $this->validate(request(), [
            
            'client_number' => 'required|unique:clients,client_number,'.$client->id,
            'client_number' => Rule::unique('clients')->where( function($query) use($company, $client){
                return $query->where('company_id', $company->id)->where('id', '!=', $client->id);
            }),
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:clients,email,'.$client->id,
            'email' => Rule::unique('clients')->where( function($query) use($company, $client){
                return $query->where('company_id', $company->id)->where('id', '!=', $client->id);
            }),
            'phone' => 'required|unique:clients,phone,'.$client->id,
            'phone' => Rule::unique('clients')->where( function($query) use($company, $client){
                return $query->where('company_id', $company->id)->where('id', '!=', $client->id);
            }),
            
        ]);
        
        Client::where('id', $client->id)->update([
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

        flash('client Updated!')->success();

        return back();
     }

    public function deleteClient(Client $client)
    {
        Client::where('id', $client->id)->first()->delete();

        flash('client deleted!')->error();

        return back();
    }

    public function restore($id)
    {
        Client::withTrashed()->find($id)->restore();

        flash('client restored!')->error();

        return back();
    }

    public function deleteForever($id)
    {
        Client::withTrashed()->find($id)->forceDelete();

        flash('client Deleted Forever!')->error();

        return back();
    }

}
