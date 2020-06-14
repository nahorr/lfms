<?php
namespace App\Http\Middleware;
use Closure;
use App\User; 
use Auth;
class IsSuperAdmin
{
    public function handle($request, Closure $next)
    {
         if (Auth::user() &&  Auth::user()->is_superadmin == 1) {
            return $next($request);
         }
        return redirect('/user/home');
    }
}