<?php
namespace App\Http\ViewComposers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Repositories\UserRepository;
use App\AgreementType;
use App\Agreement;
use Carbon\Carbon;
use App\User;
use Auth;
	
Class AdminViewComposer {	

    public function compose(View $view)
    {
        
    	//initialize number for irregular table numbering
        $number_init = 1;
        //get current date
        $today = Carbon::today();
        $users = User::orderBy('created_at', 'desc')->get();
        $agreements = Agreement::get();
        $agreement_types = AgreementType::get();
       
        //put variables in views
        $view
        ->with('number_init', $number_init )
        ->with('today', $today )
        ->with('users', $users)
        ->with('agreements', $agreements)
        ->with('agreement_types', $agreement_types);
        
    }
}