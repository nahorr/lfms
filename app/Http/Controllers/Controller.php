<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Notifications\Notifiable;
use App\Notifications\ContactFormSubmitted;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Company;
use App\ContactUs;
use App\User;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, Notifiable;

    public function welcome()
    {
    	return view('welcome');
    }

    public function test()
    {
        return view('test');
    }

    public function expiredSubscription()
    {
        return view('expired_subscription');
    }

    public function noSubscription()
    {
        return view('no_subscription');
    }

    public function registerCompany()
    {
    	return view('register_company');
    }

    public function postRegisterCompany(Request $request)
    {
    	$this->validate(request(), [
            'company_name' => 'required|unique:companies',
            'city' => 'required',
            'phone' => 'required|unique:companies|numeric',
            
        ]);
        
        Company::insert([
            'company_name' => $request->company_name,
            'city' => $request->city,
            'phone' => $request->phone,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        $company = Company::where('phone', $request->phone)->first();


        flash('Company Detials Added Successfully. Now let us omplete the Final step by entering your datails!')->success();

        return view('auth.register', compact('company'));
    }

    public function contactUs()
    {
        return view('contactus');
    }

    public function postContactUs(Request $request)
    {
        $this->validate(request(), [
            'full_name' => 'required',
            'company_name' => 'required',
            'email' => 'required',
            'phone_number' => 'required|numeric',
            'contact_message' => 'required|string|min:20|max:500',
            
        ]);
        
        ContactUs::insert([
            'full_name' => $request->full_name,
            'company_name' => $request->company_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'contact_message' => $request->contact_message,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

    
        $contact = ContactUs::where('full_name', $request->full_name)->where('email', $request->email)->orderBy('created_at', 'desc')->first();

        $site_admin = User::where('email', 'super@gmail.com')->first();

        $site_admin->notify(new ContactFormSubmitted($contact));

        flash('Your message was sent Successfully. You will be contacted by site Administrator as soon as possible')->warning();

        return back();
    }
}
