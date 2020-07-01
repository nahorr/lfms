<?php
namespace App\Http\Middleware;
use Closure;
use App\User; 
use Auth;
use App\Company;
use App\Subscription;
use Carbon\Carbon;


class IsLawyer
{
    public function handle($request, Closure $next)
    {
    	$current_company_sub = @Subscription::where('company_id', Auth::user()->company_id)->orderBy('created_at', 'DESC')->first();

        $isActive = @Carbon::now()->diffInDays($current_company_sub->created_at);


         if (Auth::user() &&  Auth::user()->group_id == 4) {

         	if ($current_company_sub == Null) {

         	    return redirect(route('NoSubscription'));

         	} elseif($isActive > 365) {

         	    return redirect(route('ExpiredSubscription'));
         	}

            return $next($request);
         }
        return redirect('/lawyer/home');
    }
}