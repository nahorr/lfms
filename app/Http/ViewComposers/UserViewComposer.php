<?php
namespace App\Http\ViewComposers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Repositories\UserRepository;

use App\TemplateType;
use App\Agreement;
use Carbon\Carbon;
use App\Template;
use App\User;
use Auth;
	
Class UserViewComposer {	

    public function compose(View $view)
    {
        
    	//initialize number for irregular table numbering
        $number_init = 1;
        //get current date
        $today = Carbon::today();
        $users = User::orderBy('created_at', 'desc')->get();
        $templates = Template::get();
        $template_types = TemplateType::get();
        
        
        //put variables in views
        $view
        ->with('number_init', $number_init )
        ->with('today', $today )
        ->with('users', $users)
        ->with('templates', $templates)
        ->with('template_types', $template_types);
        
    }
}