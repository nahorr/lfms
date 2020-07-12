<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Subscription;
use App\Company;

class SubscriptionsController extends Controller
{
    public function showSubscriptions()
    {
    	$subscriptions = Subscription::get();

    	return view('super.subscriptions.showsubscriptions', compact('subscriptions'));
    }

    public function newSubscription()
    {
    	$companies = Company::get();

    	return view('super.subscriptions.newsubscription', compact('companies'));
    }

    public function addNewSubscription(Request $request){
        
        $this->validate(request(), [
            'company_id' => 'required',
            'subscription_currency' => 'required',
            'subscription_amount' => 'required',
            'subscriber_name' => 'required',
            'subscriber_phone' => 'required',
            'subscriber_email' => 'required',   

        ]);

        Subscription::insert([
            'subscription_uuid' => Str::uuid(),
            'company_id' => $request->company_id,
            'subscription_currency' => $request->subscription_currency,
            'subscription_amount' => $request->subscription_amount,
            'subscription_method' => 'Manual',
            'subscriber_name' => $request->subscriber_name,
            'subscriber_phone' => $request->subscriber_phone,
            'subscriber_email' => $request->subscriber_email,       
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
       
        flash('New Subscription created Successfully!')->success();

        return redirect()->route('super.subscriptions');
   }

   public function editSubscription(Subscription $subscription)
    {

    	return view('super.subscriptions.editsubscription', compact('subscription'));
    }

    public function updateSubscription(Request $request, Subscription $subscription){
        
        $this->validate(request(), [

        	'subscription_currency' => 'required',
            'subscription_amount' => 'required',
            'subscriber_name' => 'required',
            'subscriber_phone' => 'required',
            'subscriber_email' => 'required',
            
        ]);

        Subscription::where('id', $subscription->id)->update([
            'subscription_currency' => $request->subscription_currency,
            'subscription_amount' => $request->subscription_amount,
            'subscriber_name' => $request->subscriber_name,
            'subscriber_phone' => $request->subscriber_phone,
            'subscriber_email' => $request->subscriber_email,       
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
       
        flash('Subscription Updated Successfully!')->success();

        return redirect()->route('super.subscriptions');
   }

}
