<?php
namespace App\Http\Middleware;
use Closure;
use App\User; 
use Auth;
class IsLawyer
{
    public function handle($request, Closure $next)
    {
         if (Auth::user() &&  Auth::user()->group_id == 4) {
            return $next($request);
         }
        return redirect('/lawyer/home');
    }
}