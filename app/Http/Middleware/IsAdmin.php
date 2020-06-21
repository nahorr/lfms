<?php
namespace App\Http\Middleware;
use Closure;
use App\User; 
use Auth;
class IsAdmin
{
    public function handle($request, Closure $next)
    {
         if (Auth::user() &&  (Auth::user()->group_id == 2 || Auth::user()->group_id == 3)) {
            return $next($request);
         }
        return redirect('/admin/home');
    }
}