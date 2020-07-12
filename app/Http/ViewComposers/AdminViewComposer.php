<?php
namespace App\Http\ViewComposers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Repositories\UserRepository;
use App\TemplateCategory;
use App\Template;
use Carbon\Carbon;
use App\User;
use Auth;
use App\ClientCase;
use App\Client;
use App\Company;
	
Class AdminViewComposer {	

    public function compose(View $view)
    {
        
    	//initialize number for irregular table numbering
        $number_init = 1;
        //get current date
        $today = Carbon::today();
        $company = Company::where('id', Auth::user()->company_id)->first();
        // $users = User::orderBy('created_at', 'desc')->get();
        // $templates = Template::get();
        // $template_categories = TemplateCategory::get();
        // $clients = Client::get();
         $cases = ClientCase::get();
       
        //put variables in views
        $view
        ->with('number_init', $number_init )
        ->with('today', $today )
        ->with('company', $company )
        ->with('cases', $cases);
        
        // ->with('users', $users)
        // ->with('templates', $templates)
        // ->with('template_categories', $template_categories)
        // ->with('clients', $clients)
        // ->with('client_cases', $client_cases);
        
    }
}