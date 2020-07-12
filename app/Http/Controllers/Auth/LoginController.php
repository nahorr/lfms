<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\Company;
use App\Subscription;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    public function authenticated($request , $user){

        if(Auth::user()->group_id == 1){
            
            return redirect()->route('superhome') ;
        }
        elseif((Auth::user()->group_id == 2 || Auth::user()->group_id == 3)){

            return redirect()->route('adminhome') ;
        }
        elseif(Auth::user()->group_id == 4){

            return redirect()->route('lawyerhome') ;
        }

    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
